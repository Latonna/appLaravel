@extends('layouts.app')

@section('content')


<div class="container">
	@if(session()->has('success'))
	<p class="alert alert-success">{{session()->get('success')}}</p>
	@elseif(session()->has('warning'))
	<p class="alert alert-warning">{{session()->get('warning')}}</p>
	@endif


	<table class="table">
		<thead>
			<tr>
				<th> # </th>
				<th> Name </th>
				<th> E-mail </th>
				<th> Admin </th>
				<th> Ban </th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach($users as $user)

			<tr>
				<td>{{ $user->id }}</td>
				<td>{{ $user->name }}</td>
				<td>{{ $user->email }}</td>
				<td>{{ $user->is_admin }}</td>
				<td>{{ $user->is_banned }}</td>
				<td>
					<div class="btn-group" role="group">
						<a class="btn btn-success" type="button" href="{{ route('users.show', $user) }}" title="view profile"><img src="../icons/1.png" width="24px" alt="See"></a>
						<a class="btn btn-danger" type="button" href="{{ route('admin.ban', $user) }}" title="ban user"><img src="../icons/2.png" width="24px" alt="Ban"></a>
						<a class="btn btn-info" type="button" href="{{ route('admin.unban', $user) }}" title="unban user"><img src="../icons/4.png" width="24px" alt="Ban"></a>
						<a class="btn btn-warning" type="button" href="{{ route('admin.is-admin', $user) }}" title="make an admin"><img src="../icons/3.png" width="24px" alt="Admin"></a>
					</div>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	@endsection