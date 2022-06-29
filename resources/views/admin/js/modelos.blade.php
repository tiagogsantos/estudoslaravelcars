<script type="text/javascript">

    // Pega o valor do id pela marca
    $("#brands").focusout(function () {
        let idMarca = $("#brands option:selected").val();
    });

    $("#modelosVeiculos").focusout(function () {
        let idModelo = $("#modelosVeiculos option:selected").val();
    });

    $("#anoModelo").focusout(function () {
        let idAno = $("#anoModelo option:selected").val();
    });

    // Listar as listas de modelos
    function getListModels() {

        let idMarca = $("#brands").val();

        $.ajax({
            url: '{{ route('apimodels') }}',
            type: 'GET',
            dataType: 'json',
            data: {
                idMarca: idMarca,
                _token: '{{ csrf_token() }}'
            },
            success: function (response) {

                let listaModelos = $(".modelosVeiculos").val();

                listaModelos = '<option value="">Selecione...</option>';

                $.each(response, function (value, item) {
                    listaModelos += '<option value="' + item.codigo + '"> ' + item.nome + ' </option>'
                });

                listaModelos = $(".modelosVeiculos").html(listaModelos);

            },
            error: function (response) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops!',
                    text: 'Não foi possível retornar os dados'
                });
            }
        });
    }

    // Listar as listas de anos dos veiculos
    function getAnoModels() {

        let idMarca = $("#brands").val();
        let idModelo = $("#modelosVeiculos").val();

        $.ajax({
            url: '{{ route('apiano') }}',
            type: 'GET',
            dataType: 'json',
            data: {
                idMarca: idMarca,
                idModelo: idModelo,
                _token: '{{ csrf_token() }}'
            },
            success: function (response) {

                let listaAnos = $(".anoModelo").val();

                listaAnos = '<option value="">Selecione...</option>';

                $.each(response, function (value, item) {
                    listaAnos += '<option value="' + item.codigo + '"> ' + item.nome + ' </option>'
                });

                listaAnos = $(".anoModelo").html(listaAnos);

            },
            error: function (response) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops!',
                    text: 'Não foi possível retornar os dados'
                });
            }
        });
    }

    // Listar os dados dos veiculos
    function getDetailsModels() {

        let idMarca = $("#brands").val();
        let idModelo = $("#modelosVeiculos").val();
        let idAno = $("#anoModelo").val();

        $.ajax({
            url: '{{ route('apidetailscar') }}',
            type: 'GET',
            dataType: 'json',
            data: {
                idMarca: idMarca,
                idModelo: idModelo,
                idAno: idAno,
                _token: '{{ csrf_token() }}'
            },
            success: function (response) {
                console.log('Retorno de dados');
                console.log('response')

                $('[name="modelo"]').val(response.Modelo);
                $('[name="combustivel"]').val(response.Combustivel);
                $('[name="valor"]').val(response.Valor);
            },
            error: function (response) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops!',
                    text: 'Não foi possível retornar os dados'
                });
            }
        });
    }

</script>
