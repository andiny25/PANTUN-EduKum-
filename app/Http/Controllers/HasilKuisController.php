<?php

namespace App\Http\Controllers;

use App\Models\HasilKuis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\HasilKuisExport;

class HasilKuisController extends Controller
{
    /**
     * Dashboard Hasil Kuis
     */
    public function index()
    {
        // ==========================
        // Data Tabel
        // ==========================

        $data = HasilKuis::latest()->paginate(10);

        // ==========================
        // Statistik Dashboard
        // ==========================

        $totalPeserta = HasilKuis::count();

        $rataRata = round(HasilKuis::avg('skor') ?? 0, 1);

        $nilaiTertinggi = HasilKuis::max('skor') ?? 0;

        $jumlahLulus = HasilKuis::where('status', 'Lulus')->count();

        $jumlahRemedial = HasilKuis::where('status', 'Remedial')->count();

        $belumMengerjakan = HasilKuis::where('status', 'Belum')->count();

        $kelulusan = $totalPeserta > 0
            ? round(($jumlahLulus / $totalPeserta) * 100)
            : 0;

        // ==========================
        // Pie Chart
        // ==========================

        $pieChart = [
            $jumlahLulus,
            $jumlahRemedial,
            $belumMengerjakan
        ];

        // ==========================
        // Grafik Line Chart
        // ==========================

        $grafik = HasilKuis::select(
                DB::raw('MONTH(created_at) as bulan'),
                DB::raw('AVG(skor) as rata')
            )
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->orderBy(DB::raw('MONTH(created_at)'))
            ->get();

        $bulan = [];
        $nilai = [];

        foreach ($grafik as $item) {

            $bulan[] = date('M', mktime(0, 0, 0, $item->bulan, 1));

            $nilai[] = round($item->rata, 1);

        }

        return view('hasil_kuis.index', compact(
            'data',
            'totalPeserta',
            'rataRata',
            'nilaiTertinggi',
            'jumlahLulus',
            'jumlahRemedial',
            'belumMengerjakan',
            'kelulusan',
            'pieChart',
            'bulan',
            'nilai'
        ));
    }

    /**
     * Export PDF
     */
    public function exportPDF()
    {
        $data = HasilKuis::latest()->get();

        $pdf = Pdf::loadView('hasil_kuis.pdf', compact('data'));

        return $pdf->download('Hasil_Kuis.pdf');
    }

    /**
     * Export Excel
     */
    public function exportExcel()
    {
        return Excel::download(
            new HasilKuisExport(),
            'Hasil_Kuis.xlsx'
        );
    }

    /**
     * Download Rekap CSV
     */
    public function download()
    {
        $fileName = 'Rekap_Hasil_Kuis.csv';

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="'.$fileName.'"',
        ];

        $callback = function () {

            $file = fopen('php://output', 'w');

            fputcsv($file, [
                'Nama',
                'Kuis',
                'Skor',
                'Status',
                'Tanggal'
            ]);

            $hasil = HasilKuis::latest()->get();

            foreach ($hasil as $item) {

                fputcsv($file, [

                    $item->nama,

                    $item->kuis,

                    $item->skor,

                    $item->status,

                    optional($item->created_at)->format('d-m-Y')

                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}