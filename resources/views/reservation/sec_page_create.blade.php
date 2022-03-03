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


                <div class="row">
                    <div class="card card-primary col-lg-6">
                        <div class="card-header">
                            <h3 class="card-title">Available slots</h3>
                        </div>
                        <div class="card-body">

                            <table class="table table-bordered table-striped">
                                <thead>
                                <tr role="row">
                                    <th>Table Id</th>
                                    <th>Start</th>
                                    <th>End</th>
                                </tr>
                                </thead>
                                <tbody>
                                @for($i = 0; $i < count($slots); $i++)
                                    <tr>
                                        <td>{{$slots[$i]['table_id']}}</td>
                                        <td>{{$slots[$i]['start']}}</td>
                                        <td>{{$slots[$i]['end']}}</td>
                                    </tr>
                                @endfor
                            </table>
                        </div>
                    </div>
                    <div class="card card-primary col-lg-6">

                        <div class="card-header">
                            <h3 class="card-title">Create Reservation</h3>
                        </div>
                        <!-- /.card-header -->

                        <!-- form start -->
                        <form method="POST" action="{{ url('reservation/store') }}"
                              aria-label="{{ __('reservation/store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="table_id">{{ __('Brands') }}</label>
                                    <select class="form-control{{ $errors->has('table_id') ? ' is-invalid' : '' }} select_option" name="table_id" id="table_id">
                                        <option class="form-control " value="">Select</option>
                                        @for($i = 0; $i < count($slots); $i++)
                                            <option class="form-control" value="{{$slots[$i]['table_id']}}">{{$slots[$i]['table_id']}}</option>
                                        @endfor
                                    </select>
                                    @if ($errors->has('table_id'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('table_id') }}</strong>
                                    </span>
                                    @endif
                                </div>


                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label for="start">{{ __('Start') }}</label>
                                        <input id="start" type="time"
                                               class="form-control{{ $errors->has('start') ? ' is-invalid' : '' }}"
                                               name="start" value="{{ old('start') }}">
                                        @if ($errors->has('start'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('start') }}</strong>
                                    </span>
                                        @endif
                                    </div>

                                    <div class="form-group col-lg-6">
                                        <label for="end">{{ __('End') }}</label>
                                        <input id="end" type="time"
                                               class="form-control{{ $errors->has('end') ? ' is-invalid' : '' }}" name="end"
                                               value="{{ old('end') }}">
                                        @if ($errors->has('end'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('end') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                    <input id="day" type="date" name="day" hidden value="{{ $day }}">

                                </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- /.card -->
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        var seen = {};
        jQuery('.select_option').children().each(function() {
            var txt = jQuery(this).attr('value');
            if (seen[txt]) {
                jQuery(this).remove();
            } else {
                seen[txt] = true;
            }
        });
    </script>
@endsection
