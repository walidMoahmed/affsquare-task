@extends('layouts.app')
@section('title')
    View Tables
@endsection

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">View Tables</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
                    <li class="breadcrumb-item active">View Tables</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
@endsection
@section('container-fluid')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">View All Tables</h3>
                    </div>
                    @if(session()->has('message'))
                        <div class="alert @if(session()->get('message')[0]['type'] == "Added") alert-success @endif
                        @if(session()->get('message')[0]['type'] == "Deleted") alert-danger @endif
                        @if(session()->get('message')[0]['type'] == "Restore") alert-warning @endif alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h5><i class="icon fas
                                    @if(session()->get('message')[0]['type'] == "Added")  fa-check @endif
                                @if(session()->get('message')[0]['type'] == "Deleted") fa-ban @endif
                                @if(session()->get('message')[0]['type'] == "Restore") fa-exclamation-triangle @endif
                                    "></i>Alert!</h5>
                            {{ session()->get('message')[0]['message'] }}
                            {{ session()->forget('message')}}
                        </div>
                @endif
                <!-- /.card-header -->

                    <!-- /.card-header -->

                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr role="row">
                                <th>
                                    Table Number
                                </th>
                                <th>
                                    Number Of Seats
                                </th>
                                <th width="280px">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($tables as $table)
                                <tr>
                                    <td>{{$table->id}}</td>
                                    <td>{{$table->number_of_seats}}</td>
                                    <td>
                                        @can('table-edit')
                                            <a class="btn btn-primary" href="{{ url('/table/edit') }}/{{$table->id}}">Edit</a>
                                        @endcan
                                        @can('table-delete')
                                            <a class="btn btn-danger" onclick="return confirm('You Are Sure!')"
                                               href="{{ url('/table/destroy') }}/{{$table->id}}"
                                               title="edit">Destroy</a>
                                        @endcan

                                    </td>

                                </tr>
                            @endforeach

                            </tbody>

                        </table>
                    </div>

                    <!-- /.card-body -->
                </div>
            </div>
            <!-- /.card -->

        </div>
    </div>
@endsection

