@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Events</div>

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
                                    
                                        <a href="/event/ticket/buy/{{$event->id}}" class="btn btn-default" role="button">Buy Ticket</a>

    </td>
                                
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
