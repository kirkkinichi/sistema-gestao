<x-layout>
    <form method="POST" action="/bandeira/{{ $bandeira->id }}">
        @csrf
        @method('PATCH')
        @if ($grupoEconomicos->isEmpty())
            <p>Não há grupo econômico cadastrado, por favor cadastre pelo menos um grupo econômico</p>
        @else
            <label for="nome">Selecione o grupo econômico:</label>
            <select name="grupo_economico_id" id="grupo_economico_id" required>
                @foreach ($grupoEconomicos as $grupoEconomico)
                    <option value="{{ $grupoEconomico->id }}" {{ $bandeira->grupo_economico_id == $grupoEconomico->id ? 'selected' : '' }}>{{ $grupoEconomico->nome }}</option>
                @endforeach
            </select>
            <label for="nome">Nome da Bandeira:</label>
            <input type="text" id="nome" name="nome" value="{{ $bandeira->nome }}" required>
            <button type="submit">Editar</button>
        @endif
    </form>
</x-layout>
