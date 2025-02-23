<x-layout>
    <h1>Seja bem-vindo!</h1>
    <p>Para acessar o sistema, faça login ou registre-se.</p>
    <p>Se você já possui uma conta, faça o "Login".</p>
    <p>Se você ainda não possui uma conta, clique em "Registrar".</p>
    <form method="POST" action="/login">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" class="form-control" id="email" name="email">
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Senha</label>
            <input type="password" class="form-control" id="password" name="password">
            @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Entrar</button>
        <button type="button" class="btn btn-secondary" onclick="window.location.href='/registrar'">Registrar</button>
    </form>
</x-layout>
