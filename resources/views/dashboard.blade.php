@extends('layouts.app')
@section('title')
    Dashboard
@endsection

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Dashboard</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
@endsection
@section('container-fluid')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{count($reservations)}}</h3>

                        <p>Today Reservations</p>
                    </div>
                    <div class="icon">
                        <i class="nav-icon fas fa-users-cog"></i>
                    </div>
                    <a href="{{ url('reservation/index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>



            <div class="col-lg-6 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{count($tables)}}</h3>

                        <p>Number Of Tables</p>
                    </div>
                    <div class="icon">
                        <i class="nav-icon fas fa-user-md"></i>
                    </div>
                    <a href="{{ url('table/index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header border-transparent">
                        <h3 class="card-title">Latest Reservations</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table m-0">
                                <thead>
                                <tr>
                                    <th>
                                        Table Number
                                    </th>
                                    <th>
                                        Number Of Seats
                                    </th>
                                    <th>
                                        Day
                                    </th>
                                    <th>
                                        Start Time
                                    </th>
                                    <th>
                                        End Time
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($reservations as $reservation)
                                    <tr>
                                        <td>{{$reservation->table_id}}</td>
                                        <td>{{$reservation->table->number_of_seats}}</td>
                                        <td>{{$reservation->day}}</td>
                                        <td>{{$reservation->start}}</td>
                                        <td>{{$reservation->end}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        <a href="{{ url('reservation/index') }}" class="btn btn-sm btn-secondary float-right">View All Today Reservations</a>
                    </div>
                    <!-- /.card-footer -->
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header border-transparent">
                        <h3 class="card-title">Latest Orders</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table m-0">
                                <thead>
                                <tr>
                                    <th>
                                        Table Number
                                    </th>
                                    <th>
                                        Number Of Seats
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($tables as $table)
                                    <tr>
                                        <td>{{$table->id}}</td>
                                        <td>{{$table->number_of_seats}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        <a href="{{ url('table/index') }}" class="btn btn-sm btn-secondary float-right">View All tables</a>
                    </div>
                    <!-- /.card-footer -->
                </div>
            </div>
        </div>

    </div>
@endsection
