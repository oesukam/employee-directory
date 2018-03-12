@extends('employees.layout')

@section('title')
    <h2>Employees</h2> @if(isset($keyword))<h2><small>&raquo; Search Results for <strong>"{{ $keyword }}"</strong></small></h2>@endif
@stop

@section('data')
    @if(isset($employees))
        @foreach ($employees as $employee)
            <tr>
                <td><a href="{{url('employees/'.$employee->id)}}" >{{$employee->name}}</a></td>
                <td>{{$employee->department->name or ''}}</td>
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