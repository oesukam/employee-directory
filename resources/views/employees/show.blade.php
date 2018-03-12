@extends('admin.layout')

@section('content')

<div class="container">

    <div id="details">
        <div>
            <p>
                <img src="/{{ ($employee->photo != '' ? $employee->photo : 'images/avatar.png')}}" width="auto" height="160">
            </p>
            <h3><strong>{{ $employee->name }}</strong></h3>
            <h4>Job Title: {{ $employee->job_title }}</h4>
            <br>
            <table class="table table-striped">

                <tbody>
                    <tr>
                        <td>Department:</td>
                        <td><i class="fa fa-home"></i> {{ $employee->department->name or ''}}</td>
                    </tr>
                    <tr>
                        <td>Cell Phone:</td>
                        <td><i class="fa fa-phone"></i> {{ $employee->cellphone }}</td>
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <td><i class="fa fa-envelope"></i> <a href="mailto:{{ $employee->email }}">{{ $employee->email }}</a></td>
                    </tr>
                </tbody>
            </table>

            <div class="alert alert-warning">
            <h4 class="alert-heading">Warning</h4>
              The phone numbers, email addresses, and job title are fake.
            </div>
        </div>
    </div>

    <a href="/employees/"><button class="btn btn-success"><i class="fa fa-chevron-circle-left"></i> Back</button></a>

</div>

@stop