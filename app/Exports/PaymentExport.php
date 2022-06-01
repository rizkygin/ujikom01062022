<?php

namespace App\Exports;

use App\Models\Payment;

use Illuminate\Contracts\View\View;
use Illuminate\Contracts\Support\Responsable;

use Maatwebsite\Excel\Concerns\FromView;

class PaymentExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('exports.payment', [
            'payments' => Payment::all()
        ]);
    }
}
