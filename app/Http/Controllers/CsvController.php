<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;  
use App\Exports\UsersExport;
use App\Imports\UsersImport;

class CsvController extends Controller
{
    //

    public function export()
    {
            return Excel::download(new UsersExport, 'users.csv'); 
    }

    public function import_csv_page()
    {
            return view('user.import');
    }

    public function import_csv(Request $request)
    {
         if($request->isMethod('post')){
            Excel::import(new UsersImport, request()->file('file'));
            return redirect()->route('/');
         }

         else{
               abort(403);
         }
    }
}
