@extends('layouts.app')

@section('content')


<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">
					<h1>Редактирование пользователя</h1>
				</div>
				<div class="card-body">
					<form method="POST" enctype="multipart/form-data" action="{{ route('users.update', $user) }}">
						<div>
							@method('PUT')
							@csrf
							<div class="form-group row">
								<label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Имя') }}</label>

								<div class="col-md-6">
									<input id="name" type="name" class="form-control @error('name') is-invalid @enderror" name="name" value="@isset($user){{ $user->name }}@endisset" required autocomplete="имя" autofocus>

									@error('name')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
							</div>
							<br>
							<div class="form-group row">
								<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

								<div class="col-md-6">
									<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="@isset($user){{ $user->email }}@endisset" required autocomplete="email" autofocus>

									@error('email')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
							</div>
							<br>
							<div class="form-group row">
								<label for="tel" class="col-md-4 col-form-label text-md-right">{{ __('Tel') }}</label>

								<div class="col-md-6">
									<input id="phone" placeholder="(999) 999-9999" type="tel" class="form-control @error('tel') is-invalid @enderror" name="tel" value="@isset($user){{ $user->tel }}@endisset" autocomplete="tel" autofocus>

									@error('tel')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
							</div>
							<br>
							<div class="form-group row">
								<label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Аватар') }}</label>
								<div class="col-md-6">
									<label class="form-control @error('image') is-invalid @enderror btn btn-info">
										Загрузить <input style="display: none;" type="file" name="image">
									</label>
									@error('image')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
							</div>
							<button class="btn btn-success">Сохранить</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection