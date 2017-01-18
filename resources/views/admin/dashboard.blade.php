@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

         <a href="/admin/create_admin" class="btn btn-default" role="button">Create Admin</a>

         <form action="{{ url('admin/test' ) }}" method="POST">
                                        {{ csrf_field() }}
                                        <button type="submit" id="delete-ticket-" class="btn btn-danger">
                                            <i class="fa fa-btn fa-trash"></i>Test
                                    </form>

            </div>
        </div>
    </div>
</div>
@endsection
