<x-layout>
    @auth
        <div class="flex justify-center items-center min-h-screen bg-gray-100">
            <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
                <h1 class="text-3xl font-semibold text-center text-gray-800 mb-6">Sistema de Gestão</h1>
                <p class="text-center text-gray-600 mb-6">Selecione uma das opções abaixo:</p>

                <div class="space-y-4">
                    <button onclick="window.location.href='/grupo-economico';" class="w-full py-3 bg-[#616161] text-white rounded-lg font-semibold hover:bg-[#ea9c47] focus:outline-none focus:ring-2 focus:ring-[#616161]">CRUD - Grupo Econômico</button>
                    <button onclick="window.location.href='/bandeira';" class="w-full py-3 bg-[#616161] text-white rounded-lg font-semibold hover:bg-[#ea9c47] focus:outline-none focus:ring-2 focus:ring-[#616161]">CRUD - Bandeira</button>
                    <button onclick="window.location.href='/unidades';" class="w-full py-3 bg-[#616161] text-white rounded-lg font-semibold hover:bg-[#ea9c47] focus:outline-none focus:ring-2 focus:ring-[#616161]">CRUD - Unidade</button>
                    <button onclick="window.location.href='/colaboradores';" class="w-full py-3 bg-[#616161] text-white rounded-lg font-semibold hover:bg-[#ea9c47] focus:outline-none focus:ring-2 focus:ring-[#616161]">CRUD - Colaborador</button>
                    <button onclick="window.location.href='/relatorio';" class="w-full py-3 bg-[#616161] text-white rounded-lg font-semibold hover:bg-[#ea9c47] focus:outline-none focus:ring-2 focus:ring-[#616161]">Relatório</button>
                    <button onclick="window.location.href='/auditoria';" class="w-full py-3 bg-[#616161] text-white rounded-lg font-semibold hover:bg-[#ea9c47] focus:outline-none focus:ring-2 focus:ring-[#616161]">Auditoria</button>

                    <form method="POST" action="/logout" class="mt-6">
                        @csrf
                        <button type="submit" class="w-full py-3 bg-red-600 text-white rounded-lg font-semibold hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500">Sair</button>
                    </form>
                </div>
            </div>
        </div>
    @endauth
</x-layout>
