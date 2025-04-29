<?php

namespace App\Http\Controllers;

use App\Imports\UsersImport;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class ExcelController extends Controller
{
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:xlsx,csv'
        ]);

        Excel::import(new UsersImport, $request->file('file'));

        return back()->with('success', 'Importación exitosa.');
    }

    public function export()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }
}
