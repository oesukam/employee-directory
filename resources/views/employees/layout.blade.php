@extends('admin.layout')

@section('content')

<div class="container">
    @if (Auth::check())
        <div class="row">
            <div class="col-md-6">
                <a href="/employees/create"><button class="btn btn-success"><i class="fa fa-plus-square"></i> Add Employee</button></a>
            </div>
        </div>
        <hr/>
    @endif

    @yield('title')

    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                <td><strong>Name</strong></td>
                <td><strong>Department</strong></td>
                <td><strong>Job Title</strong></td>
                <td><strong>Email</strong></td>
                @if (Auth::check())
                    <td><strong>Action</strong></td>
                @endif
                <td></td>
                </thead>
                <tbody>
                    @yield('data')
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- Confirm Delete --}}
<div class="modal fade" id="modal-delete" tabIndex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    &times;
                </button>
                <h4 class="modal-title">Please Confirm</h4>
            </div>
            <div class="modal-body">
                <p class="lead">
                    <i class="fa fa-question-circle fa-lg"></i> &nbsp;
                    Are you sure you want to delete this employee?
                </p>
            </div>
            <div class="modal-footer">
                <form method="POST" action="/employees/{{ $employee->id or '' }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">
                        <i class="fa fa-times-circle"></i> Yes
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

@stop