<x-layout>
    <h1>Editar Colaborador</h1>
    @if ($unidades->count() == 0)
        <p>Não é possível editar um colaborador sem uma unidade cadastrada.</p>
    @else
        <form action="/colaboradores/{{ $colaborador->id }}" method="post">
            @csrf
            @method('PATCH')
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" value="{{ $colaborador->nome }}" required>
            <label for="email">E-mail:</label>
            <input type="email" name="email" id="email" value="{{ $colaborador->email }}" required>
            <label for="cpf">cpf:</label>
            <input type="text" name="cpf" id="cpf" value="{{ $colaborador->cpf }}" required>
            @error('cpf')
                <small style="color: red; display: block;">{{ $message }}</small>
            @enderror
            <label for="unidade_id">Unidade:</label>
            <select name="unidade_id" id="unidade_id">
                @foreach ($unidades as $unidade)
                    <option value="{{ $unidade->id }}" {{ $colaborador->unidade_id == $unidade->id ? 'selected' : '' }}>{{ $unidade->nome_fantasia }}</option>
                @endforeach
            </select>
            <button type="submit">Salvar</button>
        </form>
    @endif
</x-layout>
