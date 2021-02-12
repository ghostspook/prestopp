@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('providers.create') }}" class="btn btn-success mb-3">Nuevo/a Asistente</a>

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Ciudad</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($providers as $p)
                                <tr>
                                    <td>
                                        <a href="{{ route('providers.edit', [ 'provider' => $p ]) }}">
                                            {{ $p->name }}
                                        </a>
                                    </td>
                                    <td>{{ $p->city->name }}</td>
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
