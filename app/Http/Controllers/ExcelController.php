<?php

namespace App\Http\Controllers;

use App\Exports\CentersExport;
use App\Imports\CentersImport;
use App\Imports\UsersImport;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class ExcelController extends Controller
{
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

    public function importUsers(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:xlsx,csv'
        ]);

        Excel::import(new UsersImport, $request->file('file'));

        return back()->with('success', 'Importación exitosa.');
    }

    public function exportUsers()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }

}
