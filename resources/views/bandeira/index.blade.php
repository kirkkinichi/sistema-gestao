<x-layout>
    <div class="flex justify-center items-center min-h-screen bg-gray-100">
        <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-4xl">
            <h1 class="text-3xl font-semibold text-center text-gray-800 mb-6">CRUD - Bandeira</h1>

            @if (session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <strong class="font-bold">Erro!</strong>
                    <span class="block sm:inline">{{ session('error') }}</span>
                </div>
            @endif

            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <strong class="font-bold">Sucesso!</strong>
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            <div class="text-center mb-6">
                <button onclick="window.location.href='/bandeira/create';" class="py-2 px-4 bg-[#ffb800] text-white rounded-lg font-semibold hover:bg-[#ea9c47] focus:outline-none focus:ring-2 focus:ring-[#ffb800]">Cadastrar</button>
            </div>

            <table class="min-w-full table-auto">
                <thead>
                    <tr>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Nome</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Grupo Econômico</th>
                        <th class="px-4 py-2 text-sm font-medium text-gray-700 text-right">Opções</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bandeiras as $bandeira)
                        <tr class="border-b">
                            <td class="px-4 py-3 text-sm text-gray-800">{{ $bandeira->nome }}</td>
                            <td class="px-4 py-3 text-sm text-gray-800">{{ $bandeira->grupoEconomico->nome }}</td>
                            <td class="px-4 py-3 text-sm text-gray-800 text-right">
                                <button onclick="window.location.href='/bandeira/{{ $bandeira->id }}/edit';" class="px-4 py-2 bg-blue-600 text-white rounded-lg font-semibold hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">Editar</button>
                                <form action="/bandeira/{{ $bandeira->id }}" method="post" class="inline-block">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-lg font-semibold hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mt-6 text-center">
                <button onclick="window.location.href='/'" class="w-full py-3 bg-gray-200 text-gray-700 rounded-lg font-semibold hover:bg-gray-300 focus:outline-none">Voltar para a Página Inicial</button>
            </div>
        </div>
    </div>
</x-layout>
