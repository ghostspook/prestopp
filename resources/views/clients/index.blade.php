@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
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
                            @foreach($clients as $c)
                                <tr>
                                    <td>{{ $c->name }}</td>
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
