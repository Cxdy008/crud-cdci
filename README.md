<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Sobre o Projecto

O **CRUD CDCI** é uma aplicação web desenvolvida com o framework [Laravel 12](https://laravel.com) (PHP 8.2+), cujo objetivo é servir como um sistema de gestão simples e funcional de tarefas e utilizadores. O projecto demonstra a aplicação prática de conceitos de desenvolvimento web moderno, tais como roteamento RESTful, camada MVC, manipulação de erros de validação, *soft deletes*, geração de relatórios em PDF e utilização de *frontend* assíncrona com AJAX.

A aplicação permite registar utilizadores e associar-lhes tarefas, visualizando, editando e apagando (com *soft delete* e *purge*) tanto os utilizadores como as tarefas, além de gerar relatórios em PDF estatísticos/agrupados por utilizador.

## Funcionalidades

### Utilizadores
- Listar todos os utilizadores existentes na base de dados.
- Criar novos utilizadores (nome, email e password).
- Visualizar os detalhes de um utilizador.
- Editar os dados de um utilizador.
- Eliminar um utilizador (soft delete, preservando registos na base de dados).
- **Purgar** (force delete) utilizadores eliminados, removendo definitivamente os registos.

### Tarefas
- Listar todas as tarefas, com o respetivo utilizador associado (via relação `belongsTo`).
- Criar tarefas (type e description) e associá-las a um utilizador existente.
- Visualizar os detalhes de uma tarefa.
- Editar o type, description e utilizador associado de uma tarefa.
- Eliminar uma tarefa (soft delete).
- **Purgar** (force delete) tarefas eliminadas.
- Gerar um relatório em PDF com as tarefas agrupadas por utilizador.

### Relatórios
- Geração automática de um documento PDF (`tasks.report`) que mostra, para cada utilizador, o type e a description das suas tarefas.

## Tecnologias Utilizadas

| Categoria | Tecnologia |
|---|---|
| Backend | Laravel 12, PHP 8.2+ |
| Frontend | Tailwind CSS 4, Vite, Axios, jQuery |
| Banco de Dados | MySQL / MariaDB (com suporte a SQLite para desenvolvimento) |
| Geração de PDF | mPDF (`mpdf/mpdf`, `carlos-meneses/laravel-mpdf`, `barryvdh/laravel-dompdf`) |
| Sessões | Database session driver |
| Filas | Database queue driver |
| Cache | Database cache driver |
| Testes | PHPUnit, Laravel test helpers |

## Instalação e Configuração

1. **Clonar o repositório**
   ```bash
   git clone https://github.com/Cxdy008/crud-cdci.git
   cd crud-cdci
   ```

2. **Instalar as dependências do PHP**
   ```bash
   composer install
   ```

3. **Copiar o ficheiro de ambiente**
   ```bash
   cp .env.example .env
   ```

4. **Gerar a chave da aplicação**
   ```bash
   php artisan key:generate
   ```

5. **Configurar o ficheiro `.env`**
   - Definir `DB_CONNECTION`, `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME` e `DB_PASSWORD` segundo o seu ambiente de base de dados.
   - O projecto está configurado para usar a base de dados `crud_cdci` (MySQL) por defeito.

6. **Executar as migrações e popular a base de dados**
   ```bash
   php artisan migrate
   ```
   Se dispõe de um ambiente Sail:
   ```bash
   php artisan sail:install
   ./vendor/bin/sail up -d
   ```

7. **Instalar as dependências do frontend**
   ```bash
   npm install
   npm run dev
   ```

## Execução

Para iniciar o servidor web embutido:

```bash
php artisan serve
```

A aplicação fica disponível em `http://localhost:8000`.

## Estrutura do Projecto
```
crud-cdci/
├── app/
│   ├── Http/Controllers/   # Controladores: UserController, TaskController
│   ├── Models/             # Models: User, Tasks
│   └── Providers/          # Provedores de aplicação
├── database/
│   ├── migrations/         # Migrações: utilizadores, tarefas, cache, jobs
│   └── seeders/            # Seeders de demonstração
├── public/                 # Document root
├── resources/views/        # Views Blade: tarefas, utilizadores, layout
├── routes/
│   └── web.php             # Definição das rotas RESTful
├── storage/                # Arquivos temporários e logs
├── tests/                  # Testes PHPUnit
├── composer.json           # Dependências e scripts do PHP
├── package.json            # Dependências e scripts do frontend
├── vite.config.js          # Configuração do Vite
└── README.md               # Este ficheiro
```

## Rotas Principais

| Método | Rota | Controlador | Ação |
|---|---|---|---|
| GET | `/users` | `UserController@index` | Listar utilizadores |
| GET | `/users/create` | `UserController@create` | Formulário de criação |
| POST | `/users` | `UserController@store` | Guardar utilizador |
| GET | `/users/{user}` | `UserController@show` | Ver utilizador |
| GET | `/users/{user}/edit` | `UserController@edit` | Formulário de edição |
| PUT/PATCH | `/users/{user}` | `UserController@update` | Actualizar utilizador |
| DELETE | `/users/{user}` | `UserController@destroy` | Soft delete |
| DELETE | `/users/{user}/purge` | `UserController@purge` | Force delete |
| GET | `/tasks` | `TaskController@index` | Listar tarefas |
| GET | `/tasks/create` | `TaskController@create` | Formulário de criação |
| POST | `/users/{user}/tasks` | `TaskController@store` | Guardar tarefa |
| GET | `/tasks/{task}` | `TaskController@show` | Ver tarefa |
| GET | `/tasks/{task}/edit` | `TaskController@edit` | Formulário de edição |
| PUT/PATCH | `/users/{user}/tasks/{task}` | `TaskController@update` | Actualizar tarefa |
| DELETE | `/tasks/{task}` | `TaskController@destroy` | Soft delete |
| DELETE | `/tasks/{id}/purge` | `TaskController@purge` | Force delete |
| GET | `/report` | `TaskController@report` | Relatório em PDF |

## Contribuição

Obrigado pelo interesse em contribuir para o projecto! Sinta-se à vontade para:

1. **Reportar bugs** através das *issues*.
2. **Sugerir novas funcionalidades** através das *issues*.
3. **Enviar *pull requests*** com melhorias e correções.

Antes de enviar uma *pull request*, verifique se o código segue o estilo do projecto e, se possível, execute os testes unitários.

## Segurança

Se encontrar alguma *vulnerabilidade de segurança* no projecto, por favor não abra uma *issue*. Contacte diretamente o autor do projecto via e-mail ou através das suas *responsabilidades* de segurança públicas, agradecendo a compreensão.

## Licença

O projecto está licenciado sob a [MIT License](https://opensource.org/licenses/MIT).
