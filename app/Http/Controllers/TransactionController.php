<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Project;
use Validator;
use Storage;

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

    public function confirm(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'upload_receipt' => 'required',
        ]);

        if($validator->fails())
            return redirect()->back()->withErrors($validator)->withInput();
            
        $transaction = Transaction::where('project_id', $request->id)->firstOrFail();
        $transaction->upload_receipt = $this->upload($request->file('upload_receipt'), 'receipts');
        $transaction->save();

        $project = Project::where('id', $transaction->project_id)->firstOrFail();
        $project->status = 'menunggu konfirmasi dari admin';
        $project->save();

        return $transaction ? redirect()->back()->with('success','Konfirmasi Pembayaran Berhasil')
            : redirect()->back()->with('danger','Terjadi Kesalahan');
    }

    private function upload($data, $location)
    {
        $fileName = str_random(20).'.'.$data->getClientOriginalExtension();
        $path = 'uploads/'.$location.$fileName;
        $process = Storage::disk('public')->put($path, file_get_contents($data),'public');

        return $path;
    }
}
