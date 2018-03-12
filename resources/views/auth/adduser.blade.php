@extends('admin.layout')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Add Administrator</div>
                    <div class="panel-body">

                        @include('admin.partials.errors')
                        @include('admin.partials.success')

                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/adduser') }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>

                            <div class="form-group">
                                <label class="col-md-4 control-label">E-Mail Address</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="email" name="email" value="{{ old('email') }}" autofocus/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Username</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="text" name="name" value="{{ old('name') }}" autofocus/>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button class="btn btn-primary" type="submit"><i class="fa fa-plus-square"></i> Add Admin</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection