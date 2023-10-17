<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        $data = [];

        if ($startDate && $endDate) {
            $data = DB::table('customers')
                ->join('produkmasuks', 'customers.produkmasuk_id', '=', 'produkmasuks.id')
                ->select(DB::raw('produkmasuks.nama_produk_masuk, customers.tanggal_beli, SUM(customers.jumlah_beli) as total_beli'))
                ->whereBetween('customers.tanggal_beli', [$startDate, $endDate])
                ->groupBy('produkmasuks.nama_produk_masuk', 'customers.tanggal_beli')
                ->get();
        }

        return view('admin.report.index', [
            'data' => $data,
            'start_date' => $startDate,
            'end_date' => $endDate
        ]);
    }


    public function generatePDF($startDate, $endDate)
    {
        $data = DB::table('customers')
            ->join('produkmasuks', 'customers.produkmasuk_id', '=', 'produkmasuks.id')
            ->select(DB::raw('produkmasuks.id, produkmasuks.nama_produk_masuk, customers.tanggal_beli, SUM(customers.jumlah_beli) as total_beli'))
            ->whereBetween('customers.tanggal_beli', [$startDate, $endDate])
            ->groupBy('produkmasuks.id', 'produkmasuks.nama_produk_masuk', 'customers.tanggal_beli')
            ->get();

        $pdf = PDF::loadView('admin.report.pdf-view', ['data' => $data]);
        return $pdf->download('laporan_produk_masuk.pdf');
    }
}
