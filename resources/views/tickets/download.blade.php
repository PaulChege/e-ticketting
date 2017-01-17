<style type="text/css">
	table td, table th{
		border:1px solid black;
	}
</style>
<div class="container">

CUSTOMER : {{ $transaction->user->name }}
	<br/>
	
	EVENT : {{ $transaction->event->name }}
	<table>
		<tr>
			<th>Ticket Number</th>
			<th>Type</th>
			
		</tr>
		<tr>
		<td>{{ $transaction->ticket_no }}</td>
		<td>{{ $transaction->ticket->name }}</td>
		</tr>
		
	</table>
</div>