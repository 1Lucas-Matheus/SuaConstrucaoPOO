<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $page }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    @extends('layouts.navbars')

    <div id="conteudo" style="margin-left: 220px; margin-top: 70px;">
        <div class="content-area m-5">
            <div>
                <form action="/storeComment" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Usuário comentando:</label>
                        <input type="hidden" name="UserComentou" value="{{ $UserSession->id }}">
                        <input type="text" class="form-control mb-2" value="{{ $UserSession->name }}" disabled>
                    </div>

                    <div class="form-group">
                        <label>Quem está recebendo o comentário:</label>
                        <input type="hidden" name="UserComentado" value="{{ $UserCommented->id }}">
                        <input type="text" class="form-control mb-2" value="{{ $UserCommented->name }}" disabled>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Comentário:</label>
                        <textarea name="comment" class="form-control @error('comment') is-invalid @enderror" required></textarea>
                        @if ($errors->has('comment'))
                            <div class="text-danger">{{ $errors->first('comment') }}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Avaliação:</label>
                        <select name="avaliationId" class="form-control @error('avaliationId') is-invalid @enderror" required>
                            @foreach($AvaliationsType as $AvaliationType)
                                <option value="{{ $AvaliationType->id }}">
                                    {{ $AvaliationType->avaliationType }}
                                </option>
                            @endforeach
                        </select>
                        @if ($errors->has('avaliationId'))
                            <div class="text-danger">{{ $errors->first('avaliationId') }}</div>
                        @endif
                    </div>

                    <input type="submit" class="btn btn-success" value="Comentar">
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
