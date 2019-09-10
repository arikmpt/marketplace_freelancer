@extends('layouts.admin.master')
@section('page_title', 'Project Detail')
@section('breadcrumb')
    <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
    <li><a href=" {{ route('admin.project.index') }} "><i class="fa fa-book"></i> Project</a></li>
    <li class="active">{{ $project->title }}</li>
@endsection
@section('content')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">{{ $project->title }}</h3>
            <div class="pull-right">
                @if($project->is_approve == 0 && $project->is_reject == 0)
                    <button type="button" class="btn btn-primary accept">Setujui</button>
                    <button type="button" class="btn btn-danger reject">Tolak</button>
                @elseif($project->is_approve == 1 && $project->is_reject == 0)
                    <button type="button" class="btn btn-danger reject">Tolak</button>
                @else
                    <button type="button" class="btn btn-primary accept">Setujui</button>
                @endif

                {!! Form::open(['id' => 'acceptForm','route' => 'admin.project.accept']) !!}
                    {!! Form::hidden('id', $project->id) !!}
                {!! Form::close() !!}

                {!! Form::open(['id' => 'rejectForm','route' => 'admin.project.reject']) !!}
                    {!! Form::hidden('id', $project->id) !!}
                {!! Form::close() !!}
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-6">
                    <b>Harga :  </b>
                    <p>Rp {{ $project->published_budget }}</p>
                    <b>Lama Pengerjaan :  </b>
                    <p>{{ $project->finish_day }} Hari</p>
                    <b>Keahlian Yang Dibutuhkan :  </b>
                    <p>
                        @foreach($project->skills as $skill)
                            {{ $skill->name }}
                        @endforeach
                    </p>
                </div>
                <div class="col-md-6">
                    <b>Total Penawaran :  </b>
                    <p>{{ $project->bids->count() }}</p>
                    <b>Tawaran Yang Disetujui:  </b>
                    <p>{{ $project->winner ? $project->winner->username : null }}</p>
                    <b>Status :  </b>
                    <p> {{ $project->status }}</p>
                </div>
                <div class="col-md-12">
                    {!! $project->description !!}
                </div>
            </div>
        </div>
    </div>

@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $(document).on('click','.accept', function() {
                swal({   
                    title: "Apakah Anda Yakin Untuk Menyetujui Project Ini?",    
                    type: "warning",   
                    showCancelButton: true,   
                    confirmButtonColor: "#ff354d",   
                    confirmButtonText: "Iya!",   
                    cancelButtonText: "Tidak",   
                    closeOnConfirm: true 
                }, function(){   
                    $("#acceptForm").submit()
                });
            })

            $(document).on('click','.reject', function() {
                swal({   
                    title: "Apakah Anda Yakin Untuk Menolak Project Ini?",    
                    type: "warning",   
                    showCancelButton: true,   
                    confirmButtonColor: "#ff354d",   
                    confirmButtonText: "Iya!",   
                    cancelButtonText: "Tidak",   
                    closeOnConfirm: true 
                }, function(){   
                    $("#rejectForm").submit()
                });
            })
        })
    </script>
@endpush