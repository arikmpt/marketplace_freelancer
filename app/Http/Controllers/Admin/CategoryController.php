<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use DataTables;
use Yajra\DataTables\Html\Builder;

class CategoryController extends Controller
{
    public function __construct(Category $category)
    {
        $this->table = $category;
    }

    public function index(Builder $builder, Request $request)
    {
        if($request->ajax())
        {
            return $this->table->dataTableSource();
        }
        $html = $this->table->dataTableHtml($builder);

        return view('pages.admin.category.index', compact('html'));
    }
}
