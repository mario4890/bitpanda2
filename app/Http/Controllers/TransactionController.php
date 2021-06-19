<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Service\TransactionFromCSV;
use App\Service\TransactionFromDB;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function get(Request $request, TransactionFromDB $transactionFromDBObj, TransactionFromCSV $transactionFromCSVObj)
    {
        if ($request->source == 'db') {
            $transaction = $transactionFromDBObj->get();
        } elseif ($request->source == 'csv') {
            $transaction = $transactionFromCSVObj->get();
        }

        return $transaction;
    }
}
