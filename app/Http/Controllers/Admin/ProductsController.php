<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProducsImages;
use App\Models\ProducsModels;
use App\Models\Products;
use Exception;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {

        $products = Products::with([
            'category',
            'images',
            'models'
        ])->orderBy('name')->get();

        return view('admin.pages.catalog.products.index', [
            'products' => $products
        ]);
    }

    public function save(Request $request)
    {
        try {

            $request->validate([
                'name' => 'required|string',
                'id_category' => 'required|numeric',
                'code' => 'required|string',
                'highlights' => 'required|numeric',
                'releases' => 'required|numeric',
                'images' => 'required|array|min:1',
            ]);

            $store = Products::where([
                'name' => $request->name,
                'id_category' => $request->category,
            ])->first();

            if ($store) {
                return back()->with([
                    'alert' => true,
                    'type' => 'info',
                    'message' => 'Produto já cadastrado'
                ]);
            }

            $product = Products::create($request->all());

            if ($product) {

                if (count($request->images) > 0) {
                    foreach ($request->images as $key => $value) {
                        $file = $value['image']->store('produtos');
                        $image = new ProducsImages();
                        $image->id_product = $product->id;
                        $image->url = $file;
                        $image->save();
                        unset($image);
                    }
                }

                if (count($request->models) > 0) {
                    foreach ($request->models as $key => $value) {
                        $model = new ProducsModels();
                        $model->id_product = $product->id;
                        $model->code = $value['code'];
                        $model->name = $value['name'];
                        $model->description = $value['description'];
                        $model->save();
                        unset($model);
                    }
                }

                return back()->with([
                    'alert' => true,
                    'type' => 'success',
                    'message' => 'Produto cadastrado com sucesso'
                ]);
            }
        } catch (Exception $e) {
            return back()->with([
                'alert' => true,
                'type' => 'danger',
                'message' => $e->getMessage()
            ]);
        }
    }
}
