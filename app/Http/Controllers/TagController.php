<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTagRequest;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $tags = Tag::latest('updated_at')->paginate(20);

        return view('pages.dashboard.tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.dashboard.tags.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateTagRequest $request)
    {
        $validated = $request->validated();

        Tag::create($validated);

        return redirect(route('dashboard.tags.index'))->with([
            'success' => 'Тег успешно добавлен'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        return view('pages.dashboard.tags.form', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(CreateTagRequest $request, Tag $tag)
    {
        $validated = $request->validated();

        $tag->updateOrFail($validated);

        return redirect(route('dashboard.tags.index'))->with([
            'success' => 'Тег успешно обновлён'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        $tag->deleteOrFail();

        return back()->with(['success' => 'Тег успешно удалён']);
    }
}
