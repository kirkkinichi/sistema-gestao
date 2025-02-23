<x-layout>
    <div class="flex justify-center items-center min-h-screen bg-gray-100">
        <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
            <h1 class="text-3xl font-semibold text-center text-gray-800 mb-6">Seja bem-vindo!</h1>
            <p class="text-center text-gray-600 mb-4">Para acessar o sistema, faça Login ou Registre-se.</p>
            <p class="text-center text-gray-600 mb-2">Se você já possui uma conta, faça o "Login".</p>
            <p class="text-center text-gray-600 mb-6">Se você ainda não possui uma conta, clique em "Registrar".</p>

            <form method="POST" action="/login">
                @csrf
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">E-mail</label>
                    <input type="email" id="email" name="email" class="mt-1 block w-full p-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-custom-yellow focus:border-custom-yellow" />
                    @error('email')
                        <div class="mt-2 text-sm text-red-500">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="password" class="block text-sm font-medium text-gray-700">Senha</label>
                    <input type="password" id="password" name="password" class="mt-1 block w-full p-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-custom-yellow focus:border-custom-yellow" />
                    @error('password')
                        <div class="mt-2 text-sm text-red-500">{{ $message }}</div>
                    @enderror
                </div>

                <div class="flex justify-between items-center">
                    <button type="submit" class="w-full py-3 bg-[#ffb800] text-white rounded-lg font-semibold hover:bg-[#ea9c47] focus:outline-none focus:ring-2 focus:ring-[#ffb800]">Entrar</button>
                </div>

                <div class="mt-4 text-center">
                    <button type="button" class="w-full py-3 bg-gray-200 text-gray-700 rounded-lg font-semibold hover:bg-gray-300 focus:outline-none" onclick="window.location.href='/registrar'">Registrar</button>
                </div>
            </form>
        </div>
    </div>
</x-layout>
