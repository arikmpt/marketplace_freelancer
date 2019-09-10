<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProjectBid;
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
}
