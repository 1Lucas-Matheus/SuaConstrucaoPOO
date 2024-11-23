<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function create()
    {
        $page = "Criar Categoria";
        return view('createCategory', [
            'page' => $page
        ]);
    }

    public function store(Request $request)
    {

        $category = new Category();
        $category->name = $request->name;

        $category->save();

        return redirect('/categories')->with('message', 'Categoria criada com sucesso');
    }

    public function edit($id)
    {
        $category = category::findOrFail($id);
        $categories = category::All();
        $page = "Atualizar Categoria";

        return view(
            'updateCategory',
            [
                'category' => $category,
                'categories' => $categories,
                'page' => $page
            ]);
    }

    public function update(Request $request, $id)
    {
        $category = category::findOrFail($id);
        $categories = category::All();
        $page = "Categorias";
        $category->Name = $request->Name;
        $category->id = $request->id;
        $category->updated_at = now();
        $category->save();

        return view('/categories',
        [
            'categories' => $categories,
            'page' => $page
        ])->with('message', 'Usuário atualizado com sucesso!');
    }


    public function destroy($id)
    {
        category::findorFail($id)->delete();
        return redirect('/categories')->with('message', 'Categoria excluido com sucesso');
    }
}
