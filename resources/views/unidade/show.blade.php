<x-layout>
    <h1>Detalhes da Unidade</h1>
    <p><strong>Nome:</strong> {{ $unidade->nome_fantasia }}</p>
    <p><strong>Razão Social:</strong> {{ $unidade->razao_social }}</p>
    <p><strong>cnpj:</strong> {{ $unidade->cnpj }}</p>
    <p><strong>Bandeira:</strong> {{ $unidade->bandeira->nome }}</p>
    <button onclick="window.location.href='/unidades/{{ $unidade->id }}/edit';">Editar</button>
    <form action="/unidades/{{ $unidade->id }}" method="post">
        @csrf
        @method('delete')
        <button type="submit">Excluir</button>
    </form>
    <button onclick="window.location.href='/unidades';">Voltar</button>
</x-layout>
