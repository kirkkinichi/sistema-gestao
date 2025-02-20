<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unidade - CRUD</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>
<body>
    <h1>Unidade - CRUD</h1>

    <h2 id="formTitle">Criar Nova Unidade</h2>
    <form id="unidadeForm">
        @csrf
        <input type="hidden" id="unidadeId" name="unidade_id">

        <label for="nome_fantasia">Nome Fantasia:</label>
        <input type="text" id="nome_fantasia" name="nome_fantasia" required>

        <label for="razao_social">Razão Social:</label>
        <input type="text" id="razao_social" name="razao_social" required>

        <label for="cnpj">CNPJ:</label>
        <input type="text" id="cnpj" name="cnpj" required>

        <label for="bandeira_id">Bandeira:</label>
        <select id="bandeira_id" name="bandeira_id" required>
            @foreach($bandeiras as $bandeira)
                <option value="{{ $bandeira->id }}">{{ $bandeira->nome }}</option>
            @endforeach
        </select>

        <button type="submit" id="submitBtn">Criar</button>
    </form>

    <hr>

    <div id="response"></div>

    <hr>

    <h2>Lista de Unidades</h2>
    <ul id="unidadeList"></ul>

    <script>
        $(document).ready(function() {
            $('#unidadeForm').on('submit', function(e) {
                e.preventDefault();

                var formData = {
                    _token: '{{ csrf_token() }}',
                    nome_fantasia: $('#nome_fantasia').val(),
                    razao_social: $('#razao_social').val(),
                    cnpj: $('#cnpj').val(),
                    bandeira_id: $('#bandeira_id').val()
                };

                var unidadeId = $('#unidadeId').val();

                var url = unidadeId ? '/api/unidade/' + unidadeId : '{{ url("/api/unidade") }}';
                var type = unidadeId ? 'PUT' : 'POST';

                $.ajax({
                    url: url,
                    type: type,
                    data: formData,
                    success: function(response) {
                        var successMessage = unidadeId ? 'Unidade atualizada com sucesso.' : 'Unidade criada com sucesso.';
                        $('#response').html(successMessage);
                        $('#unidadeForm')[0].reset();
                        $('#submitBtn').text('Criar');
                        loadData();
                    },
                    error: function(xhr) {
                        $('#response').html('Erro ao processar a unidade: ' + xhr.responseText);
                    }
                });
            });

            function loadData() {
                $.ajax({
                    url: '{{ url("/api/unidade") }}',
                    type: 'GET',
                    success: function(response) {
                        $('#unidadeList').html('');
                        response.forEach(function(item) {
                            $('#unidadeList').append(`
                                <li>
                                    ${item.nome_fantasia} - ${item.razao_social} - ${item.cnpj} - Bandeira: ${item.bandeira.nome}
                                    (ID: ${item.id})
                                    <button class="editBtn" data-id="${item.id}">Editar</button>
                                    <button class="deleteBtn" data-id="${item.id}">Deletar</button>
                                </li>
                            `);
                        });
                    },
                    error: function(xhr) {
                        $('#response').html('Erro ao carregar unidades: ' + xhr.responseText);
                    }
                });
            }

            loadData();

            $(document).on('click', '.editBtn', function() {
                var unidadeId = $(this).data('id');
                $.ajax({
                    url: '/api/unidade/' + unidadeId,
                    type: 'GET',
                    success: function(response) {
                        $('#formTitle').text('Editar Unidade');
                        $('#unidadeId').val(response.id);
                        $('#nome_fantasia').val(response.nome_fantasia);
                        $('#razao_social').val(response.razao_social);
                        $('#cnpj').val(response.cnpj);
                        $('#bandeira_id').val(response.bandeira_id);
                        $('#submitBtn').text('Atualizar');
                    },
                    error: function(xhr) {
                        $('#response').html('Erro ao carregar os dados da unidade: ' + xhr.responseText);
                    }
                });
            });

            $(document).on('click', '.deleteBtn', function() {
                var unidadeId = $(this).data('id');
                $.ajax({
                    url: '/api/unidade/' + unidadeId,
                    type: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}',
                    },
                    success: function(response) {
                        $('#response').html('Unidade deletada com sucesso.');
                        loadData();
                    },
                    error: function(xhr) {
                        $('#response').html('Erro ao deletar unidade: ' + xhr.responseText);
                    }
                });
            });
        });
    </script>
</body>
</html>
