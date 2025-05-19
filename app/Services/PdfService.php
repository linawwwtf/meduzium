<?php

namespace App\Services;

use Barryvdh\DomPDF\Facade\Pdf;

class PdfService
{
    public function generatePDF(array $data)
    {
        $pdf = Pdf::loadView('pdf.template', $data)
            ->setPaper('A6', 'portrait');

        return $pdf->download($data['docName'] . '.pdf');
    }
}

