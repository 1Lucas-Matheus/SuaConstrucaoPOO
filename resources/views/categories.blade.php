<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sua Construção</title>
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


                <div class="d-flex">
                    <h4 class="mr-2">Categorias:</h4>
                    <form action="/createCategory" method="get" class="mr-2">
                        @csrf
                        <button type="submit" class="btn btn-success">Criar categoria</button>
                    </form>
                </div>


                @foreach($categories as $category)
                <div class="card my-4 shadow-sm">
                    <div class="card-header shadow-sm bg-white text-dark d-flex justify-content-between">
                        <span class="pt-2"><strong>{{ $category->id }} - {{ $category->Name }}</strong></span>
                        <div class="d-flex">
                            <form action="/destroyCategory/{{ $category->id }}" method="get" onsubmit="return confirm('Tem certeza que deseja apagar?');" class="mr-2">
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger rounded">Apagar</button>
                            </form>
                            <form action="/edit/{{ $category->id }}" method="post" class="mr-2">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-warning rounded">Editar</button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </div>
    </div>

</body>

</html>