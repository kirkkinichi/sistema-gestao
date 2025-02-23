<x-layout>
    <div class="flex justify-center items-center min-h-screen bg-gray-100">
        <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-4xl">
            <h1 class="text-3xl font-semibold text-center text-gray-800 mb-6">Editar Unidade</h1>

            @if ($bandeiras->count() == 0)
                <p class="text-red-600 text-center mb-6">Não é possível adicionar uma unidade sem uma bandeira cadastrada.</p>
            @else
                <form action="/unidades/{{ $unidade->id }}" method="post" class="space-y-4">
                    @csrf
                    @method('PATCH')

                    <div>
                        <label for="nome_fantasia" class="block text-sm font-medium text-gray-700">Nome:</label>
                        <input type="text" name="nome_fantasia" id="nome_fantasia" value="{{ $unidade->nome_fantasia }}" required class="mt-1 block w-full p-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-[#ffb800] focus:border-[#ffb800]" />
                        @error('nome_fantasia')
                            <small style="color: red; display: block;" class="mt-1">{{ $message }}</small>
                        @enderror
                    </div>

                    <div>
                        <label for="razao_social" class="block text-sm font-medium text-gray-700">Razão Social:</label>
                        <input type="text" name="razao_social" id="razao_social" value="{{ $unidade->razao_social }}" required class="mt-1 block w-full p-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-[#ffb800] focus:border-[#ffb800]" />
                        @error('razao_social')
                            <small style="color: red; display: block;" class="mt-1">{{ $message }}</small>
                        @enderror
                    </div>

                    <div>
                        <label for="cnpj" class="block text-sm font-medium text-gray-700">CNPJ:</label>
                        <input type="text" name="cnpj" id="cnpj" value="{{ $unidade->cnpj }}" required class="mt-1 block w-full p-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-[#ffb800] focus:border-[#ffb800]" />
                        @error('cnpj')
                            <small style="color: red; display: block;" class="mt-1">{{ $message }}</small>
                        @enderror
                    </div>

                    <div>
                        <label for="bandeira_id" class="block text-sm font-medium text-gray-700">Bandeira:</label>
                        <select name="bandeira_id" id="bandeira_id" class="mt-1 block w-full p-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-[#ffb800] focus:border-[#ffb800]">
                            @foreach ($bandeiras as $bandeira)
                                <option value="{{ $bandeira->id }}" {{ $unidade->bandeira_id == $bandeira->id ? 'selected' : '' }}>
                                    {{ $bandeira->nome }}
                                </option>
                            @endforeach
                        </select>
                        @error('bandeira_id')
                            <small style="color: red; display: block;" class="mt-1">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="text-center">
                        <button type="submit" class="w-full py-3 bg-[#ffb800] text-white rounded-lg font-semibold hover:bg-[#ea9c47] focus:outline-none focus:ring-2 focus:ring-[#ffb800]">Salvar</button>
                    </div>
                </form>
            @endif

            <div class="mt-6 text-center">
                <button onclick="window.location.href='/unidades'" class="w-full py-3 bg-gray-200 text-gray-700 rounded-lg font-semibold hover:bg-gray-300 focus:outline-none">Voltar</button>
            </div>
        </div>
    </div>
</x-layout>
