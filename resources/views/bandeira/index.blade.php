<x-layout>
    <h1>CRUD - Bandeira</h1>
    <button onclick="window.location.href='/bandeira/create';">Cadastrar</button>
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Grupo Econômico</th>
                <th>Opções</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bandeiras as $bandeira)
                <tr>
                    <td>{{ $bandeira->nome }}</td>
                    <td>{{ $bandeira->grupoEconomico->nome }}</td>
                    <td>
                        <button onclick="window.location.href='/bandeira/{{ $bandeira->id }}/edit';">Editar</button>
                        <form action="/bandeira/{{ $bandeira->id }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-layout>
