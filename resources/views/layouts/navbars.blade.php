<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SuaConstrucao')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .navbar-fixed-top {
            position: fixed;
            top: 0;
            left: 250px;
            width: calc(100% - 250px);
            z-index: 9999;
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            height: 100vh;
            background-color: #343a40;
            padding-top: 10px;
        }

        .navbar-brand {
            font-size: 25px;
        }
    </style>
</head>
<body>
<div class="sidebar">
        <nav class="bg-dark d-flex flex-column justify-content-between" style="width: 250px; height: 100vh;">
            <div>
                <h1 class="navbar-brand text-white pb-2 px-4" href="/dashboard">SuaConstrução</h1>
                <div class="nav flex-column">
                    <a href="/dashboard" class="nav-link text-light font-weight-bold my-2"><i class="fas fa-tachometer-alt"></i> Início</a>
                    <a href="/clients" class="nav-link text-light font-weight-bold my-2"><i class="fas fa-users"></i> Clientes</a>
                    <a href="/categories" class="nav-link text-light font-weight-bold my-2"><i class="fas fa-file-invoice"></i> Categorias</a>
                </div>
            </div>
            <footer class="text-center text-muted">
                <span>@Lucasmouradenada</span>
            </footer>
        </nav>
    </div>

    <div class="flex">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark navbar shadow-sm navbar-fixed-top">
            <div class="container-fluid">
                <h4 class="text-light mb-0">{{ $page }}</h4>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <form action="/search" method="GET" class="form-inline my-2 my-lg-0">
                                <div class="input-group">
                                    <input class="form-control border-right-0 rounded" type="search" name="search" placeholder="Pesquisar" aria-label="Pesquisar">
                                    <div class="input-group-append">
                                        <button class="btn btn-secondary" type="submit">
                                            <i class="fas fa-search text-light font-weight-bold"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </li>
                        <li class="nav-item dropdown ml-3">
                            <a class="nav-link dropdown-toggle rounded" href="#" id="dropdownMenuButton" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Perfil
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="/profile">Perfil</a>
                                <div class="dropdown-divider"></div>
                                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-light col-12">Sair</button>
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
