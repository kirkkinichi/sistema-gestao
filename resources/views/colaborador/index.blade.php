<x-layout>
    <h1>Colaboradores</h1>
    <button onclick="window.location.href='/colaboradores/create';">Adicionar</button>
    @if (count($colaboradores) == 0)
        <tr>
            <td colspan="5">Nenhum colaborador cadastrado</td>
        </tr>
    @else
        <table>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>cpf</th>
                <th>Unidade</th>
                <th></th>
                <th></th>
            </tr>

            @foreach ($colaboradores as $colaborador)
                <tr>
                    <td>{{ $colaborador->nome }}</td>
                    <td>{{ $colaborador->email }}</td>
                    <td>{{ $colaborador->cpf }}</td>
                    <td>{{ $colaborador->unidade_id }}</td>
                    <td><a href="/colaboradores/{{ $colaborador->id }}/edit">Editar</a></td>
                    <td>
                        <form action="/colaboradores/{{ $colaborador->id }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    @endif
</x-layout>
