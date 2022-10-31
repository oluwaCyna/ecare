<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DisplayController extends Controller
{
    public function display()
    {
        return view('credential');
    }

     // Generate PDF
     public function createPDF() {
        // retreive all records from auth
        $data = Auth::user();
        // share data to view
        $pdf = PDF::loadView('pdf_view',compact(['data']));
        // download PDF file with download method
        return $pdf->download($data['title']."_".$data['first_name'].'_credential.pdf');
      }
     
}
