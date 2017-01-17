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

      
        @if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
    @endif

    
       
        
<a href="/event/create" class="btn btn-default" role="button">Add Event</a>
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
                                <td>
                                
                                <img src="/images/{{$event->imagepath}}"  height="100" width="100">
                                </td>
                                <td class="table-text">
                                    <div>{{ $event->name }}</div>
                                </td>

                                <td>
                                


                                <a href="/event/tickets/manage/{{$event->id}}" class="btn btn-default" role="button">Manage Tickets</a>
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

</div>
</div>
</div>
</div>


    <!-- TODO: Current Tasks -->
@endsection