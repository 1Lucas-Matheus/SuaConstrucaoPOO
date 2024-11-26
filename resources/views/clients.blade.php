<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sua Construção</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

@extends('layouts.navbars')

    <div id="conteudo" style="margin-left: 220px; margin-top: 70px;">
        <div class="content-area m-5">
            <div>
                <h4>Clientes cadastrados:</h4>
                @foreach($Users as $user)
                <div class="card my-4 shadow-sm">
                    <div class="card-header bg-dark text-white d-flex justify-content-between">
                        <span><strong>{{ $user->name }}</strong></span>
                        <span>{{ $usersJoin->where('categoryId', $user->categoryId)->first()->Name }}</span>
                    </div>
                    <div class="card-body">
                        <p class="card-text">{{ $user->lowDescription }}</p>
                        <div class="d-flex justify-content-between">
                            <a href="/profile/{{ $user->id }}/{{ $UserId->categoryId }}" class="btn btn-primary rounded">Ver mais</a>
                            <div class="d-flex">
                                @if($UserId->categoryId == 1)
                                <form action="destroy/{{ $user->id }}" method="get" onsubmit="return confirm('Tem certeza que deseja apagar?');" class="mr-2">
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger rounded">Apagar</button>
                                </form>
                                <form action="/editUser/{{$user->id}}" method="get" class="mr-2">
                                        @csrf 
                                        <button type="submit" class="btn btn-warning rounded">Editar</button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
