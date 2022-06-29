@extends('admin.layout.app')

@section('content')

    <h1 class="text-center">Laravel Sweet Alert Notification</h1>
    @include('sweet::alert')

    <div class="container my-5">
        <div class="row">
            <div class="col-md-4">
                <a href="{{ route('admin.create') }}" class="btn btn-outline-primary">Cadastrar Marca</a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('admin.carmodels') }}" class="btn btn-outline-warning">Cadastrar Modelos</a>
            </div>
            <div class="col-md-4">
                <button class="btn btn-outline-info">Cadastrar Motos</button>
            </div>
        </div>
    </div>

@endsection
