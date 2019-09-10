<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Project;

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

    public function paid(Request $request)
    {
        $transaction = Transaction::where('id', $request->id)->firstOrFail();
        $transaction->is_paid = 1;
        $transaction->save();

        $project = Project::where('id', $transaction->project_id)->firstOrFail();
        $project->status = 'menunggu konfirmasi pembayaran';
        $project->save();

        return $transaction ? redirect()->back()->with('success','Pembayaran Berhasil')
            : redirect()->back()->with('danger','Terjadi Kesalahan');
    }
}
