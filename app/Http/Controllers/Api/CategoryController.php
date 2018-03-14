<?php

namespace App\Http\Controllers\Api;

use App\Http\Transformers\CategoryTransformer;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index()
    {
        $paginator = $this->parseFilter(Category::query());

        return $this->response->paginator($paginator, new CategoryTransformer());
    }

    public function store(Request $request)
    {
        $category = new Category();
        $category->name = $request->get('name');
        $category->description = $request->get('description');
        $category->color = $request->get('color');
        $category->save();

        return $this->response->created();
    }

    public function show($id)
    {
        return $this->response->item(Category::findOrFail($id), new CategoryTransformer());
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $this->authorize('update', $category);

        $request->has('name') && $category->name = $request->get('name');
        $request->has('description') && $category->description = $request->get('description');
        $request->has('color') && $category->color = $request->get('color');
        $category->save();
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        $this->authorize('delete', $category);

        $category->delete();

        return $this->response->noContent();
    }
}
