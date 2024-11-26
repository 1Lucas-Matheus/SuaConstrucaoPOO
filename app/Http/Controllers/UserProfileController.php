<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use App\Models\User;

class UserProfileController extends Controller
{

    public function index($id, $category)
    {
        $Comments = Comments::all();
        $Users = User::all();
        $page = "Perfil";

        $usersJoin = Comments::select('comments.UserComentou', 'users.name')
        ->join('users', 'comments.UserComentou', '=', 'users.id')
        ->get();
        
        return view('profile',
        [
            'Users' => $Users,
            'id' => $id,
            'category' => $category,
            'Comments' => $Comments,
            'usersJoin' => $usersJoin,
            'page' => $page
        ]);
    }

    public function destroy($id)
    {
        User::findorFail($id)->delete();
        return redirect('/dashboard')->with('message', 'Usuario excluido com sucesso');
    }
    
}
