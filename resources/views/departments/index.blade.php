@extends('admin.layout')

@section('content')

<div class="container">
    @if (Auth::check())
        <div class="row">
            <div class="col-md-6">
                <a href='/departments/create'><button class="btn btn-success"><i class="fa fa-plus-square"></i> New Department</button></a>
            </div>
        </div>
        <hr/>
    @endif

    <h2>Departments</h2>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                <td><strong>Name</strong></td>
                <td><strong>Office Number</strong></td>
                <td><strong>Manager</strong></td>
                <td><strong>Action</strong></td>
                <td></td>
                </thead>
                <tbody>
                    @if(isset($departments))
                        @foreach ($departments as $department)
                            <tr>
                                <td><a href="{{url('departments/'.$department->id)}}" >{{$department->name}}</a></td>
                                <td>{{$department->office_number}}</td>
                                <td>{{$department->manager}}</td>
                                <td>
                                    @if (Auth::check())
                                        <a href="/departments/{{$department->id}}/edit">
                                            <button class="btn btn-success"><i class="fa fa-pencil-square"></i> Edit</button>
                                        </a>
                                        <button type="button" class="btn btn-danger btn-md" data-toggle="modal" data-target="#modal-delete">
                                            <i class="fa fa-times-circle"></i>
                                            Delete
                                        </button>
                                    @endif
                                    <a href="/departments/{{$department->id}}/employees">
                                        <button class="btn btn-primary"><i class="fa fa-eye"></i> View Employees</button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
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
                    Are you sure you want to delete this department?
                </p>
            </div>
            <div class="modal-footer">
                <form method="POST" action="/departments/{{ $department->id or '' }}">
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