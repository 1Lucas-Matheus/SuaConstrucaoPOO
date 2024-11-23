<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sua Construção</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

    @extends('layouts.navbars')



    <div id="conteudo" style="margin-left: 220px; margin-top: 70px;">
        <div class="content-area m-5">
            <div>
                @foreach($Users as $user)
                @if($user->id == $id)

                <h1>{{ $user->name }}</h1>
                <hr>
                <h2>Sobre o construtor:</h2>
                <p>{{ $user->longDescription }}</p>

                <div class="d-flex">
                    <h3>Comentários:</h3>
                    <form action="/comment/{{$user->id}}"><button type="submit" class="btn btn-primary">Comentar</button></form>
                </div>
                @foreach($Comments as $comment)
                    @if($comment->UserComentado == $user->name )
                    <div>
                        <div class="card border shadow mt-3">
                            <div class="card-header text-light bg-dark font-weight-bold">
                                {{$comment->UserComentou}}
                            </div>
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        {{$comment->comment}}
                                    </div>

                                    <div class="d-flex">
                                        <form action="/destroyComment/{{ $comment->id }}" method="get" onsubmit="return confirm('Tem certeza que deseja apagar?');" class="mr-2">
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger rounded">Apagar</button>
                                        </form>
                                        <form action="/editComment/{{$comment->id}}" method="post" class="mr-2">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-warning rounded">Editar</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>
            @endif
            @endforeach
        </div>
    </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>