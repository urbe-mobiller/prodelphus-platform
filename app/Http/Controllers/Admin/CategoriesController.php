<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use Exception;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Categories::orderBy('name')->get();
        return view('admin.pages.catalog.categories.index', [
            'categories' => $categories
        ]);
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string'
            ], [
                'name.required' => 'Informe o nome da categoria'
            ]);

            Categories::create($request->all());

            return back()->with([
                'alert' => true,
                'type' => 'success',
                'message' => 'Categoria cadastrada com sucesso'
            ]);
        } catch (Exception $e) {
            return back()->with([
                'alert' => true,
                'type' => 'danger',
                'message' => $e->getMessage()
            ]);
        }
    }

    public function update(Request $request)
    {
        try {
            $request->validate([
                'id' => 'required|numeric',
                'name' => 'required|string',
                'status' => 'required|string'
            ], [
                'id.required' => 'Categoria não encontrada',
                'name.required' => 'Informe o nome da categoria',
                'status.required' => 'Informe o status da categoria'
            ]);

            $update = Categories::find($request->id)->update([
                'name' => $request->name,
                'status' => $request->status,
            ]);

            if ($update) {
                return back()->with([
                    'alert' => true,
                    'type' => 'success',
                    'message' => 'Categoria atualizada com sucesso'
                ]);
            }

            return back()->with([
                'alert' => true,
                'type' => 'danger',
                'message' => 'Erro ao tentar atualizar esta categoria'
            ]);
        } catch (Exception $e) {
            return back()->with([
                'alert' => true,
                'type' => 'danger',
                'message' => $e->getMessage()
            ]);
        }
    }

    public function remove(Request $request)
    {
        try {

            $delete = Categories::find($request->id)->delete();

            if ($delete) {
                return back()->with([
                    'alert' => true,
                    'type' => 'success',
                    'message' => 'Categoria removida com sucesso'
                ]);
            }
            return back()->with([
                'alert' => true,
                'type' => 'danger',
                'message' => 'Erro ao tentar remover esta categoria'
            ]);
        } catch (Exception $e) {
            return back()->with([
                'alert' => true,
                'type' => 'danger',
                'message' => $e->getMessage()
            ]);
        }
    }
}
