@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('errors.common')

        <!-- New Task Form -->
        <form action="{{ url('event') }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <!-- Task Name -->
            <div class="form-group">
                <label for="task-name" class="col-sm-3 control-label">Event</label>

                <div class="col-sm-6">
                    <input type="text" name="name" id="event-name" class="form-control">
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
     @if (count($events) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                My Events
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table">

                    <!-- Table Headings -->
                    <thead>
                        <th>Event</th>
                        <th>&nbsp;</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @foreach ($events as $event)
                            <tr>
                                <!-- Task Name -->
                                <td class="table-text">
                                    <div>{{ $event->name }}</div>
                                </td>

                                <td>
                                    
        <form action="{{ url('event/'.$event->id) }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}

            <button type="submit" id="delete-event-{{ $event->id }}" class="btn btn-danger">
                <i class="fa fa-btn fa-trash"></i>Remove
            </button>
        </form>
    </td>
                                
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif




    <!-- TODO: Current Tasks -->
@endsection