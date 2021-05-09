<?php

namespace App\Http\Controllers\Admin\Contract;

use App\Http\Controllers\Controller;
use App\Traits\NumericString;
use Illuminate\Http\Request;

class ContractController extends Controller
{
    public function index()
    {
        $amountDeal = 112456; //сумма договора
        $prepayment = 62123; //предоплата
        $money = Money::create($amountDeal, $prepayment);
        $date = getDateInWords();
        $pdf = \PDF::loadView('Pdf\contract', compact('date', 'money'));

        return $pdf->download('pdf_file.pdf');
    }
}
