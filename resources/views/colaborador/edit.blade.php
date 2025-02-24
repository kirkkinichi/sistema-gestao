<x-layout>
    <div class="flex justify-center items-center min-h-screen bg-gray-100">
        <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-4xl">
            <h1 class="text-3xl font-semibold text-center text-gray-800 mb-6">Editar Colaborador</h1>

            @if ($unidades->count() == 0)
                <p class="text-red-600 text-center mb-6">Não é possível editar um colaborador sem uma unidade cadastrada.</p>
            @else
                <form action="/colaboradores/{{ $colaborador->id }}" method="post" class="space-y-4">
                    @csrf
                    @method('PATCH')

                    <div>
                        <label for="nome" class="block text-sm font-medium text-gray-700">Nome:</label>
                        <input type="text" name="nome" id="nome" value="{{ $colaborador->nome }}" required class="mt-1 block w-full p-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-[#ffb800] focus:border-[#ffb800]" />
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">E-mail:</label>
                        <input type="email" name="email" id="email" value="{{ $colaborador->email }}" required class="mt-1 block w-full p-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-[#ffb800] focus:border-[#ffb800]" />
                    </div>

                    <div>
                        <label for="cpf" class="block text-sm font-medium text-gray-700">CPF:</label>
                        <input type="text" name="cpf" id="cpf" value="{{ $colaborador->cpf }}" required class="mt-1 block w-full p-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-[#ffb800] focus:border-[#ffb800]" />
                        @error('cpf')
                            <small style="color: red; display: block;" class="mt-1">{{ $message }}</small>
                        @enderror
                    </div>

                    <div>
                        <label for="unidade_id" class="block text-sm font-medium text-gray-700">Unidade:</label>
                        <select name="unidade_id" id="unidade_id" class="mt-1 block w-full p-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-[#ffb800] focus:border-[#ffb800]">
                            @foreach ($unidades as $unidade)
                                <option value="{{ $unidade->id }}" {{ $colaborador->unidade_id == $unidade->id ? 'selected' : '' }}>{{ $unidade->nome_fantasia }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="w-full py-3 bg-[#ffb800] text-white rounded-lg font-semibold hover:bg-[#ea9c47] focus:outline-none focus:ring-2 focus:ring-[#ffb800]">Salvar</button>
                    </div>
                </form>
            @endif

            <div class="mt-6 text-center">
                <button onclick="window.location.href='/colaboradores'" class="w-full py-3 bg-gray-200 text-gray-700 rounded-lg font-semibold hover:bg-gray-300 focus:outline-none">Voltar</button>
            </div>
        </div>
    </div>
</x-layout>
