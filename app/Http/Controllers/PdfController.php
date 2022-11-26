<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserDetails;
use PDF;

class PdfController extends Controller
{
    //

    public function generate_pdf()
    {
            $all_details = UserDetails::orderBy('id', 'desc')->get();

            $title = 'User Details';
            $date = date('m/d/Y');
            $all_details = $all_details;
           
             $pdf = PDF::loadView('user.pdf.pdfViewer', compact('title', 'date', 'all_details'))->setOptions(['defaultFont' => 'sans-serif']);
             return $pdf->download('userDetails.pdf');
             return redirect()->back();
    }
}
