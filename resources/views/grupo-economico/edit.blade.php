<x-layout>
    <div class="flex justify-center items-center min-h-screen bg-gray-100">
        <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
            <h1 class="text-3xl font-semibold text-center text-gray-800 mb-6">Editar Grupo Econômico</h1>
            <form method="POST" action="/grupo-economico/{{ $grupoEconomico->id }}">
                @csrf
                @method('PATCH')
                <div class="mb-4">
                    <label for="nome" class="block text-sm font-medium text-gray-700">Nome do Grupo Econômico:</label>
                    <input type="text" id="nome" name="nome" value="{{ $grupoEconomico->nome }}" required class="mt-1 block w-full p-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-custom-yellow focus:border-custom-yellow">
                </div>
                <div class="flex justify-between items-center">
                    <button type="submit" class="w-full py-3 bg-[#ffb800] text-white rounded-lg font-semibold hover:bg-[#ea9c47] focus:outline-none focus:ring-2 focus:ring-[#ffb800]">Editar</button>
                </div>
            </form>

            <div class="mt-6 text-center">
                <button onclick="window.history.back()" class="w-full py-3 bg-gray-200 text-gray-700 rounded-lg font-semibold hover:bg-gray-300 focus:outline-none">Voltar</button>
            </div>
        </div>
    </div>
</x-layout>
