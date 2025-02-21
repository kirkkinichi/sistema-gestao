<x-layout>
    <form method="POST" action="/grupo-economico">
        @csrf
        <label for="nome">Nome do Grupo Econômico:</label>
        <input type="text" id="nome" name="nome" required>
        <button type="submit">Criar</button>
    </form>
</x-layout>


