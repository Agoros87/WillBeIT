<?php

namespace App\Http\Controllers;

use App\Http\Requests\CenterRequest;
use App\Models\Center;
use Illuminate\Http\Request;

class CenterController extends Controller
{
    public function index()
    {
        return view('centers.index', ['centers' => Center::all()]);
    }

    public function create()
    {
        return view('centers.create');
    }

    public function store(CenterRequest $request)
    {
        Center::create($request->validated());

        return redirect()->route('centers.index');
    }

    public function show($id)
    {
        return view('centers.show', ['center' => Center::findOrFail($id)]);
    }

    public function edit($id)
    {
        return view('centers.edit', ['center' => Center::findOrFail($id)]);
    }

    public function update(CenterRequest $request, $id)
    {
        Center::findOrFail($id)->update($request->validated());

        return redirect()->route('centers.index');
    }

    public function destroy($id)
    {
        Center::findOrFail($id)->delete();
        return redirect()->route('centers.index');
    }
}
