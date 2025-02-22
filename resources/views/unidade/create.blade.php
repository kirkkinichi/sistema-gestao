<x-layout>
    <h1>Adicionar Unidade</h1>
    @if ($bandeiras->count() == 0)
        <p>Não é possível adicionar uma unidade sem uma bandeira cadastrada.</p>
    @else
        <form method="POST" action="/unidades">
            @csrf
            <label for="nome_fantasia">Nome:</label>
            <input type="text" name="nome_fantasia" id="nome_fantasia" value="{{ old('nome_fantasia') }}" required>
            @error('nome_fantasia')
                <small style="color: red; display: block;">{{ $message }}</small>
            @enderror

            <label for="razao_social">Razão Social:</label>
            <input type="text" name="razao_social" id="razao_social" value="{{ old('razao_social') }}" required>
            @error('razao_social')
                <small style="color: red; display: block;">{{ $message }}</small>
            @enderror

            <label for="cnpj">CNPJ:</label>
            <input type="text" name="cnpj" id="cnpj" value="{{ old('cnpj') }}" required>
            @error('cnpj')
                <small style="color: red; display: block;">{{ $message }}</small>
            @enderror

            <label for="bandeira_id">Bandeira:</label>
            <select name="bandeira_id" id="bandeira_id">
                @foreach ($bandeiras as $bandeira)
                    <option value="{{ $bandeira->id }}" {{ old('bandeira_id') == $bandeira->id ? 'selected' : '' }}>
                        {{ $bandeira->nome }}
                    </option>
                @endforeach
            </select>
            @error('bandeira_id')
                <small style="color: red; display: block;">{{ $message }}</small>
            @enderror

            <button type="submit">Criar</button>
        </form>
    @endif
</x-layout>
