<?php

namespace App\Exports;

use App\Models\Transaction;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

//jika ingin mengexport table langsung
// class Transactionexport implements FromCollection

class Transactionexport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    
    //jika ingin mengexport table langsung
    // public function collection()

    //jika ingin mengexport data dengan header/ judul field 
    public function view():View

    {
        // jika hanya ingin mengexport data saja tanpa header
        // return Transaction::all();

        //jika ingin mengexport data dengan header/ judul field
        $transactions = Transaction::all();
        return view('admin.export.transaction', ['transactions' => $transactions]);
    }
}
