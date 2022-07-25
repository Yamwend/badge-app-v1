<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Str;
use App\Models\Personne;

class PdfController extends Controller
{
    public function generatePdf(){
        $name = 'Emma';
        $Personnes = Personne::all();
        $pdf = Pdf::loadView('personnes.index', compact('Personnes'))->setPaper('a4','portrait')->save(public_path('badge' . time(). rand('9999', '9999999'). Str::random(10) . '.pdf'));
        //return $pdf->stream();
       // return $pdf->download('badge' . time(). rand('9999', '9999999'). Str::random(10) . '.pdf');
    }
}
