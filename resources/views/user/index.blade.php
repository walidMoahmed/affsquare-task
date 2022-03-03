@extends('layouts.app')
@section('title')
    View Users
@endsection

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">View Users</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
                    <li class="breadcrumb-item active">View Users</li>
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
                        <h3 class="card-title">View All Users</h3>
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
                                    <th>Email</th>
                                    <th>Roles</th>
                                    <th width="280px">Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            @if(!empty($user->getRoleNames()))
                                                @foreach($user->getRoleNames() as $v)
                                                    <label class="badge badge-success">{{ $v }}</label>
                                                @endforeach
                                            @endif
                                        </td>
                                        <td>
                                            <a class="btn btn-info" href="{{ url('/user/show') }}/{{$user->id}}">Show</a>
                                            @can('user-edit')
                                                <a class="btn btn-primary" href="{{ url('/user/edit') }}/{{$user->id}}">Edit</a>
                                            @endcan
                                            @can('user-delete')
                                                <a class="btn btn-danger" onclick="return confirm('You Are Sure!')"
                                                   href="{{ url('/user/destroy') }}/{{$user->id}}"
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
