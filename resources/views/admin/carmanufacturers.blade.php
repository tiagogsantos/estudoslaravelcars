@extends('admin.layout.app')

@section('content')

    <div class="container">
        <div class="row">
            <form method="POST" id="formCadastroMarca" class="storeMarcas" action=""
                  data-route="{{ route('admin.store') }}" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Nome da marca:</label>
                    <input type="text" name="name" id="marca" class="form-control" required>
                </div>
                <button class="btn btn-outline-success" type="submit">Cadastrar Marca</button>
            </form>
        </div>
    </div>

@endsection
