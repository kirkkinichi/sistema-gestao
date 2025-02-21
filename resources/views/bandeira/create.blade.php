<x-layout>
    <form method="POST" action="/bandeira">
        @csrf

        @if ($grupoEconomicos->isEmpty())
            <p>Não há grupo econômico cadastrado, por favor cadastre pelo menos um grupo econômico</p>
        @else
            <label for="nome">Selecione o grupo econômico:</label>
            <select name="grupo_economico_id" id="grupo_economico_id" required>
                @foreach ($grupoEconomicos as $grupoEconomico)
                    <option value="{{ $grupoEconomico->id }}">{{ $grupoEconomico->nome }}</option>
                @endforeach
            </select>
            <label for="nome">Nome da Bandeira:</label>
            <input type="text" id="nome" name="nome" required>
            <button type="submit">Criar</button>
        @endif
    </form>
</x-layout>
