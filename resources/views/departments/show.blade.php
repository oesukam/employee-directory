@extends('admin.layout')

@section('content')

<div class="container">

    <h2>{{$department->name}} Department Detail</h2>

    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                <td><strong>Name</strong></td>
                <td><strong>Office Number</strong></td>
                <td><strong>Manager</strong></td>
                @if (Auth::check())
                    <td><strong>Action</strong></td>
                @endif
                <td></td>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$department->name}}</td>
                        <td>{{$department->office_number}}</td>
                        <td>{{$department->manager}}</td>
                        <td>
                            @if (Auth::check())
                                <a href="/departments/{{$department->id}}/employees"><button class="btn btn-primary"><i class="fa fa-eye"></i> View Employees</button></a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <a href="/departments/"><button class="btn btn-success"><i class="fa fa-chevron-circle-left"></i> Back</button></a>
</div>

@stop