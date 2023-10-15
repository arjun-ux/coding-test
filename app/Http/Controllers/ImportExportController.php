<?php

namespace App\Http\Controllers;

use App\Exports\UserExport;
use App\Imports\ImportUser;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ImportExportController extends Controller
{
    public function export()
    {
        $this->authorize('isAdmin');

        return Excel::download(new UserExport, 'users.xlsx');
    }

    public function import()
    {
        Excel::import(new ImportUser, request()->file('file'));
        return back();
    }
}
