@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('providers.create') }}" class="btn btn-success mb-3">Nueva Tarea</a>

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Cliente</th>
                                <th>Fecha</th>
                                <th>Hora</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tasks as $t)
                                <tr>
                                    <td>
                                        <a href="{{ route('tasks.edit', [ 'task' => $t ]) }}">
                                            {{ $t->client->name }}
                                        </a>
                                    </td>
                                    <td>{{ $t->date_time->toDateString() }}</td>
                                    <td>{{ $t->date_time->toTimeString() }}</td>
                                    <td>{{ $t->stateText() }}</td>
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
