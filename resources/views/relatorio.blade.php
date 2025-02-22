<x-layout>
    <h1 class="mb-4">Relatório</h1>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Grupo Econômico</th>
                <th>Bandeira</th>
                <th>Unidade</th>
                <th>CNPJ</th>
                <th>Colaborador</th>
                <th>Email</th>
                <th>CPF</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $grupoEconomico)
                @foreach($grupoEconomico['bandeiras'] as $bandeira)
                    @foreach($bandeira['unidades'] as $unidade)
                        @foreach($unidade['colaboradores'] as $colaborador)
                            <tr>
                                <td>{{ $grupoEconomico['grupo_economico'] }}</td>
                                <td>{{ $bandeira['nome'] }}</td>
                                <td>{{ $unidade['nome_fantasia'] }} ({{ $unidade['razao_social'] }})</td>
                                <td>{{ $unidade['cnpj'] }}</td>
                                <td>{{ $colaborador['nome'] }}</td>
                                <td>{{ $colaborador['email'] }}</td>
                                <td>{{ $colaborador['cpf'] }}</td>
                            </tr>
                        @endforeach
                    @endforeach
                @endforeach
            @endforeach
        </tbody>
    </table>
</x-layout>
