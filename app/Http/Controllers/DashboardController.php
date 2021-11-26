<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(){
        // $transactions = Transaction::latest()->limit(5)->get(); // untuk mengambil data yang paling baru diinputkan (order by created_by)
        // $transactions = Transaction::orderBy('trx_date')->limit(5)->get(); // untuk mengambil data limit 5 data order by trx_date ASC
        $transactions = Transaction::orderByDesc('trx_date')->limit(5)->get(); // untuk mengambil data limit 5 data order by trx_date DESC
        

        // jika data yang tampil hanya data yang terdapat transaksinya saja
        //Untuk mengaktifkan chart.js berdasarkan database
        // $dataSQL = DB::select('
        //     SELECT MONTHNAME(trx_date) month, count(*) total FROM transactions
        //     GROUP BY MONTHNAME(trx_date)
        //     ORDER BY MONTH(trx_date)
        // ');

        //dd($data);

        // $bulan = [];
        // $totals = [];

        // foreach ($dataSQL as $datasatuan) {
        //     // $bulan[] = $datasatuan->month;
        //     $totals[] = $datasatuan->total;
        // }

        $totals= [];

        //penulisan dibawah berarti mencari data dari trx_date, angka 1 berarti Bulan, dimana Tahun dari trx_date adalah Tahun Sekarang
        $totals[] = Transaction::whereMonth('trx_date',1)->whereYear('trx_date',date('Y'))->count();
        $totals[] = Transaction::whereMonth('trx_date',2)->whereYear('trx_date',date('Y'))->count();
        $totals[] = Transaction::whereMonth('trx_date',3)->whereYear('trx_date',date('Y'))->count();
        $totals[] = Transaction::whereMonth('trx_date',4)->whereYear('trx_date',date('Y'))->count();
        $totals[] = Transaction::whereMonth('trx_date',5)->whereYear('trx_date',date('Y'))->count();
        $totals[] = Transaction::whereMonth('trx_date',6)->whereYear('trx_date',date('Y'))->count();
        $totals[] = Transaction::whereMonth('trx_date',7)->whereYear('trx_date',date('Y'))->count();
        $totals[] = Transaction::whereMonth('trx_date',8)->whereYear('trx_date',date('Y'))->count();
        $totals[] = Transaction::whereMonth('trx_date',9)->whereYear('trx_date',date('Y'))->count();
        $totals[] = Transaction::whereMonth('trx_date',10)->whereYear('trx_date',date('Y'))->count();
        $totals[] = Transaction::whereMonth('trx_date',11)->whereYear('trx_date',date('Y'))->count();
        $totals[] = Transaction::whereMonth('trx_date',12)->whereYear('trx_date',date('Y'))->count();


        return view('admin.dashboard',[
            'transactions' => $transactions,
            // 'bulan' => $bulan, code disamping digunakan jika memunculkan data berdasarkan bulan yg terdapat transaksinya saja
            'totals' => $totals
        ]);
    
    }


}
