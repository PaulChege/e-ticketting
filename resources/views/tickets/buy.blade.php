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
        Buy tickets for:{{$event->name}}
         @if (count($event->tickets) > 0)
         
        <table class="table table-striped task-table">

                    <!-- Table Headings -->
                    <thead>
                        <th>Event</th>
                        <th>Price</th>
                        <th>Quantity</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                    <form action="{{ url('event/ticket/buy/'.$event->id) }}" method="POST">
                                {{ csrf_field() }}
                  @foreach($event->tickets as $ticket)
                        
                            <tr>
                                <!-- Task Name -->
                               
                                <td class="table-text">
                                    <div>{{ $ticket->name }}</div>
                                </td>
                                <td>
                                {{ $ticket->price }}
                                </td>
                                    <td>
                        
                                        <input type="number" name="{{$ticket->id}}" id="event-name" class="form-control">
                                
                                </td>
                             
                               
                            </tr>
                        @endforeach
                         <button type="submit" id="buy-ticket{{ $event->id }}" class="btn btn-danger">
                            <i class="fa fa-btn fa-trash"></i>Buy
                  </button>
                  </form>
                    </tbody>
                   
                </table>
                 
                @else
                There are no tickets available for this event

                @endif
    </div>
     </div>
     </div>
     </div>
     </div>




    <!-- TODO: Current Tasks -->
@endsection