<?php

namespace App\Http\Controllers;

use App\Exports\CentersExport;
use App\Http\Requests\CenterRequest;
use App\Imports\CentersImport;
use App\Models\Center;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class CenterController extends Controller
{
    public function index()
    {
        $centers = Center::withCount('posts')->with('users')->get();

        return view('centers.index', compact('centers'));
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

    public function importCenters(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:xlsx,csv'
        ]);

        Excel::import(new CentersImport, $request->file('file'));

        return back()->with('success', 'Importación exitosa.');
    }

    public function exportCenters()
    {
        return Excel::download(new CentersExport, 'centers.xlsx');
    }
}
