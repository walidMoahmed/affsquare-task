@extends('layouts.app')
@section('title')
    View Roles
@endsection

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">View Roles</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">View Roles</li>
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
                        <h3 class="card-title">View All Roles</h3>
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
                            @csrf
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr role="row">
                                    <th>Name</th>
                                    <th width="280px">Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($roles as $role)
                                    <tr>
                                        <td>{{ $role->name }}</td>
                                        <td>
                                            <a class="btn btn-info" href="{{ url('/role/show') }}/{{$role->id}}">Show</a>
                                            @can('role-edit')
                                                <a class="btn btn-primary" href="{{ url('/role/edit') }}/{{$role->id}}">Edit</a>
                                            @endcan
                                            @can('role-delete')
                                                <a class="btn btn-danger" onclick="return confirm('You Are Sure!')"
                                                   href="{{ url('/role/destroy') }}/{{$role->id}}"
                                                   title="edit">Destroy</a>
                                            @endcan

                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                    </div>

                    <!-- /.card-body -->
                </div>
            </div>
            <!-- /.card -->

        </div>
    </div>
@endsection
