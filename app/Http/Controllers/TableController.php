<?php

namespace App\Http\Controllers;

use App\Models\Table;
use Illuminate\Http\Request;

class TableController extends Controller
{

    public static function rules()
    {
        return [
            'number_of_seats' => 'required|numeric|min:1|max:12',
        ];
    }

    function __construct()
    {
        $this->middleware('permission:table-list', ['only' => ['index']]);
        $this->middleware('permission:table-create', ['only' => ['create','store']]);
        $this->middleware('permission:table-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:table-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tables = Table::orderBy('id', 'desc')->get();
        return view('table.index', compact('tables'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('table.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $rules = $this->rules();
        $data = $this->validate(request(), $rules);
        Table::create($data);
        session()->push('message',['type'=>'Added','message'=>'Table Added Successfully']);
        return redirect('/table/index');
    }

    /**
     * Show the form for editing the specified resource.

     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editTable = Table::find($id);
        return view('table.edit', compact('editTable'));
    }

    /**
     * Update the
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $rules = $this->rules();
        $data = $this->validate(request(), $rules);
        $table = Table::where('id',$id)->first();
        $table->update($data);
        session()->push('message',['type'=>'Added','message'=>'Table Updated Successfully']);
        return redirect('/table/index');
    }

    /**
     * Remove the specified resource from storage.

     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $table = Table::find($id);
        if ($table->reservations()->exists())
        {
            session()->push('message',['type'=>'Deleted','message'=>'You can\' deleted table '. $table->name . ', because it has reservation']);
        }
        else{
            $table->delete();
            session()->push('message',['type'=>'Deleted','message'=>'Table deleted successfully']);
        }

        return redirect('/table/index');
    }
}
