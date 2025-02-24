# Sistema de Gestão

O sistema-gestao é um sistema de gestão para um grupo econômico que possui várias bandeiras, unidades e colaboradores. O sistema permite a administração de grupos econômicos, bandeiras, unidades e colaboradores, além de permitir a consulta de relatórios e exibir um sistema de auditoria.

### Tela de Login:
![Tela de Login](/resources/images/login.png)

### Tela de Registro de Usuário:
![Tela de Registro de Usuário](/resources/images/registro.png)

### Menu Principal:
![Menu Principal](/resources/images/menu-principal.png)

## Tecnologias e Ferramentas

- [PHP 8.4.4](https://www.php.net/)
- [Laravel 11.43.1](https://laravel.com/docs/11.x/installation)
- [Laravel Sail](https://laravel.com/docs/11.x/sail)
- [Docker Desktop](https://www.docker.com/products/docker-desktop/)
- [MySQL](https://www.mysql.com/)
- [Tailwind CSS](https://tailwindcss.com/)
- [Ubuntu WSL](https://ubuntu.com/desktop/wsl)

## Requisitos

- Instalar [Ubuntu WSL - 24.04](https://ubuntu.com/desktop/wsl)
- Instalar [Docker Desktop](https://www.docker.com/products/docker-desktop/)

## Como executar o Projeto (Windows)

- Instale o Ubuntu WSL na versão 24.04
- Instale o Docker Desktop
- Execute o Ubuntu WSL e o Docker Desktop
- Clone o repositório no ambiente Ubuntu:

```bash
git clone https://github.com/kirkkinichi/sistema-gestao.git
```

- Acesse o projeto pelo ambiente Ubuntu e execute:
```bash
cd sistema-gestao
./vendor/bin/sail up -d
```

- Realize as migrações do banco de dados
```bash
./vendor/bin/sail artisan migrate
```

- Instale as dependências do frontend
```bash
./vendor/bin/sail npm install
```

- Em seguida, execute:
```bash
./vendor/bin/sail npm run dev
```
- Acesse o projeto: http://localhost

## Autor

Kirk Kinichi Tomisaki Rodrigues da Silva
