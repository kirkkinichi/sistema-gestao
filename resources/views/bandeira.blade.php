<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bandeira - CRUD</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>

<body>
    <h1>Bandeira - CRUD</h1>

    <h2 id="formTitle">Criar Nova Bandeira</h2>
    <form id="bandeiraForm" method="POST">
        @csrf
        <input type="hidden" id="bandeiraId" name="bandeiraId">
        <label for="nome">Nome da Bandeira:</label>
        <input type="text" id="nome" name="nome" required>

        <label for="grupo_economico_id">Grupo Econômico:</label>
        <select id="grupo_economico_id" name="grupo_economico_id" required>
            @foreach ($grupoEconomicos as $grupo)
                <option value="{{ $grupo->id }}">{{ $grupo->nome }}</option>
            @endforeach
        </select>

        <button type="submit" id="submitBtn">Criar</button>
    </form>

    <hr>

    <div id="response"></div>

    <hr>

    <h2>Lista de Bandeiras</h2>
    <ul id="bandeiraList"></ul>

    <script>
        $(document).ready(function() {
            $('#bandeiraForm').on('submit', function(e) {
                e.preventDefault();
                var nome = $('#nome').val();
                var grupo_economico_id = $('#grupo_economico_id').val();
                var bandeiraId = $('#bandeiraId').val();
                var url = '/api/bandeira';
                var type = 'POST';

                if (bandeiraId) {
                    url = '/api/bandeira/' + bandeiraId;
                    type = 'PUT';
                }

                $.ajax({
                    url: url,
                    type: type,
                    data: {
                        _token: '{{ csrf_token() }}',
                        nome: nome,
                        grupo_economico_id: grupo_economico_id
                    },
                    success: function(response) {
                        $('#response').html('Bandeira salva com sucesso: ' + response.nome);
                        loadData();
                        resetForm();
                    },
                    error: function(xhr) {
                        $('#response').html('Erro ao salvar bandeira: ' + xhr.responseText);
                    }
                });
            });

            function loadData() {
                $.ajax({
                    url: '{{ url('/api/bandeira') }}',
                    type: 'GET',
                    success: function(response) {
                        $('#bandeiraList').html('');
                        response.forEach(function(item) {
                            $('#bandeiraList').append('<li>' + item.nome + ' - ' + item
                                .grupo_economico.nome + ' (ID: ' + item.id + ')<br>' +
                                'Criada em: ' + formatDate(item.created_at) + '<br>' +
                                'Atualizada em: ' + formatDate(item.updated_at) +
                                ' <button class="editBtn" data-id="' + item.id +
                                '">Editar</button> <button class="deleteBtn" data-id="' +
                                item.id + '">Deletar</button></li>' +
                                '<hr>');
                        });
                    },
                    error: function(xhr) {
                        $('#response').html('Erro ao carregar bandeiras: ' + xhr.responseText);
                    }
                });
            }

            $(document).on('click', '.editBtn', function() {
                var bandeiraId = $(this).data('id');
                $.ajax({
                    url: '/api/bandeira/' + bandeiraId,
                    type: 'GET',
                    success: function(response) {
                        $('#formTitle').text('Editar Bandeira');
                        $('#bandeiraId').val(response.id);
                        $('#nome').val(response.nome);
                        $('#grupo_economico_id').val(response.grupo_economico.id);
                        $('#submitBtn').text('Atualizar');
                    },
                    error: function(xhr) {
                        $('#response').html('Erro ao carregar dados para edição: ' + xhr
                            .responseText);
                    }
                });
            });

            $(document).on('click', '.deleteBtn', function() {
                var bandeiraId = $(this).data('id');
                $.ajax({
                    url: '/api/bandeira/' + bandeiraId,
                    type: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}',
                    },
                    success: function(response) {
                        $('#response').html('Bandeira deletada com sucesso.');
                        loadData();
                    },
                    error: function(xhr) {
                        $('#response').html('Erro ao deletar bandeira: ' + xhr.responseText);
                    }
                });
            });

            function resetForm() {
                $('#formTitle').text('Criar Nova Bandeira');
                $('#bandeiraId').val('');
                $('#nome').val('');
                $('#grupo_economico_id').val('');
                $('#submitBtn').text('Criar');
            }

            function formatDate(date) {
                const options = {
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric',
                    hour: 'numeric',
                    minute: 'numeric',
                    second: 'numeric'
                };
                const formattedDate = new Date(date).toLocaleDateString('pt-BR', options);
                return formattedDate;
            }

            loadData();
        });
    </script>
</body>

</html>
