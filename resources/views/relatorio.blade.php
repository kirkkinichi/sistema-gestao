<x-layout>
    <h1 class="mb-4">Relatório</h1>

    <form action="{{ route('relatorio') }}" method="GET" class="mb-4">
        <input type="text" name="search" value="{{ $search ?? '' }}" placeholder="Pesquisar colaborador">

        <div>
            <label><input type="checkbox" name="tags[]" value="grupo_economico" {{ in_array('grupo_economico', $tags ?? []) ? 'checked' : '' }}> Grupo Econômico</label>
            <label><input type="checkbox" name="tags[]" value="bandeira" {{ in_array('bandeira', $tags ?? []) ? 'checked' : '' }}> Bandeira</label>
            <label><input type="checkbox" name="tags[]" value="unidade" {{ in_array('unidade', $tags ?? []) ? 'checked' : '' }}> Unidade</label>
            <label><input type="checkbox" name="tags[]" value="razao_social" {{ in_array('razao_social', $tags ?? []) ? 'checked' : '' }}> Razão Social</label>
            <label><input type="checkbox" name="tags[]" value="cnpj" {{ in_array('cnpj', $tags ?? []) ? 'checked' : '' }}> CNPJ</label>
            <label><input type="checkbox" name="tags[]" value="email" {{ in_array('email', $tags ?? []) ? 'checked' : '' }}> Email</label>
            <label><input type="checkbox" name="tags[]" value="cpf" {{ in_array('cpf', $tags ?? []) ? 'checked' : '' }}> CPF</label>
        </div>

        <button type="submit">Pesquisar</button>
    </form>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Colaborador</th>
                @if(in_array('grupo_economico', $tags ?? []))<th>Grupo Econômico</th>@endif
                @if(in_array('bandeira', $tags ?? []))<th>Bandeira</th>@endif
                @if(in_array('unidade', $tags ?? []))<th>Unidade</th>@endif
                @if(in_array('razao_social', $tags ?? []))<th>Razão Social</th>@endif
                @if(in_array('cnpj', $tags ?? []))<th>CNPJ</th>@endif
                @if(in_array('email', $tags ?? []))<th>Email</th>@endif
                @if(in_array('cpf', $tags ?? []))<th>CPF</th>@endif
            </tr>
        </thead>
        <tbody>
            @foreach($data as $grupoEconomico)
                @foreach($grupoEconomico['bandeiras'] as $bandeira)
                    @foreach($bandeira['unidades'] as $unidade)
                        @foreach($unidade['colaboradores'] as $colaborador)
                            <tr>
                                <td>{{ $colaborador['nome'] }}</td>
                                @if(in_array('grupo_economico', $tags ?? []))<td>{{ $grupoEconomico['grupo_economico'] }}</td>@endif
                                @if(in_array('bandeira', $tags ?? []))<td>{{ $bandeira['nome'] }}</td>@endif
                                @if(in_array('unidade', $tags ?? []))<td>{{ $unidade['nome_fantasia'] }}</td>@endif
                                @if(in_array('razao_social', $tags ?? []))<td>{{ $unidade['razao_social'] }}</td>@endif
                                @if(in_array('cnpj', $tags ?? []))<td>{{ $unidade['cnpj'] }}</td>@endif
                                @if(in_array('email', $tags ?? []))<td>{{ $colaborador['email'] }}</td>@endif
                                @if(in_array('cpf', $tags ?? []))<td>{{ $colaborador['cpf'] }}</td>@endif
                            </tr>
                        @endforeach
                    @endforeach
                @endforeach
            @endforeach
        </tbody>
    </table>
</x-layout>
