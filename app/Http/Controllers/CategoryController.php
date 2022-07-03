<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCategoryRequest;
use App\Models\Category;
use Illuminate\View\View;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $categories = Category::latest('updated_at')->paginate(20);

        return view('pages.dashboard.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.dashboard.categories.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateCategoryRequest $request)
    {
        $validated = $request->validated();

        Category::create($validated);

        return redirect(route('dashboard.categories.index'))->with([
            'success' => 'Категория успешно добавлена'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('pages.dashboard.categories.form', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreateCategoryRequest $request, Category $category)
    {
        $validated = $request->validated();

        $category->updateOrFail($validated);

        return redirect(route('dashboard.categories.index'))->with([
            'success' => 'Категория успешно обновлена'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(Category $category)
    {
        $category->deleteOrFail();

        return back()->with(['success' => 'Категория успешно удалена']);
    }
}
