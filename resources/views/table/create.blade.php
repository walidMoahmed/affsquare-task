@extends('layouts.app')
@section('title')
    Create Table
@endsection

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Create Table</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
                    <li class="breadcrumb-item active">Create Table</li>
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
                        <h3 class="card-title">Create</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="POST" action="{{ url('table/store') }}" aria-label="{{ __('table/store') }}" enctype="multipart/form-data">
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
