<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grupo Econômico - CRUD</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>

<body>
    <h1>Grupo Econômico - CRUD</h1>

    <h2>Criar Novo Grupo Econômico</h2>
    <form id="grupoEconomicoForm">
        @csrf
        <label for="nome">Nome do Grupo Econômico:</label>
        <input type="text" id="nome" name="nome" required>
        <button type="submit">Criar</button>
    </form>

    <hr>

    <h2>Atualizar Grupo Econômico</h2>
    <form id="updateGrupoEconomicoForm">
        @csrf
        @method('PUT')
        <label for="updateId">ID do Grupo Econômico:</label>
        <input type="number" id="updateId" name="id" required>
        <label for="updateNome">Novo Nome:</label>
        <input type="text" id="updateNome" name="nome" required>
        <button type="submit">Atualizar</button>
    </form>

    <hr>

    <h2>Deletar Grupo Econômico</h2>
    <form id="deleteGrupoEconomicoForm">
        @csrf
        @method('DELETE')
        <label for="deleteId">ID do Grupo Econômico:</label>
        <input type="number" id="deleteId" name="id" required>
        <button type="submit">Deletar</button>
    </form>

    <hr>

    <h2>Lista de Grupos Econômicos</h2>
    <button id="loadDataBtn">Carregar Grupos Econômicos</button>
    <ul id="grupoList"></ul>

    <hr>

    <div id="response"></div>

    <script>
        $(document).ready(function() {
            $('#grupoEconomicoForm').on('submit', function(e) {
                e.preventDefault();
                var nome = $('#nome').val();
                $.ajax({
                    url: '{{ url('/api/grupo-economico') }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        nome: nome
                    },
                    success: function(response) {
                        $('#response').html('Grupo Econômico criado com sucesso: ' + response
                            .nome);
                        $('#grupoList').append('<li>' + response.nome + ' (ID: ' + response.id +
                            ')</li>');
                        $('#nome').val('');
                    },
                    error: function(xhr) {
                        $('#response').html('Erro ao criar grupo econômico: ' + xhr
                            .responseText);
                    }
                });
            });

            $('#updateGrupoEconomicoForm').on('submit', function(e) {
                e.preventDefault();
                var id = $('#updateId').val();
                var nome = $('#updateNome').val();
                $.ajax({
                    url: '{{ url('/api/grupo-economico') }}/' + id,
                    type: 'PUT',
                    data: {
                        _token: '{{ csrf_token() }}',
                        nome: nome
                    },
                    success: function(response) {
                        $('#response').html('Grupo Econômico atualizado com sucesso: ' +
                            response.nome);
                    },
                    error: function(xhr) {
                        $('#response').html('Erro ao atualizar grupo econômico: ' + xhr
                            .responseText);
                    }
                });
            });

            $('#deleteGrupoEconomicoForm').on('submit', function(e) {
                e.preventDefault();
                var id = $('#deleteId').val();
                $.ajax({
                    url: '{{ url('/api/grupo-economico') }}/' + id,
                    type: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}',
                    },
                    success: function(response) {
                        $('#response').html('Grupo Econômico deletado com sucesso');
                        $('#deleteId').val('');
                        loadData();
                    },
                    error: function(xhr) {
                        $('#response').html('Erro ao deletar grupo econômico: ' + xhr
                            .responseText);
                    }
                });
            });

            $('#loadDataBtn').on('click', function() {
                loadData();
            });

            function loadData() {
                $.ajax({
                    url: '{{ url('/api/grupo-economico') }}',
                    type: 'GET',
                    success: function(response) {
                        $('#grupoList').html('');
                        response.forEach(function(item) {
                            $('#grupoList').append('<li>' + item.nome + ' (ID: ' + item.id +
                                ')</li>');
                        });
                    },
                    error: function(xhr) {
                        $('#response').html('Erro ao carregar grupos econômicos: ' + xhr.responseText);
                    }
                });
            }
        });
    </script>
</body>

</html>
