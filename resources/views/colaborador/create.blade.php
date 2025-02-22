<x-layout>
    @if ($unidades->count() == 0)
        <p>Não é possível adicionar um colaborador sem uma unidade cadastrada.</p>
    @else
        <form method="POST" action="/colaboradores">
            @csrf
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" value="{{ old('nome') }}" required>
            <label for="email">E-mail:</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" required>
            <label for="cpf">CPF:</label>
            <input type="text" name="cpf" id="cpf" value="{{ old('cpf') }}" required>
            @error('cpf')
                <small style="color: red; display: block;">{{ $message }}</small>
            @enderror
            <label for="unidade_id">Unidade:</label>
            <select name="unidade_id" id="unidade_id">
                @foreach ($unidades as $unidade)
                    <option value="{{ $unidade->id }}">{{ $unidade->nome_fantasia }}</option>
                @endforeach
            </select>
            <button type="submit">Adicionar</button>
        </form>
    @endif
</x-layout>
