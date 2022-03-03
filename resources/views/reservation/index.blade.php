@extends('layouts.app')
@section('title')
    View Reservations
@endsection

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">View Reservations</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
                    <li class="breadcrumb-item active">View Reservations</li>
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
                        <h3 class="card-title">View All Reservations</h3>
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
                        @can('reservation-filter')
                            <form method="post" action="{{ url('reservation/index') }}"
                                  aria-label="{{ __('reservation/index') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-lg-5">
                                            <div class="row">
                                                <label class="col-lg-2" for="from">{{ __('From') }}</label>
                                                <input id="from" type="date"
                                                       class="col-lg-10 form-control{{ $errors->has('from') ? ' is-invalid' : '' }}"
                                                       name="from" @if(isset($from)) value="{{$from}}" @endif>
                                                @if ($errors->has('from'))
                                                    <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('from') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-5">
                                            <div class="row">
                                                <label class="col-lg-2" for="to">{{ __('To') }}</label>
                                                <input id="to" type="date"
                                                       class="col-lg-10 form-control{{ $errors->has('to') ? ' is-invalid' : '' }}"
                                                       name="to" @if(isset($to)) value="{{$to}}" @endif>
                                                @if ($errors->has('to'))
                                                    <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('to') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-2">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        @endcan

                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr role="row">
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
                                <th width="280px">Action</th>
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
                                    <td>
                                        @can('reservation-delete')
                                            <a class="btn btn-danger" onclick="return confirm('You Are Sure!')"
                                               href="{{ url('/reservation/destroy') }}/{{$reservation->id}}"
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

