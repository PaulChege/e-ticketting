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


     
         Tickets for: {{ $event->name }}
                      <table class="table table-striped task-table">

                    <!-- Table Headings -->
                    <thead>
                        <th>Ticket Name</th>
                        <th>Price</th>
                       
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                  
                        @foreach ($event->tickets as $ticket)
                            <tr>
                                <!-- Task Name -->
                                <td class="table-text">
                                    <div>{{ $ticket->name }}</div>
                                </td>
                                <td class="table-text">
                                    <div>{{ $ticket->price }}</div>
                                </td>

                                <td>
                                <a href="/event/ticket/edit/{{$ticket->id}}" class="btn btn-default" role="button">Edit</a>
                                </td>

                                <td>
                                    
                                    <form action="{{ url('event/tickets/manage/delete/'.$event->id .'/'.$ticket->id) }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                        <button type="submit" id="delete-ticket-{{ $ticket->id }}" class="btn btn-danger">
                                            <i class="fa fa-btn fa-trash"></i>Remove
                                        </button>
                                    </form>
                                </td>
                                
                            </tr>
                        @endforeach
                    </tbody>
                </table>


        <!-- New Task Form -->
        <form action="{{ url('event/tickets/manage/create/'.$event->id) }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <!-- Task Name -->
            <div class="form-group">
                <label for="task-name" class="col-sm-3 control-label">Ticket Name</label>

                <div class="col-sm-6">
                    <input type="text" name="name" id="ticket-name" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="task-name" class="col-sm-3 control-label">Ticket Price</label>

                <div class="col-sm-6">
                    <input type="text" name="price" id="ticket-price" class="form-control">
                </div>
            </div>

            <!-- Add Event Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Add Ticket
                    </button>
                </div>
            </div>
        </form>




    </div>
     </div>
     </div>
     </div>




    <!-- TODO: Current Tasks -->
@endsection