@extends('admin.layout')

@section('content')
    <div class="container">
        <div class="row page-title-row">
            <div class="col-md-12">
                <h3>Employees <small>&raquo; Create New Employee</small></h3>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">New Employee</h3>
                    </div>
                    <div class="panel-body">

                        @include('admin.partials.errors')
                        @include('admin.partials.success')

                        <form class="form-horizontal" enctype="multipart/form-data" role="form" method="POST" action="{{ url('/employees') }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            @include('employees._form', ['avatar' => 'images/avatar.png'])

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop