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
        
    </div>
     @if (count($transactions) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                My Tickets
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table">

                    <!-- Table Headings -->
                    <thead>
                        <th>Ticket Number</th>
                        <th>Type</th>
                        <th>Event</th>
                    
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @foreach ($transactions as $transaction)
                            <tr>
                                <!-- Task Name -->
                                <td class="table-text">
                                    <div>{{ $transaction->ticket_no }}</div>
                                </td>
                                <td class="table-text">
                                    <div>{{ $transaction->ticket->name }}</div>
                                </td>
                                <td class="table-text">
                                    <div>{{ $transaction->event->name }}</div>
                                </td>
                              <td>
                              <form action="{{ url('event/ticket/download/'.$transaction->id ) }}" method="POST">
                                        {{ csrf_field() }}
                                        <button type="submit" id="delete-ticket-" class="btn btn-danger">
                                            <i class="fa fa-btn fa-trash"></i>Download Ticket
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