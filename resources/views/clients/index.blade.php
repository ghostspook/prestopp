@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('clients.create') }}" class="btn btn-success mb-3">Nuevo Cliente</a>

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Ciudad</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($clients as $c)
                                <tr>
                                    <td>
                                        <a href="{{ route('clients.edit', [ 'client' => $c ]) }}">
                                            {{ $c->name }}
                                        </a>
                                    </td>
                                    <td>
                                        @if(!$c->user)
                                        -
                                        @else
                                        {{ $c->user->email }}
                                        @endif
                                    </td>
                                    <td>{{ $c->city->name }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
