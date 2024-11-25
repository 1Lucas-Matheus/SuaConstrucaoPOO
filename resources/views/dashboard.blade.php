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
                @if(session('message'))
                <div class="alert alert-success my-3 p-2 col-12" role="alert">
                    <p class="m-2">{{ session('message') }}</p>
                </div>
                @endif

                @if(isset($search))

                <div class="my-4">
                    <h4>Resultados da sua pesquisa:</h4>
                    @php $foundUser = false; @endphp

                    @foreach($Users as $user)
                        @if(strtolower($search) == strtolower(explode(' ', $user->name)[0]))
                    @php $foundUser = true; @endphp
                    <div class="card my-4 shadow-sm">
                        <div class="card-header bg-dark text-white font-weight-bold">{{ $user->name }}</div>
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
                                    <form action="/editUser/{{$User->id}}" method="post">
                                        @method('PUT')
                                        <button type="submit" class="btn btn-warning rounded">Editar</button>
                                    </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach

                    @if(!$foundUser)
                    <p>Nenhum usuário com esse nome encontrado.</p>
                    <div class="dropdown-divider"></div>
                    <h4>Outros usuários:</h4>
                    <div class="my-4">
                        @foreach($Users as $user)
                        @if($user->categoryId > 2)
                        <div class="card my-4 shadow-sm">
                            <div class="card-header bg-dark text-white font-weight-bold">{{ $user->name }}</div>
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
                                        <form action="/editUser/{{$user->id}}" method="post" class="mr-2">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-warning rounded">Editar</button>
                                        </form>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                    @endif
                </div>
                @else
                <div class="my-4">
                    @foreach($Users as $user)
                    @if($user->categoryId > 2)
                    <div class="card my-4 shadow-sm">
                        <div class="card-header bg-dark text-white font-weight-bold">{{ $user->name }}</div>
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
                                    <form action="/editUser/{{$user->id}}" method="post" class="mr-2">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-warning rounded">Editar</button>
                                    </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
                @endif
            </div>
        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>