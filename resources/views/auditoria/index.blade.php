<x-layout>
    @auth
    <div class="flex justify-center items-center min-h-screen bg-gray-100">
        <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-6xl overflow-x-auto">
            <h1 class="text-3xl font-semibold text-center text-gray-800 mb-6">Logs de Auditoria</h1>
            <div class="mt-6 mb-6 text-center">
                <button onclick="window.location.href='/'" class="w-full py-3 bg-gray-200 text-gray-700 rounded-lg font-semibold hover:bg-gray-300 focus:outline-none">Voltar</button>
            </div>

            @if($auditorias->isEmpty())
                <p class="text-center text-gray-600">Não há registros de auditoria.</p>
            @else
                <table class="min-w-full table-auto border-collapse bg-white border border-gray-300">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Ação</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Valores</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Data</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Usuário</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">IP</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($auditorias as $auditoria)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="px-4 py-2 text-sm text-gray-800">{{ $auditoria->acao }}</td>
                                <td class="px-4 py-2 text-sm text-gray-800">
                                    @php
                                        $valores = json_decode($auditoria->valores, true);
                                    @endphp

                                    @if($valores)
                                        @foreach ($valores as $campo => $valor)
                                            <div class="mb-2">
                                                <strong class="text-gray-800">{{ ucfirst($campo) }}:</strong>
                                                @if(is_array($valor))
                                                    <ul class="ml-4 list-disc text-gray-600">
                                                        @foreach($valor as $subCampo => $subValor)
                                                            <li><strong class="text-gray-700">{{ ucfirst($subCampo) }}:</strong> {{ $subValor }}</li>
                                                        @endforeach
                                                    </ul>
                                                @else
                                                    <span class="text-gray-600">{{ $valor }}</span>
                                                @endif
                                            </div>
                                        @endforeach
                                    @else
                                        <span class="text-gray-500">Nenhum valor registrado.</span>
                                    @endif
                                </td>
                                <td class="px-4 py-2 text-sm text-gray-800">
                                    {{ \Carbon\Carbon::parse($auditoria->created_at)->format('d/m/Y H:i') }}
                                </td>

                                <td class="px-4 py-2 text-sm text-gray-800">{{ $auditoria->usuario->email }}</td>
                                <td class="px-4 py-2 text-sm text-gray-800">{{ $auditoria->ip }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
    @endauth
</x-layout>
