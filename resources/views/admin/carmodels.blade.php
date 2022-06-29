@extends('admin.layout.app')

@section('content')

    <div class="container">
        <h2>Cadastre-se o seu anuncio</h2>
        <div class="row">
            <form method="POST" id="formCadastroMarca" class="storeMarcas" action=""
                  data-route="{{ route('admin.store') }}" enctype="multipart/form-data">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Marca:</label>
                        <select class="select2 form-control brands" name="" id="brands" onchange="getListModels();">
                            <option value="#">Selecione...</option>
                            @foreach($brands as $brand)
                                <option value="{{ $brand['codigo'] }}">{{ $brand['codigo'] }} - {{ $brand['nome'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Modelo:</label>
                        <select class="select2 form-control modelosVeiculos" name="" id="modelosVeiculos" onchange="getAnoModels();">
                            <option>Selecione</option>
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Ano:</label>
                        <select class="select2 form-control anoModelo" name="" id="anoModelo" onchange="getDetailsModels();">
                            <option>Selecione</option>
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Modelo:</label>
                        <input type="text" class="form-control" name="modelo" value="">
                    </div>

                    <div class="form-group col-md-6">
                        <label>Combustivel:</label>
                        <input type="text" class="form-control" name="combustivel" value="">
                    </div>

                    <div class="form-group col-md-6">
                        <label>Valor atual:</label>
                        <input type="text" class="form-control" name="valor" value="">
                    </div>

                </div>
                <button class="btn btn-outline-success" type="submit">Cadastrar Modelo</button>
            </form>
        </div>
    </div>

@endsection
