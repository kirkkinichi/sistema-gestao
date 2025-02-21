<x-layout>
    <h1>Grupo Econômico - CRUD</h1>

    <a href="grupo-economico/create">Criar Novo Grupo Econômico</a>
    <hr>

    <h2>Lista de Grupos Econômicos</h2>
    @foreach ($grupoEconomico as $grupo)
        <a href="grupo-economico/{{ $grupo['id'] }}">{{ $grupo['nome'] }}</a>

    @endforeach

</x-layout>


