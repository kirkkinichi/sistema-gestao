<x-layout>
    <div class="flex justify-center items-center min-h-screen bg-gray-100">
        <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
            <h1 class="text-3xl font-semibold text-center text-gray-800 mb-6">Editar Bandeira</h1>

            <form method="POST" action="/bandeira/{{ $bandeira->id }}">
                @csrf
                @method('PATCH')

                @if ($grupoEconomicos->isEmpty())
                    <p class="text-center text-red-500 mb-4">Não há grupo econômico cadastrado, por favor cadastre pelo menos um grupo econômico.</p>
                @else

                    <div class="mb-4">
                        <label for="grupo_economico_id" class="block text-sm font-medium text-gray-700">Selecione o grupo econômico:</label>
                        <select name="grupo_economico_id" id="grupo_economico_id" class="mt-1 block w-full p-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-[#ffb800]" required>
                            @foreach ($grupoEconomicos as $grupoEconomico)
                                <option value="{{ $grupoEconomico->id }}" {{ $bandeira->grupo_economico_id == $grupoEconomico->id ? 'selected' : '' }}>{{ $grupoEconomico->nome }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="nome" class="block text-sm font-medium text-gray-700">Nome da Bandeira:</label>
                        <input type="text" id="nome" name="nome" value="{{ $bandeira->nome }}" class="mt-1 block w-full p-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-[#ffb800]" required>
                    </div>

                    <div class="mb-6">
                        <button type="submit" class="w-full py-3 bg-[#ffb800] text-white rounded-lg font-semibold hover:bg-[#ea9c47] focus:outline-none focus:ring-2 focus:ring-[#ffb800]">Editar</button>
                    </div>
                @endif
            </form>

            <div class="mt-4 text-center">
                <button onclick="window.location.href='/bandeira'" class="w-full py-3 bg-gray-200 text-gray-700 rounded-lg font-semibold hover:bg-gray-300 focus:outline-none">Voltar</button>
            </div>
        </div>
    </div>
</x-layout>
