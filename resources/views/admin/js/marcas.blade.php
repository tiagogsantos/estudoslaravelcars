<script type="text/javascript">

    $(document).ready(function () {
        $(".storeMarcas").on('submit', function (e) {
            e.preventDefault();
            let button = $(this);

            Swal.fire({
                icon: 'info',
                title: 'Atenção!',
                text: 'Deseja realmente cadastrar a marca?',
                showDenyButton: true,
                showCancelButton: false,
                confirmButtonText: 'Sim',
                confirmButtonColor: '#3085d6',
                denyButtonText: `Não`,
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'post',
                        dataType: 'json',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: button.data('route'),
                        data: $('#formCadastroMarca').serialize(),
                        success: function (response) {
                            if (response.mensagem) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Atenção',
                                    text: response.mensagem,
                                });
                                return false;
                            }

                            Swal.fire({
                                icon: 'success',
                                title: response.sucesso,
                                showDenyButton: false,
                                showCancelButton: false,
                                confirmButtonText: 'Ok',
                            });
                        }
                    });
                } else if (result.isDenied) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Cancelado',
                        text: 'Cadastro cancelado com sucesso!'
                    });
                }
            });
        });
    });
</script>
