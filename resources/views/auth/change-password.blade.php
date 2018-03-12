@extends('admin.layout')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Changing Your Password</div>
                    <div class="panel-body">

                        @include('admin.partials.errors')
                        @include('admin.partials.success')

                        @if(Session::has('message'))
                            <p class="alert alert-warning">{{ Session::get('message') }}</p>
                        @endif

                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/change-password') }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Old Password</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="password" name="old_password"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">New Password</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="password" name="password"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Confirm Password</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="password" name="password_confirmation"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button class="btn btn-primary" type="submit"><i class="fa fa-pencil-square"></i> Change Your Password</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection