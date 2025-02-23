<x-layout>
    <div class="flex justify-center items-center min-h-screen bg-gray-100">
        <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-4xl">
            <h1 class="text-3xl font-semibold text-center text-gray-800 mb-6">Unidades</h1>

            <div class="text-center mb-6">
                <button onclick="window.location.href='/unidades/create';" class="py-2 px-4 bg-[#ffb800] text-white rounded-lg font-semibold hover:bg-[#ea9c47] focus:outline-none focus:ring-2 focus:ring-[#ffb800]">Adicionar</button>
            </div>

            <table class="min-w-full table-auto border-collapse">
                <thead>
                    <tr>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Nome</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Razão Social</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">CNPJ</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Bandeira</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Opções</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-700"></th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($unidades) == 0)
                        <tr>
                            <td colspan="6" class="text-center py-4 text-gray-600">Nenhuma unidade cadastrada</td>
                        </tr>
                    @else
                        @foreach ($unidades as $unidade)
                            <tr class="border-b">
                                <td class="px-4 py-3 text-sm text-gray-800">{{ $unidade->nome_fantasia }}</td>
                                <td class="px-4 py-3 text-sm text-gray-800">{{ $unidade->razao_social }}</td>
                                <td class="px-4 py-3 text-sm text-gray-800">{{ $unidade->cnpj }}</td>
                                <td class="px-4 py-3 text-sm text-gray-800">{{ $unidade->bandeira_id }}</td>
                                <td class="px-4 py-3 text-sm text-gray-800">
                                    <a href="/unidades/{{ $unidade->id }}/edit" class="px-4 py-2 bg-blue-600 text-white rounded-lg font-semibold hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">Editar</a>
                                </td>
                                <td class="px-4 py-3 text-sm text-gray-800">
                                    <form action="/unidades/{{ $unidade->id }}" method="post" class="inline-block">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-lg font-semibold hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500">Excluir</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>

            <div class="mt-6 text-center">
                <button onclick="window.location.href='/'" class="w-full py-3 bg-gray-200 text-gray-700 rounded-lg font-semibold hover:bg-gray-300 focus:outline-none">Voltar para a Página Inicial</button>
            </div>
        </div>
    </div>
</x-layout>
