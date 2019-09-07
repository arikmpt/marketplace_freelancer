<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use DataTables;
use Yajra\DataTables\Html\Builder;
use Illuminate\Validation\ValidationException;
use App\Traits\JsonResponse;
use App\Helpers\Crud;
use Validator;

class CategoryController extends Controller
{
    use JsonResponse;

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
        $html = $this->dataTableHtml($builder);

        return view('pages.admin.category.index', compact('html'));
    }

    public function dataTableHtml(Builder $builder)
    {
        return $builder->columns([
            [
                'data' => 'DT_RowIndex','title' => 'No',
                'orderable' => false,'searchable' => false,
                'width' => '24px'
            ],
            ['data' => 'name', 'name' => 'name', 'title' => 'Name'],
            [
                'data' => 'action', 
                'name' => 'action', 
                'title' => '#',
                'width' => '80px',
                'orderable' => false,
                'searchable' => false
            ]
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:categories'
        ]);

        if($validator->fails())
            throw new ValidationException($validator);

        $data = $request->all();
        $data['slug'] = str_replace(" ","-", $request->name);
        $store = Crud::save($this->table, $data);

        return $this->responseWithCondition($store, 'Data Berhasil Tersimpan', 'Data Gagal Disimpan');
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:categories,name,'.$request->id
        ]);

        if($validator->fails())
            throw new ValidationException($validator);

        $data = $request->except('_token','id','type');
        $data['slug'] = str_replace(" ","-", $request->name);
        $store = Crud::update($this->table, $data,'id', $request->id);

        return $this->responseWithCondition($store, 'Data Berhasil Terupdate', 'Data Gagal Diupdate');
    }

    public function delete(Request $request)
    {
        $delete = Crud::deleteOne($this->table, 'id', $request->id);

        return $this->responseWithCondition($delete, 'Data Berhasil Dihapus', 'Data Gagal Dihapus');
    }
}
