<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Page;
use DataTables;
use Yajra\DataTables\Html\Builder;
use Validator;

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
            ->addColumn('action',function($model) {
                return '<a href="'.route('admin.page.detail', $model->slug).'" class="btn btn-primary">View</a>';
            })
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
            ['data' => 'title', 'name' => 'title', 'title' => 'Title'],
            [
                'data' => 'action','title' => '#','class' => 'text-center',
                'orderable' => false,'searchable' => false,
                'width' => '24px'
            ],
        ]);
    }

    public function new(Request $request)
    {
        return view('pages.admin.pages.new');
    }

    public function edit($slug)
    {
        $page = Page::where('slug', $slug)->firstOrFail();
        return view('pages.admin.pages.edit')
            ->with(['page' => $page]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:pages',
            'description' => 'required|min:50',
        ]);

        if($validator->fails())
            return redirect()->back()->withErrors($validator)->withInput();

        $page = new Page;
        $page->title = $request->title;
        $page->slug = str_replace(' ', '-', $request->title);
        $page->description = $request->description;

        $page->save();

        return $page ? redirect()->route('admin.page.index')->with('success', 'Halaman Baru Berhasil Di Simpan')
            : redirect()->back()->with('danger','Terjadi Kesalahan');

    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:pages',
            'description' => 'required|min:50',
        ]);

        if($validator->fails())
            return redirect()->back()->withErrors($validator)->withInput();

        $page = Page::where('id', $request->id)->firstOrFail();
        $page->title = $request->title;
        $page->slug = str_replace(' ', '-', $request->title);
        $page->description = $request->description;

        $page->save();

        return $page ? redirect()->route('admin.page.index')->with('success', 'Halaman Berhasil Di Sunting')
            : redirect()->back()->with('danger','Terjadi Kesalahan');

    }

    public function detail($uuid)
    {
        $page = Page::where('slug', $uuid)->firstOrFail();

        return view('pages.admin.pages.detail')
            ->with(['page' => $page]);
    }
}
