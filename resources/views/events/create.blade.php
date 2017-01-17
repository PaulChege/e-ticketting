@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('errors.common')

        <!-- New Task Form -->

        <form action="{{ url('event') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
            {{ csrf_field() }}

            <!-- Task Name -->
            <div class="form-group">
                <label for="task-name" class="col-sm-3 control-label">Event</label>

                <div class="col-sm-6">
                    <input type="text" name="name" id="event-name" class="form-control">
                </div>
            </div>
              <div class="form-group">
                <label for="task-name" class="col-sm-3 control-label">Image</label>

                <div class="col-sm-6">
                    <input type="file" name="image" id="event-name" class="form-control">
                </div>
            </div>

            <!-- Add Event Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Add event
                    </button>
                </div>
            </div>
        </form>




    </div>
     </div>
     </div>
     </div>
     </div>




    <!-- TODO: Current Tasks -->
@endsection