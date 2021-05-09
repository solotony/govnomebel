<?php

namespace App\Http\Controllers\Admin\Contract;

use App\Traits\NumericString;

class Money
{
    use NumericString;

    public $amountDeal;
    public $amountDealStr;
    public $prepayment;
    public $prepaymentStr;

    private function __construct($amountDeal, $prepayment)
    {
        $this->amountDeal = $amountDeal;
        $this->amountDealStr = $this->num2str($amountDeal);

        $this->prepayment = $prepayment;
        $this->prepaymentStr = $this->num2str($prepayment);
    }

    public static function create($amountDeal, $prepayment)
    {
        return new self($amountDeal, $prepayment);
    }
}
