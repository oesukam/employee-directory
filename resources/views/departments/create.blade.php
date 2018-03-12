@extends('admin.layout')

@section('content')
  <div class="container">
    <div class="row page-title-row">
      <div class="col-md-12">
        <h3>Departments <small>&raquo; Create New Department</small></h3>
      </div>
    </div>

    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">New Department</h3>
          </div>
          <div class="panel-body">

            @include('admin.partials.errors')
            @include('admin.partials.success')

            <form class="form-horizontal" role="form" method="POST"
                  action="/departments">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">

              @include('departments._form')

              <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                  <button type="submit" class="btn btn-primary btn-md">
                    <i class="fa fa-plus-circle"></i>
                    &nbsp; Add New Department
                  </button>
                </div>
              </div>

            </form>

          </div>
        </div>
      </div>
    </div>
  </div>

@stop