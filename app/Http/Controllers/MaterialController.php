<?php

namespace App\Http\Controllers;

use App\Http\Requests\AttachTagRequest;
use App\Http\Requests\CreateMaterialRequest;
use App\Http\Requests\DetachLinkRequest;
use App\Models\{Category, Link, Material, MaterialType, Tag};
use Illuminate\Http\Request;
use Illuminate\View\View;


class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index(Request $request): View
    {
        $materials = Material::with('category', 'links', 'tags')
            ->tag()
            ->search()
            ->latest('updated_at')
            ->paginate(20)
            ->appends(request()->query());

        return view('pages.dashboard.materials.index', compact('materials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $types = MaterialType::toArray();
        $categories = Category::select('id', 'title')->get();

        return view('pages.dashboard.materials.form', compact('types', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateMaterialRequest $request)
    {
        $validated = $request->validated();

        Material::create($validated);

        return redirect(route('dashboard.materials.index'))->with([
            'success' => 'Материал успешно добавлен'
        ]);
    }

    /**
     * Display the specified resource.
     *
     */
    public function show(Material $material): View
    {
        $material = Material::where('id', $material->id)
            ->with('category', 'tags', 'links')->first();
        $tags = Tag::select('id', 'title')->get();

        return view('pages.dashboard.materials.item', compact('material', 'tags'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Material $material): View
    {
        $types = MaterialType::toArray();
        $categories = Category::select('id', 'title')->get();

        return view('pages.dashboard.materials.form', compact('material', 'types', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreateMaterialRequest $request, Material $material)
    {
        $validated = $request->validated();

        $material->updateOrFail($validated);

        return redirect(route('dashboard.materials.index'))->with([
            'success' => 'Материал успешно обновлён'
        ]);
    }

    /**
     * Attach Tag
     */
    public function tagAttach(AttachTagRequest $request, Material $material)
    {
        $request->validated();
        $tag = Tag::findOrFail($request->tag_id);
        $material->tags()->syncWithoutDetaching($tag);

        return back()->with([
            'success' => 'Тег к материалу успешно добавлен'
        ]);
    }

    /**
     * Detach Tag
     */
    public function tagDetach(AttachTagRequest $request, Material $material)
    {
        $request->validated();
        $tag = Tag::findOrFail($request->tag_id);
        $material->tags()->detach($tag);

        return back()->with([
            'success' => 'Тег откреплён'
        ]);
    }

    /**
     * Detach Link
     */
    public function linkDetach(DetachLinkRequest $request, Material $material)
    {
        $request->validated();
        $link = Link::findOrFail($request->link_id);
        $link->materials()->detach();

        return back()->with([
            'success' => 'Ссылка откреплена'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Material $material)
    {
        $material->deleteOrFail();

        return back()->with(['success' => 'Материл успешно удалён']);
    }
}
