@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Nuevo cliente</div>
                <div class="card-body">
                    <form action="{{ route('clients.update', [ 'client' => $client ]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name" class="@error('name') text-danger @enderror">Nombre</label>
                            <input id="name" name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ $client->name }}" required/>
                            @error('name')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="form-group">
                            <label for="address" class="@error('address') text-danger @enderror">Dirección</label>
                            <input id="address" name="address" type="text" class="form-control @error('address') is-invalid @enderror" value="{{ $client->address }}"/>
                            @error('address')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="form-group">
                            <label for="city" class="@error('city_id') text-danger @enderror">Ciudad</label>
                            <select class="form-control @error('city_id') text-danger @enderror" name="city_id">
                                @foreach($cities as $c)
                                    <option value="{{ $c->id }}" @if($client->city_id == $c->id) selected @endif>
                                        {{ $c->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('city_id')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <button type="submit" class="btn btn-success">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">Cuenta de usuario</div>
                <div class="card-body">
                    @if(!$client->user)
                    <form action="{{ route('clients.user.store', [ 'client' => $client ]) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="email" class="@error('email') text-danger @enderror">Email</label>
                            <input id="email" name="email" type="email" class="form-control @error('email') is-invalid @enderror" required/>
                            @error('email')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="form-group">
                            <label for="password" class="@error('password') text-danger @enderror">Password</label>
                            <input id="password" name="password" type="password" class="form-control @error('password') is-invalid @enderror" required/>
                            @error('password')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <button type="submit" class="btn btn-success">Guardar</button>
                    </form>
                    @else
                    <p>{{ $client->user->email }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
