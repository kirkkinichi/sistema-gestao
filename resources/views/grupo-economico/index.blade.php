<x-layout>
    <h1>CRUD - Grupo Econômico</h1>
    <button onclick="window.location.href='/grupo-economico/create';">Cadastrar</button>
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Opções</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($gruposEconomicos as $grupoEconomico)
                <tr>
                    <td>{{ $grupoEconomico->nome }}</td>
                    <td>
                        <button onclick="window.location.href='/grupo-economico/{{ $grupoEconomico->id }}/edit';">Editar</button>
                        <form action="/grupo-economico/{{ $grupoEconomico->id }}" method="post">
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


