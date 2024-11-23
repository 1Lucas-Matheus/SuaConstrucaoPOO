<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientsController extends Controller
{
    public function clients(Request $request)
    {
        $Users = User::all();
        $UserId = Auth::user();
        $page = "Clientes";

        $usersJoin = User::select('users.categoryId', 'categories.Name')
            ->join('categories', 'users.categoryId', '=', 'categories.id')
            ->get();

        return view('clients', [
            'Users' => $Users,
            'UserId' => $UserId,
            'usersJoin' => $usersJoin,
            'page' => $page
        ]);
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $categories = Category::all();
        $page = "Update";

        $usersJoin = User::select('users.categoryId', 'categories.Name')
            ->join('categories', 'users.categoryId', '=', 'categories.id')
            ->get();

        return view(
            'update',
            [
                'user' => $user,
                'categories' => $categories,
                'usersJoin' => $usersJoin,
                'page' => $page
            ]);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = bcrypt($request->password);
        }
        $user->categoryId = $request->categoryId;
        $user->lowDescription = $request->lowDescription;
        $user->longDescription = $request->longDescription;
        $user->updated_at = now();
        $user->save();

        return redirect()->route('dashboard', $id)->with('message', 'Usuário atualizado com sucesso!');
    }
}
