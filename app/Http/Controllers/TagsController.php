<?php

namespace App\Http\Controllers;

use App\Http\Requests\TagsRequest;
use App\Models\Tag;

class TagsController extends Controller
{
    public function index()
    {
        $tags = Tag::all();
        return view('tags.index', compact('tags'));
    }
    public function create()
    {
        return view('tags.create');
    }
    public function store(TagsRequest $request)
    {
        $request->validated();

        Tag::create($request->only('name'));

        return redirect()->route('tags.index')->with('success', 'Tag created successfully.');
    }
    public function edit(Tag $tag)
    {
        return view('tags.edit', compact('tag'));
    }
    public function update(TagsRequest $request, Tag $tag)
    {
        $request->validated();

        $tag->update($request->only('name'));

        return redirect()->route('tags.index')->with('success', 'Tag updated successfully.');
    }
    public function destroy(Tag $tag)
    {
        $tag->delete();

        return redirect()->route('tags.index')->with('success', 'Tag deleted successfully.');
    }
}
