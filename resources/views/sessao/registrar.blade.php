<x-layout>
    <div class="flex justify-center items-center min-h-screen bg-gray-100">
        <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
            <h1 class="text-3xl font-semibold text-center text-gray-800 mb-6">Registrar</h1>

            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <strong class="font-bold">Erro!</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="/registrar">
                @csrf
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">E-mail</label>
                    <input type="email" class="mt-1 block w-full p-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-custom-yellow focus:border-custom-yellow" id="email" name="email" value="{{ old('email') }}">
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Senha (mínimo de 6 caracteres)</label>
                    <input type="password" class="mt-1 block w-full p-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-custom-yellow focus:border-custom-yellow" id="password" name="password">
                </div>
                <div class="mb-4">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirme a senha</label>
                    <input type="password" class="mt-1 block w-full p-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-custom-yellow focus:border-custom-yellow" id="password_confirmation" name="password_confirmation">
                </div>
                <div class="flex justify-between items-center">
                    <button type="submit" class="w-full py-3 bg-[#ffb800] text-white rounded-lg font-semibold hover:bg-[#ea9c47] focus:outline-none focus:ring-2 focus:ring-[#ffb800]">Registrar</button>
                </div>
                <div class="mt-4 text-center">
                    <button type="button" class="w-full py-3 bg-gray-200 text-gray-700 rounded-lg font-semibold hover:bg-gray-300 focus:outline-none" onclick="window.location.href='/login'">Voltar</button>
                </div>
            </form>
        </div>
    </div>
</x-layout>

