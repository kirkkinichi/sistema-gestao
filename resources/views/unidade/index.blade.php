<x-layout>
    <h1>Unidades</h1>
    <button onclick="window.location.href='/unidades/create';">Adicionar</button>
    <table>
        <tr>
            <th>Nome</th>
            <th>Razão Social</th>
            <th>CNPJ</th>
            <th>Bandeira</th>
            <th></th>
            <th></th>
        </tr>
        @if (count($unidades) == 0)
            <tr>
                <td colspan="5">Nenhuma unidade cadastrada</td>
            </tr>
        @else
            @foreach ($unidades as $unidade)
                <tr>
                    <td>{{ $unidade->nome_fantasia }}</td>
                    <td>{{ $unidade->razao_social }}</td>
                    <td>{{ $unidade->cnpj }}</td>
                    <td>{{ $unidade->bandeira_id }}</td>
                    <td><a href="/unidades/{{ $unidade->id }}/edit">Editar</a></td>
                    <td>
                        <form action="/unidades/{{ $unidade->id }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        @endif
    </table>
</x-layout>
