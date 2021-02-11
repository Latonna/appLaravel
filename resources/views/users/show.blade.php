@extends('layouts.app')

@section('content')


<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">
					<nav class="navbar navbar-light bg-light">
						<a href="#" class="navbar-brand">{{ $user->name }}</a>
						@is_user($user)
						<a class="btn btn-outline-success my-2 my-sm-0" href="{{ route('users.edit', $user) }}">Редактировать</a>
						@endis_user
					</nav>
					<div class="card-body">
						<table class="table">
							<thead>
								<tr>
									<th>
										Поле
									</th>
									<th>
										Значение
									</th>
								</tr>
							</thead>

							<tbody>
								<tr>
									<td>Имя</td>
									<td>{{ $user->name }}</td>
								</tr>
								<tr>
									<td>E-mail</td>
									<td>{{ $user->email }}</td>
								</tr>
								<tr>
									<td>Tel</td>
									<td>{{ $user->tel }}</td>
								</tr>
								<tr>
									<td>Аватар</td>
									<td>
										<img class="img__avatar" src="{{Storage::url($user->image)}}" height="240px" alt="Image">
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	@endsection