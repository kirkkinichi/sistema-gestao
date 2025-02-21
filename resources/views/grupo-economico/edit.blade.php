<x-layout>
    <form method="POST" action="/grupo-economico/{{ $grupoEconomico->id }}">
        @csrf
        @method('PATCH')
        <label for="nome">Nome do Grupo Econômico:</label>
        <input type="text" id="nome" name="nome" value="{{ $grupoEconomico->nome }}" required>
        <button type="submit">Editar</button>
    </form>
</x-layout>
