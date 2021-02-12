@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Resumen</div>

                <div class="card-body">
                    <p>
                        Clientes:
                        <a href="{{ route('clients.index') }}">
                            {{ \App\Models\Client::count() }}
                        </a>
                    </p>
                    <p>
                        Usuarios: {{ \App\Models\User::count() }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
