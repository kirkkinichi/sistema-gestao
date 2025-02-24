<x-layout>
    <div class="flex justify-center items-center min-h-screen bg-gray-100">
        <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-6xl overflow-x-auto">
            <h1 class="text-3xl font-semibold text-center text-gray-800 mb-6">Relatório</h1>

            <form action="{{ route('relatorio') }}" method="GET" class="mb-6">
                <div class="mb-4">
                    <input type="text" name="search" value="{{ $search ?? '' }}" placeholder="Pesquisar colaborador" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                </div>

                <div class="mb-4 grid grid-cols-2 md:grid-cols-3 gap-4">
                    <label class="flex items-center">
                        <input type="checkbox" name="tags[]" value="grupo_economico" {{ in_array('grupo_economico', $tags ?? []) ? 'checked' : '' }} class="mr-2">
                        Grupo Econômico
                    </label>
                    <label class="flex items-center">
                        <input type="checkbox" name="tags[]" value="bandeira" {{ in_array('bandeira', $tags ?? []) ? 'checked' : '' }} class="mr-2">
                        Bandeira
                    </label>
                    <label class="flex items-center">
                        <input type="checkbox" name="tags[]" value="unidade" {{ in_array('unidade', $tags ?? []) ? 'checked' : '' }} class="mr-2">
                        Unidade
                    </label>
                    <label class="flex items-center">
                        <input type="checkbox" name="tags[]" value="razao_social" {{ in_array('razao_social', $tags ?? []) ? 'checked' : '' }} class="mr-2">
                        Razão Social
                    </label>
                    <label class="flex items-center">
                        <input type="checkbox" name="tags[]" value="cnpj" {{ in_array('cnpj', $tags ?? []) ? 'checked' : '' }} class="mr-2">
                        CNPJ
                    </label>
                    <label class="flex items-center">
                        <input type="checkbox" name="tags[]" value="email" {{ in_array('email', $tags ?? []) ? 'checked' : '' }} class="mr-2">
                        Email
                    </label>
                    <label class="flex items-center">
                        <input type="checkbox" name="tags[]" value="cpf" {{ in_array('cpf', $tags ?? []) ? 'checked' : '' }} class="mr-2">
                        CPF
                    </label>
                </div>

                <div class="text-center">
                    <button type="submit" class="py-2 px-4 bg-[#ffb800] text-white rounded-lg font-semibold hover:bg-[#ea9c47] focus:outline-none focus:ring-2 focus:ring-[#ffb800]">Pesquisar</button>
                </div>
            </form>

            <div class="mb-4 text-center">
                <a href="{{ route('relatorio.export', request()->query()) }}" class="px-6 py-2 bg-blue-600 text-white rounded-lg font-semibold hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">Exportar para Excel</a>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full table-auto border-collapse bg-white border border-gray-300">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Colaborador</th>
                            @if(in_array('grupo_economico', $tags ?? []))<th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Grupo Econômico</th>@endif
                            @if(in_array('bandeira', $tags ?? []))<th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Bandeira</th>@endif
                            @if(in_array('unidade', $tags ?? []))<th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Unidade</th>@endif
                            @if(in_array('razao_social', $tags ?? []))<th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Razão Social</th>@endif
                            @if(in_array('cnpj', $tags ?? []))<th class="px-4 py-2 text-left text-sm font-medium text-gray-700">CNPJ</th>@endif
                            @if(in_array('email', $tags ?? []))<th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Email</th>@endif
                            @if(in_array('cpf', $tags ?? []))<th class="px-4 py-2 text-left text-sm font-medium text-gray-700">CPF</th>@endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $grupoEconomico)
                            @foreach($grupoEconomico['bandeiras'] as $bandeira)
                                @foreach($bandeira['unidades'] as $unidade)
                                    @foreach($unidade['colaboradores'] as $colaborador)
                                        <tr>
                                            <td class="px-4 py-2 text-sm text-gray-800">{{ $colaborador['nome'] }}</td>
                                            @if(in_array('grupo_economico', $tags ?? []))<td class="px-4 py-2 text-sm text-gray-800">{{ $grupoEconomico['grupo_economico'] }}</td>@endif
                                            @if(in_array('bandeira', $tags ?? []))<td class="px-4 py-2 text-sm text-gray-800">{{ $bandeira['nome'] }}</td>@endif
                                            @if(in_array('unidade', $tags ?? []))<td class="px-4 py-2 text-sm text-gray-800">{{ $unidade['nome_fantasia'] }}</td>@endif
                                            @if(in_array('razao_social', $tags ?? []))<td class="px-4 py-2 text-sm text-gray-800">{{ $unidade['razao_social'] }}</td>@endif
                                            @if(in_array('cnpj', $tags ?? []))<td class="px-4 py-2 text-sm text-gray-800">{{ $unidade['cnpj'] }}</td>@endif
                                            @if(in_array('email', $tags ?? []))<td class="px-4 py-2 text-sm text-gray-800">{{ $colaborador['email'] }}</td>@endif
                                            @if(in_array('cpf', $tags ?? []))<td class="px-4 py-2 text-sm text-gray-800">{{ $colaborador['cpf'] }}</td>@endif
                                        </tr>
                                    @endforeach
                                @endforeach
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-6 text-center">
                <button onclick="window.location.href='/'" class="w-full py-3 bg-gray-200 text-gray-700 rounded-lg font-semibold hover:bg-gray-300 focus:outline-none">Voltar para a Página Inicial</button>
            </div>
        </div>
    </div>
</x-layout>
