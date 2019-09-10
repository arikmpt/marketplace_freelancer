<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProjectBid;
use App\Models\Project;
use App\Helpers\Crud;
use Auth;

class BidController extends Controller
{
    public function store(Request $request, ProjectBid $table)
    {
        if($request->user_id == $request->project_user_id)
            return redirect()->back()->with('danger', 'Anda tidak bisa menawar proyek anda sendiri');

        if($request->price < $request->project_price)
            return redirect()->back()->with('danger', 'Anda tidak bisa menawar lebih rendah dari harga proyek nya');

        $check = $table->where('user_id', $request->user_id)->where('project_id', $request->project_id)->first();
        if($check) {
            $store = $check->update(['price' => $request->price, 'description' => $request->description]);
        } else {
            $store = Crud::save($table, $request->all());

        }
        
        return $store ? view('pages.bids.bid_placed') : redirect()->back()->with('danger', 'Terjadi Kesalahan');
    }

    public function chooseWinner(Request $request, ProjectBid $table, Project $projectTable)
    {
        $bid = $table->where('id', $request->id)->firstOrFail();
        
        $project = $projectTable->where('id', $bid->project_id)->firstOrFail();
        $project->status = 'menunggu pembayaran';
        $project->accept_price = $bid->price;
        $project->winner_id = $bid->user_id;
        $project->save();

        return $project ? redirect()->route('profile.project.list')->with('success', 'Pemenang berhasil di tentukan')
            : redirect()->back()->with('danger', 'Terjadi kesalahan');
    }
}
