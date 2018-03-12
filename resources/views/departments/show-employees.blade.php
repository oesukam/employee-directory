@extends('employees.layout')

@section('title')
    <h2>{{$department->name}} Department<small> &raquo; Employees</small></h2>
@stop

@section('data')
    @if(isset($department))
        @foreach ($department->employees as $employee)
            <tr>
                <td><a href="{{url('employees/'.$employee->id)}}" >{{$employee->name}}</a></td>
                <td><a href="{{url('departments/'.$employee->department->id)}}">{{$employee->department->name}}</a></td>
                <td>{{$employee->job_title}}
                <td>{{$employee->email}}</td>
                <td>
                    @if (Auth::check())
                        <a href="/employees/{{$employee->id}}/edit"><button class="btn btn-success"><i class="fa fa-pencil-square"></i> Edit</button></a>
                        <button type="button" class="btn btn-danger btn-md" data-toggle="modal" data-target="#modal-delete">
                            <i class="fa fa-times-circle"></i>
                            Delete
                        </button>
                    @endif
                </td>
            </tr>
        @endforeach
    @endif
@stop