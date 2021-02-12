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
    </div>
</div>
@endsection
