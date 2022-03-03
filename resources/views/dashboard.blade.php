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
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{--{{$admins}}--}}</h3>

                        <p>Admins</p>
                    </div>
                    <div class="icon">
                        <i class="nav-icon fas fa-users-cog"></i>
                    </div>
                    <a href="{{ url('garage/index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{--{{$customerServices}}--}}</h3>

                        <p>Customer Services</p>
                    </div>
                    <div class="icon">
                        <i class="nav-icon fas fa-solid fa-head-side-cough"></i>
                    </div>
                    <a href="{{ url('customer-services/index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-2 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3 id="serviceProviders"></h3>

                        <p>Drivers</p>
                    </div>
                    <div class="icon">
                        <i class="nav-icon fas fa-user-md"></i>
                    </div>
                    <a href="{{ url('driver/index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-2 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{--{{$garages}}--}}</h3>

                        <p>Garages</p>
                    </div>
                    <div class="icon">
                        <i class="nav-icon fas fa-warehouse"></i>
                    </div>
                    <a href="{{ url('garage/index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-2 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{--{{$customers}}--}}</h3>

                        <p>Customers</p>
                    </div>
                    <div class="icon">
                        <i class="nav-icon fas fa-solid fa-users"></i>
                    </div>
                    <a href="{{ url('customer/index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header border-transparent">
                        <h3 class="card-title">Latest Spare Part Requests</h3>

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
                                    <th>User</th>
                                    <th>Car</th>
                                    <th>Status</th>
                                    <th>Note</th>
                                </tr>
                                </thead>
                                <tbody>
                                {{--@foreach($spareParts as $sparePart)
                                    <tr>
                                        <td>{{$sparePart->car->user->name}}</td>
                                        <td>{{$sparePart->car->model->brand->name}} {{$sparePart->car->model->name}} {{$sparePart->car->model->year}}</td>
                                        <td><span class="badge
                                                @if($sparePart->status == 'Open')
                                                    badge-info
                                                @elseif($sparePart->status == 'Pending')
                                                    badge-warning
                                                @elseif($sparePart->status == 'Cancelled')
                                                    badge-danger
                                                @elseif($sparePart->status == 'Accepted')
                                                    badge-success
                                                @endif badge-success">{{$sparePart->status}}</span></td>
                                        <td><div class="sparkbar" data-color="#f56954" data-height="20">{{$sparePart->user_note}}</div></td>
                                    </tr>
                                @endforeach--}}
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
<!--                        <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Place New Order</a>-->
                        <a href="{{ url('spare-part/index') }}" class="btn btn-sm btn-secondary float-right">View All Orders</a>
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
                                    <th>Car</th>
                                    <th>Service</th>
                                    <th>Customer</th>
                                    <th>Garage</th>
                                </tr>
                                </thead>
                                <tbody>
                                {{--@foreach($orders as $order)
                                    <tr>
                                        <td>{{$order->car->model->brand->name}} {{$order->car->model->name}} {{$order->car->model->year}}</td>
                                        <td>{{$order->service->name}}</td>
                                        <td>{{$order->customer->name}}</td>
                                        @if(isset($order->garage_id))
                                            <td>{{$order->garage->name}}</td>
                                        @else
                                            <td></td>
                                        @endif
                                    </tr>
                                @endforeach--}}
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        <!--                        <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Place New Order</a>-->
                        <a href="{{ url('order/view-all-orders') }}" class="btn btn-sm btn-secondary float-right">View All Orders</a>
                    </div>
                    <!-- /.card-footer -->
                </div>
            </div>
        </div>

    </div>
@endsection
