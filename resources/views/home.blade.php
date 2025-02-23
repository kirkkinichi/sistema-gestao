<x-layout>
    @auth
        <h1>Sistema de Gestão</h1>
        <p>Selecione uma das opções abaixo:</p>
        <button onclick="window.location.href='/grupo-economico';">CRUD - Grupo Economico</button>
        <button onclick="window.location.href='/bandeira';">CRUD - Bandeira</button>
        <button onclick="window.location.href='/unidades';">CRUD - Unidade</button>
        <button onclick="window.location.href='/colaboradores';">CRUD - Colaborador</button>
        <button onclick="window.location.href='/relatorio';">Relatório</button>
        <form method="POST" action="/logout">
            @csrf
            <button type="submit">Sair</button>
        </form>
    @endauth
</x-layout>
