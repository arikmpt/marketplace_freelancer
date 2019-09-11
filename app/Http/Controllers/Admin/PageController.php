<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Page;
use DataTables;
use Yajra\DataTables\Html\Builder;

class PageController extends Controller
{
    public function __construct(Page $page)
    {
        $this->table = $page;
    }

    public function index(Builder $builder, Request $request)
    {
        if($request->ajax())
        {
            return datatables($this->table->all())
            ->addIndexColumn()
            ->toJson();
        }
        $html = $this->dataTableHtml($builder);

        return view('pages.admin.pages.index', compact('html'));
    }

    public function dataTableHtml(Builder $builder)
    {
        return $builder->columns([
            [
                'data' => 'DT_RowIndex','title' => 'No',
                'orderable' => false,'searchable' => false,
                'width' => '24px'
            ],
            ['data' => 'title', 'name' => 'title', 'title' => 'Title']
        ]);
    }
}
