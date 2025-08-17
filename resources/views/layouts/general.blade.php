<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @yield('styles')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://cdn.lineicons.com/5.0/lineicons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <title>@yield('title', 'Users')</title>
</head>
<body>
    <div class="wrapper">
        <aside id="sidebar">
            <div class="d-flex">
                <button id="toggle-btn" type="button">
                    <i class="lni lni-menu-hamburger-1"></i>
                </button>
                <div class="sidebar-logo">
                    <a href="#">Painel</a>
                </div>
            </div>
            <ul class="sidebar-nav">
                <li class="sidebar-item">
                    <a href="/users" class="sidebar-link">
                        <i class="lni lni-user-4"></i>
                        <span class="sidebar-text">Usuários</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="/tasks" class="sidebar-link">
                        <i class="lni lni-agenda"></i>
                        <span class="sidebar-text">Tarefas</span>
                    </a>
                </li>
            </ul>
        </aside>
        <main class="main p3">
            @yield('content')
        </main>
    </div>

    @yield('scripts')
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>
