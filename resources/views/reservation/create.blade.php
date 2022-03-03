@extends('layouts.app')
@section('title')
    Create Reservation
@endsection

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Create Reservation</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
                    <li class="breadcrumb-item active">Create Reservation</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
@endsection
@section('container-fluid')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Create Reservation</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    @if(session()->has('message'))
                        <div class="alert
                        @if(session()->get('message')[0]['type'] == "Deleted") alert-danger @endif alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h5><i class="icon fas @if(session()->get('message')[0]['type'] == "Deleted") fa-ban @endif "></i>Alert!</h5>
                            {{ session()->get('message')[0]['message'] }}
                            {{ session()->forget('message')}}
                        </div>
                    @endif
                    <form method="get" action="{{ url('reservation/create-second-page') }}" aria-label="{{ __('reservation/create-second-page') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="number_of_seats">{{ __('Number Of Seats') }}</label>
                                <input id="number_of_seats" type="number" class="form-control{{ $errors->has('number_of_seats') ? ' is-invalid' : '' }}" name="number_of_seats" value="{{ old('number_of_seats') }}"  autofocus>
                                @if ($errors->has('number_of_seats'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('number_of_seats') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group row">
                                <label for="day">{{ __('Day') }}</label>
                                <input id="day" type="date" class="form-control{{ $errors->has('day') ? ' is-invalid' : '' }}" name="day" value="{{ old('day') }}">
                                @if ($errors->has('day'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('day') }}</strong>
                                    </span>
                                @endif
                            </div>

                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
@endsection
