@extends('admin.layout')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="error-template" style="{padding: 40px 15px;text-align: center;">
                    <h1>
                        Oops!</h1>
                    <h2>
                        404 Not Found</h2>
                    <div class="error-details">
                        Sorry, an error has occured, Requested page not found!
                    </div>
                    <div class="error-actions" style="margin-top:15px;margin-bottom:15px;">
                        <a href="/" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-home"></span> Take Me Home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop