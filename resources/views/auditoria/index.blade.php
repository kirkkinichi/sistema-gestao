<x-layout>
    @auth
    <h1>Logs de Auditoria</h1>

    @if($auditorias->isEmpty())
        <p>Não há registros de auditoria.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>Ação</th>
                    <th>Valores</th>
                    <th>Data</th>
                    <th>Usuário</th>
                    <th>IP</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($auditorias as $auditoria)
                    <tr>
                        <td>{{ $auditoria->acao }}</td>
                        <td>
                            @php
                                $valores = json_decode($auditoria->valores, true);
                            @endphp

                            @if($valores)
                                @foreach ($valores as $campo => $valor)
                                    <strong>{{ ucfirst($campo) }}:</strong>
                                    @if(is_array($valor))
                                        <ul>
                                            @foreach($valor as $subCampo => $subValor)
                                                <li><strong>{{ ucfirst($subCampo) }}:</strong> {{ $subValor }}</li>
                                            @endforeach
                                        </ul>
                                    @else
                                        {{ $valor }}<br>
                                    @endif
                                @endforeach
                            @else
                                <span>Nenhum valor registrado.</span>
                            @endif
                        </td>
                        <td>{{ $auditoria->created_at }}</td>
                        <td>{{ $auditoria->usuario->email }}</td>
                        <td>{{ $auditoria->ip }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    @endauth
</x-layout>
