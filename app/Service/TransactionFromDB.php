<?php

namespace App\Service;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionFromDB
{
    public function get(): string
    {
        $transactionObj = new Transaction();
        $transaction    = $transactionObj->all();

        return $transaction;
    }
}
