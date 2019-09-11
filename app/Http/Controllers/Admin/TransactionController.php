<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\Project;
use DataTables;
use Yajra\DataTables\Html\Builder;

class TransactionController extends Controller
{
    public function __construct(Transaction $transaction)
    {
        $this->table = $transaction;
    }

    public function index(Builder $builder, Request $request)
    {
        if($request->ajax())
        {
            return datatables($this->table->all())
            ->addIndexColumn()
            ->addColumn('project', function($model) {
                return $model->project->title;
            })
            ->addColumn('owner', function($model) {
                return $model->owner->username;
            })
            ->addColumn('winner', function($model) {
                return $model->winner->username;
            })
            ->addColumn('price', function($model) {
                $total = $model->price + $model->unique_code;
                return 'Rp '.$total;
            })
            ->addColumn('fee', function($model) {
                return $model->fee_percentage.' %';
            })
            ->addColumn('fee_price', function($model) {
                return 'Rp '.$model->fee_price;
            })
            ->addColumn('status', function($model) {
                return $model->project->status;
            })
            ->addColumn('action', function($model) {
                if(!$model->is_confirmation) {

                    return '<button type="button" class="btn btn-primary confirm">Konfirmasi</button>';
                }
            })
            ->toJson();
        }
        $html = $this->dataTableHtml($builder);

        return view('pages.admin.transaction.index', compact('html'));
    }

    public function dataTableHtml(Builder $builder)
    {
        return $builder->columns([
            [
                'data' => 'DT_RowIndex','title' => 'No',
                'orderable' => false,'searchable' => false,
                'width' => '24px'
            ],
            ['data' => 'project', 'name' => 'project', 'title' => 'Project'],
            ['data' => 'owner', 'name' => 'owner', 'title' => 'Owner'],
            ['data' => 'winner', 'name' => 'winner', 'title' => 'Winner'],
            ['data' => 'price', 'name' => 'price', 'title' => 'Price'],
            ['data' => 'fee', 'name' => 'fee', 'title' => 'Fee'],
            ['data' => 'fee_price', 'name' => 'fee_price', 'title' => 'Fee Price'],
            ['data' => 'status', 'name' => 'status', 'title' => 'Status'],
            [
                'data' => 'action','title' => 'Action',
                'orderable' => false,'searchable' => false,
                'width' => '50px'
            ],
        ]);
    }

    public function confirm(Request $request)
    {
        $transaction = $this->table->where('id', $request->id)->firstOrFail();
        $transaction->is_confirmation = 1;
        $transaction->save();

        $project = Project::where('id', $transaction->project_id)->firstOrFail();
        $project->status = 'proyek sudah bisa di kerjaan';
        $project->save();

        return $transaction ? redirect()->back()->with('success', 'Konfirmasi Berhasil')
            : redirect()->back()->with('danger', 'Terjadi Kesalahan');
    }
}
