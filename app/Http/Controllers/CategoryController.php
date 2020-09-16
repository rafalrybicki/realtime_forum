<?php

namespace App\Http\Controllers;

use App\Category;
use App\Question;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\QuestionResource;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('JWT', ['only' => ['store', 'update', 'destroy']]);
    }

    public function index()
    {
        return CategoryResource::collection(Category::orderBy('name')->get());
    }

    public function store(CategoryRequest $request)
    {
        $category = new Category;
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->save();

        return response(new CategoryResource($category), 201);
    }

    public function show(Request $request)
    {
        $category = Category::where('slug', $request->category)->first();
        return QuestionResource::collection(Question::where('category_id', $category->id)->paginate(10));
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $category->update(
            [
                'name' => $request->name,
                'slug' => Str::slug($request->name)
            ]
        );
        return new CategoryResource($category, 202);
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return response(null, 204);
    }
}
