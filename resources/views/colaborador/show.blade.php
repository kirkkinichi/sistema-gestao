<x-layout>
    <h1>{{ $colaborador->nome }}</h1>
    <p>Email: {{ $colaborador->email }}</p>
    <p>cpf: {{ $colaborador->cpf }}</p>
    <p>Unidade: {{ $unidade->nome_fantasia }}</p>
    <button onclick="window.location.href='/colaboradores/{{ $colaborador->id }}/edit';">Editar</button>
    <form action="/colaboradores/{{ $colaborador->id }}" method="post">
        @csrf
        @method('delete')
        <button type="submit">Excluir</button>
    </form>
</x-layout>
