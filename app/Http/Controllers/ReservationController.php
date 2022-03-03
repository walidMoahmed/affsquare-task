<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Table;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReservationController extends Controller
{

    public static function second_page_rules()
    {
        return [
            'number_of_seats' => 'required|numeric|min:1|max:12',
            'day'=> 'required| after_or_equal:' . date('YYYY-MM-DD'),
        ];
    }


    public static function second_page_rules_current_day()
    {
        return [
            'table_id' => 'required|numeric',
            'start' => "date_format:H:i|after:" . Carbon::now()->format('H:i:s') ,
            'end' => 'date_format:H:i|after:start',
        ];
    }

    public static function second_page_rules_next_day()
    {
        return [
            'table_id' => 'required|numeric',
            'start' => "date_format:H:i|after:" . Carbon::now()->format('12:00:00') ,
            'end' => 'date_format:H:i|after:start',
        ];
    }

    public function __construct()
    {
        $this->middleware('permission:reservation-list', ['only' => ['index']]);
        $this->middleware('permission:reservation-create', ['only' => ['create','create_second_page','store']]);
        $this->middleware('permission:reservation-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:reservation-delete', ['only' => ['destroy']]);
    }

    public function index(){
        $reservations = Reservation::where('day', Carbon::now()->format('Y-m-d'))->orderBy('id', 'desc')->get();
        return view('reservation.index', compact('reservations'));
    }

    public function filter()
    {
        $from = request('from');
        $to = request('to');

        $reservations = Reservation::whereBetween('day', [$from, $to])->orderBy('id', 'desc')->get();
        return view('reservation.index', compact('reservations','from','to'));
    }

    public function create()
    {
        return view('reservation.create');
    }

    public function create_second_page(){
        $rules = $this->second_page_rules();
        $data = $this->validate(request(), $rules);
        $day = $data['day'];
        $tables = Table::where('number_of_seats' , '>=', $data['number_of_seats'])->get();


        $slots = array();
        $open_time = strtotime('12:00:00');
        $close_time = strtotime('23:59:00');

        foreach ($tables as $table){
             $reservations = Reservation::where('table_id',$table->id)->where('day', $day)->get();
             if ($reservations->isEmpty()){

                 array_push( $slots,['table_id'=>$table->id,'start'=> gmdate("H:i:s", $open_time),'end'=> gmdate("H:i:s", $close_time)]);

             }else{
                 $count = count($reservations);
                 foreach ($reservations as $reservation){
                     $count--;
                     $reservation_start_time = strtotime($reservation->start);
                     $reservation_end_time = strtotime($reservation->end);
                     if($reservation_start_time > $open_time){
                         array_push( $slots,['table_id'=>$table->id,'start'=> gmdate("H:i:s", $open_time),'end'=> gmdate("H:i:s", $reservation_start_time)]);


                         if ($count == 0){
                             array_push( $slots,['table_id'=>$table->id,'start'=> gmdate("H:i:s", $reservation_end_time),'end'=> gmdate("H:i:s", $close_time)]);

                         }else{
                             $open_time = $reservation_end_time;
                         }
                     }
                 }
             }
        }

        return view('reservation.sec_page_create',compact('slots','day'));
    }


    public function store(){

        if (request('day') == date('Y-m-d')){
            $rules = $this->second_page_rules_current_day();
        }
        else{
            $rules = $this->second_page_rules_next_day();
        }
        $data = $this->validate(request(), $rules);

        $table_id = request('table_id');
        $day = request('day');
        $start = request('start');
        $end = request('end');

        $reservations = Reservation::where('table_id',$table_id)->where('day', $day)->get();
        if ($reservations->isEmpty()){
            $new_reservation = new Reservation();
            $new_reservation->table_id = $table_id;
            $new_reservation->day = $day;
            $new_reservation->start = $start;
            $new_reservation->end = $end;
            $new_reservation->save();
        } else{
            $count = count($reservations);
            foreach ($reservations as $reservation){
                $reservation_start_time = strtotime($reservation->start);
                $reservation_end_time = strtotime($reservation->end);
                if( (strtotime($start) < $reservation_start_time && strtotime($end) < $reservation_start_time) ||
                    (strtotime($start) > $reservation_end_time && strtotime($end) > $reservation_end_time)){
                    $count--;
                }

                if ($count == 0){
                    $new_reservation = new Reservation();
                    $new_reservation->table_id = $table_id;
                    $new_reservation->day = $day;
                    $new_reservation->start = $start;
                    $new_reservation->end = $end;
                    $new_reservation->save();
                }else{
                    session()->push('message',['type'=>'Deleted','message'=>'Select anther table or anther time']);
                    return redirect('/reservation/create');
                }
            }
        }

        session()->push('message',['type'=>'Added','message'=>'reservation is done']);
        return redirect('/reservation/index');

    }

    public function destroy($id)
    {
        $reservation = Reservation::find($id);
        if ($reservation->day != date('Y-m-d'))
        {
            session()->push('message',['type'=>'Deleted','message'=>'You can\' deleted table '. $reservation->table_id]);
        }
        else{
            $reservation->delete();
            session()->push('message',['type'=>'Deleted','message'=>'Table deleted successfully']);
        }

        return redirect('/reservation/index');
    }
}
