<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function create()
    {
        $page = "Criar Categoria";
        return view('actions.createCategory', [
            'page' => $page
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
        ], [
            'name.required' => 'O nome da categoria é obrigatório.',
            'name.max' => 'O nome da categoria não pode ter mais que 255 caracteres.',
            'name.unique' => 'Já existe uma categoria com esse nome.',
        ]);

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
            'actions.updateCategory',
            [
                'category' => $category,
                'categories' => $categories,
                'page' => $page
            ]
        );
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $id,
        ], [
            'name.required' => 'O nome da categoria é obrigatório.',
            'name.max' => 'O nome da categoria não pode ter mais que 255 caracteres.',
            'name.unique' => 'Já existe uma categoria com esse nome.',
        ]);

        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->updated_at = now();
        $category->save();

        return redirect('/categories')->with('message', 'Categoria atualizada com sucesso!');
    }



    public function destroy($id)
    {
        category::findorFail($id)->delete();
        return redirect('/categories')->with('message', 'Categoria excluido com sucesso');
    }
}
