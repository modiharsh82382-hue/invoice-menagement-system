<?php

namespace App\Http\Controllers;

class ReportController extends Controller
{
    public function index()
    {
        return view('reports.index');
    }

    public function exportPdf()
    {
        return response()->download(
            public_path('sample-report.pdf'),
            'Invoice_Report.pdf'
        );
    }

    public function exportExcel()
    {
        return response()->download(
            public_path('sample-report.xlsx'),
            'Invoice_Report.xlsx'
        );
    }
}