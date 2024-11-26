<?php

namespace App\Http\Controllers;

use App\Models\Avaliations;
use App\Models\Comments;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    public function create($id)
    {
        $UserCommented = User::findOrFail($id);
        $UserSession = Auth::user();
        $AvaliationsType = Avaliations::all();
        $page = "Adicionar Comentário";

        return view('actions.CreateComment', [
            'UserSession' => $UserSession,
            'UserCommented' => $UserCommented,
            'AvaliationsType' => $AvaliationsType,
            'page' => $page
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'UserComentou' => 'required|exists:users,id',
            'UserComentado' => 'required|exists:users,id',
            'comment' => 'required|string|max:1000',
            'avaliationId' => 'required|exists:avaliations,id',
        ], [
            'UserComentou.required' => 'O campo de usuário que comentou é obrigatório.',
            'UserComentou.exists' => 'O usuário que comentou não existe.',
            'UserComentado.required' => 'O campo de usuário comentado é obrigatório.',
            'UserComentado.exists' => 'O usuário comentado não existe.',
            'comment.required' => 'O comentário é obrigatório.',
            'comment.string' => 'O comentário deve ser uma string.',
            'comment.max' => 'O comentário não pode ter mais de 1000 caracteres.',
            'avaliationId.required' => 'O campo de avaliação é obrigatório.',
            'avaliationId.exists' => 'A avaliação selecionada não existe.',
        ]);
    
        $comments = new Comments();
        $comments->UserComentou = $request->UserComentou;
        $comments->UserComentado = $request->UserComentado;
        $comments->comment = $request->comment;
        $comments->avaliationId = $request->avaliationId;
    
        $comments->save();
    
        return redirect('/dashboard')->with('message', 'Comentário adicionado com sucesso');
    }

    public function edit($id)
    {
        $idComment = $id;
        $UserSession = Auth::user();
        $AvaliationsType = Avaliations::all();
        $comments = Comments::all();
        $page = "Editar comentário";

        return view('actions.updateComment', [
            'UserSession' => $UserSession,
            'idComment' => $idComment,
            'AvaliationsType' => $AvaliationsType,
            'page' => $page,
            'comments' => $comments
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'UserComentado' => 'required|exists:users,id',
            'comment' => 'required|string|max:1000',
            'avaliationId' => 'required|exists:avaliations,id',
        ], [
            'UserComentado.required' => 'O campo de usuário comentado é obrigatório.',
            'UserComentado.exists' => 'O usuário comentado não existe.',
            'comment.required' => 'O comentário é obrigatório.',
            'comment.string' => 'O comentário deve ser uma string.',
            'comment.max' => 'O comentário não pode ter mais de 1000 caracteres.',
            'avaliationId.required' => 'O campo de avaliação é obrigatório.',
            'avaliationId.exists' => 'A avaliação selecionada não existe.',
        ]);

        $comment = Comments::findOrFail($id);

        $comment->UserComentado = $request->UserComentado;
        $comment->comment = $request->comment;
        $comment->avaliationId = $request->avaliationId;
        $comment->updated_at = now();

        $comment->save();

        return redirect('/dashboard')->with('message', 'Comentário atualizado com sucesso!');
    }

    public function destroy($id)
    {
        Comments::findOrFail($id)->delete();
        return redirect('/dashboard')->with('message', 'Comentário excluído com sucesso');
    }
}
