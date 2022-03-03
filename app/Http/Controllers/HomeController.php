<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Table;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $reservations = Reservation::where('day', Carbon::now()->format('Y-m-d'))->orderBy('id', 'desc')->get();
        $tables = Table::orderBy('id', 'desc')->get();

        return view('dashboard',compact('reservations','tables'));
    }
}
