<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

class TransactionController extends Controller
{
    public function getTransaction(Request $request)
    {
        $transaction = Transaction::where('project_id', $request->id)->firstOrFail();

        return response()->json([
            'success' => true,
            'data' => $transaction
        ]);
    }
}
