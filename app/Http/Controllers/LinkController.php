<?php

namespace App\Http\Controllers;

use App\Http\Requests\ModalCreateLinkRequest;
use App\Http\Requests\UpdateLinkRequest;
use App\Models\{Link, Material};
use Illuminate\View\View;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        $links = Link::latest('updated_at')->paginate(20);

        return view('pages.dashboard.links.index', compact('links'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.dashboard.links.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ModalCreateLinkRequest $request)
    {
        $validated = $request->validated();
        $material = Material::where('id', $request->material_id)->first();
        $link = Link::create($request->only('title', 'url'));

        $link->materials()->attach($material);

        return back()->with(['success' => 'Ссылка успешно добавлена']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Link $link)
    {
        return view('pages.dashboard.links.form', compact('link'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLinkRequest $request, Link $link)
    {
        $validated = $request->validated();

        $link->updateOrFail($validated);

        return back()->with(['success' => 'Ссылка успешно обновлена']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Link $link)
    {
        $link->deleteOrFail();

        return back()->with(['success' => 'Ссылка успешно удалена']);
    }
}
