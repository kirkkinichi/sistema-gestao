<form method="POST" action="/grupo-economico/{{ $grupo->id }}">
    @csrf
    @method('PATCH')
    <label for="updateNome">Novo Nome:</label>
    <input type="text" id="updateNome" name="nome" value="{{ $grupo->nome }}">
    <br>
    <button type="submit">Atualizar</button>
    <button form='delete-form'>Deletar</button>
    <a href="/grupo-economico">Cancelar</a>
</form>

<form method="POST" action="/grupo-economico/{{ $grupo->id }}" id='delete-form' class="hidden">
    @csrf
    @method('DELETE')
</form>
