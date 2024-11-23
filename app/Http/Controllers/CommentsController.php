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
        $UserCommented = User::findorfail($id);
        $UserSession = Auth::user();
        $Comments = comments::all();
        $AvaliationsType = Avaliations::all();
        $page = "Adicionar Comentario";
        return view('CreateComment', [
            'UserSession' => $UserSession,
            'UserCommented' => $UserCommented,
            'Comments' => $Comments,
            'AvaliationsType' => $AvaliationsType,
            'page' => $page
        ]);
    }

    public function store(Request $request)
    {
        $comments = new Comments();
        $comments->UserComentou = $request->UserComentou;
        $comments->UserComentado = $request->UserComentado;
        $comments->comment = $request->comment;
        $comments->avaliationId = $request->avaliationId;
        $UserCommented = $comments->UserComentado;

        $comments->save();

        return redirect('/dashboard')
            ->with('UserSession', $UserCommented)
            ->with('message', 'Comentário adicionado com sucesso');
    }


    public function edit($id)
    {
        $idComment = $id;
        $UserSession = Auth::user();
        $AvaliationsType = Avaliations::all();
        $comments = comments::all();
        $page = "Editar comentario";

        return view(
            'updateComment',
            [
                'UserSession' => $UserSession,
                'idComment' => $idComment,
                'AvaliationsType' => $AvaliationsType,
                'page' => $page,
                'comments' => $comments,
                'page' => $page
            ]
        );
    }

    public function update(Request $request, $id)
    {
        $comment = comments::findOrFail($id);
    
        $comment->UserComentado = $request->UserComentado;
        $comment->comment = $request->comment;
        $comment->avaliationId = $request->avaliationId;
        $comment->updated_at = now();
    
        $comment->save();
    
        return redirect('/dashboard')
            ->with('message', 'Comentário atualizado com sucesso!');
    }
    


    public function destroy($id)
    {
        comments::findorFail($id)->delete();
        return redirect('/dashboard')->with('message', 'Cometário excluido com sucesso');
    }
}
