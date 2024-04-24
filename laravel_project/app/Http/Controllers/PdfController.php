<?php

namespace App\Http\Controllers;

use App\Models\Communication_manifestation;
use App\Models\Condidat;
use App\Models\Doctorant;
use App\Models\Mobilite;
use App\Models\Publication_revue;
use App\Models\These;
use Dompdf\Dompdf;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfController extends Controller
{
    public function generatePDF()
    {
        ini_set('max_execution_time', 300);

        $doctorant = Doctorant::where('id', auth()->id())->first();
        $condidat = Condidat::where('user_id', auth()->id())->latest()->first();
        $these = These::where('user_id', auth()->id())->latest()->first();
        $production = Publication_revue::where('user_id', auth()->id())->latest()->first();
        $communication = Communication_manifestation::where('user_id', auth()->id())->latest()->first();
        $mobilite = Mobilite::where('user_id', auth()->id())->latest()->first();

        $pdf = PDF::loadView('components.doctorant_pdf', compact('doctorant', 'condidat', 'these', 'production', 'communication', 'mobilite'));

        $pdf->setPaper('A4', 'portrait');

        $pdf->render();

        //return $pdf->stream('condidature_mobilite.pdf');
        return $pdf->download('condidature_mobilite.pdf');
    }
}
