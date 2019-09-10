<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use DataTables;
use Yajra\DataTables\Html\Builder;

class UserController extends Controller
{
    public function __construct(User $user)
    {
        $this->table = $user;
    }

    public function index(Builder $builder, Request $request)
    {
        if($request->ajax())
        {
            return $this->table->dataTableSource();
        }
        $html = $this->dataTableHtml($builder);

        return view('pages.admin.user.index', compact('html'));
    }

    public function dataTableHtml(Builder $builder)
    {
        return $builder->columns([
            [
                'data' => 'DT_RowIndex','title' => 'No',
                'orderable' => false,'searchable' => false,
                'width' => '24px'
            ],
            ['data' => 'username', 'name' => 'username', 'title' => 'Username'],
            ['data' => 'email', 'name' => 'email', 'title' => 'email'],
            ['data' => 'gender', 'name' => 'gender', 'title' => 'gender'],
            ['data' => 'phone', 'name' => 'phone', 'title' => 'phone'],
        ]);
    }
}
