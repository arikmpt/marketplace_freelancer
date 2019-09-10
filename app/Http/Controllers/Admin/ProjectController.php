<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Project;
use DataTables;
use Yajra\DataTables\Html\Builder;

class ProjectController extends Controller
{
    public function __construct(Project $project)
    {
        $this->table = $project;
    }

    public function index(Builder $builder, Request $request)
    {
        if($request->ajax())
        {
            return datatables($this->table->all())
            ->addIndexColumn()
            ->addColumn('category_string', function($model) {
                return $model->category->name;
            })
            ->addColumn('owner', function($model) {
                return $model->owner->username;
            })
            ->addColumn('price', function($model) {
                return 'Rp '.$model->published_budget;
            })
            ->addColumn('action', function($model) {
                return '<a href="'.route('admin.project.detail', $model->uuid).'" class="btn btn-primary"> View </a>';
            })
            ->toJson();
        }
        $html = $this->dataTableHtml($builder);

        return view('pages.admin.project.index', compact('html'));
    }

    public function dataTableHtml(Builder $builder)
    {
        return $builder->columns([
            [
                'data' => 'DT_RowIndex','title' => 'No',
                'orderable' => false,'searchable' => false,
                'width' => '24px'
            ],
            ['data' => 'title', 'name' => 'title', 'title' => 'Title'],
            ['data' => 'category_string', 'name' => 'category_string', 'title' => 'Category'],
            ['data' => 'owner', 'name' => 'owner', 'title' => 'Owner'],
            ['data' => 'price', 'name' => 'price', 'title' => 'Published Price'],
            [
                'data' => 'action','title' => '#',
                'orderable' => false,'searchable' => false,
                'width' => '24px'
            ],
        ]);
    }

    public function detail($uuid)
    {
        return view('admin.project.detail');
    }
}
