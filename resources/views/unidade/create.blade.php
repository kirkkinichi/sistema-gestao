<x-layout>
    <h1>Adicionar Unidade</h1>
    @if ($bandeiras->count() == 0)
        <p>Não é possível adicionar uma unidade sem uma bandeira cadastrada.</p>
    @else
        <form method="POST" action="/unidades">
            @csrf
            <label for="nome_fantasia">Nome:</label>
            <input type="text" name="nome_fantasia" id="nome_fantasia" required>
            <label for="razao_social">Razão Social:</label>
            <input type="text" name="razao_social" id="razao_social" required>
            <label for="CNPJ">CNPJ:</label>
            <input type="text" name="CNPJ" id="CNPJ" required>
            <lab for="bandeira_id">Bandeira:</label>
                <select name="bandeira_id" id="bandeira_id">
                    @foreach ($bandeiras as $bandeira)
                        <option value="{{ $bandeira->id }}">{{ $bandeira->nome }}</option>
                    @endforeach
                </select>
            <button type="submit">Criar</button>
        </form>
    @endif
</x-layout>
