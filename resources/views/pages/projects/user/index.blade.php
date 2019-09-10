@extends('layouts.master')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/sweetalert.css') }}">
@endsection
@section('breadcrumb')
<div class="bread-crumbs-wrapper">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('homepage') }}" title="" itemprop="url">Beranda</a></li>
            <li class="breadcrumb-item"><a href="{{ route('profile.me') }}" title="" itemprop="url">Akun Saya</a></li>
            <li class="breadcrumb-item active">Proyek Saya</li>
        </ol>
    </div>
</div>
@endsection

@section('content')
<section>
    <div class="block less-spacing gray-bg top-padd30">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-lg-12">
                    <div class="sec-box">
                        <div class="dashboard-tabs-wrapper">
                            <div class="row">
                                <div class="col-md-3 col-sm-12 col-lg-3">
                                    <div class="profile-sidebar brd-rd5 wow fadeIn" data-wow-delay="0.2s">
                                        <div class="profile-sidebar-inner brd-rd5">
                                            <div class="user-info red-bg">
                                                <img class="brd-rd50" src="{{ Auth::user()->photo ? '/storage/'.Auth::user()->photo : 'https://via.placeholder.com/75?text=Belum Ada Foto' }}" alt="user-avatar.jpg" itemprop="image" style="width :60px">
                                                <div class="user-info-inner">
                                                    <h5 itemprop="headline"><a href="#" title="" itemprop="url">{{ Auth::user()->name }}</a></h5>
                                                    <span><a href="#" title="" itemprop="url">{{ Auth::user()->email }}</a></span>
                                                </div>
                                            </div>
                                            <ul class="nav nav-tabs">
                                                <li class="active"><a href="#active" data-toggle="tab"><i class="fa fa-dashboard"></i> Aktif</a></li>
                                                <li><a href="#expire" data-toggle="tab"><i class="fa fa-comments"></i> Kadaluarsa</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-9 col-sm-12 col-lg-9">
                                    <div class="tab-content">
                                        <div class="tab-pane fade in active" id="active">
                                            <div class="tabs-wrp brd-rd5">
                                                <h4 itemprop="headline">Proyek Saya</h4>
                                                <div class="select-wrap-inner text-right">
                                                   <a href="{{route('profile.project.new')}}" class="btn btn-red">Tambah Proyek</a>
                                                </div>
                                                @foreach($projects as $project)
                                                    <div class="review-list" style="margin-bottom: 40px">
                                                        <div class="review-box brd-rd5">
                                                            @if(!$project->is_approve)
                                                                <div class="text-right pull-right">
                                                                    
                                                                    <a href="{{ route('profile.project.edit', $project->uuid) }}" class="btn btn-red">Sunting</a>
                                                                    <button type="button" class="btn btn-red btn-delete">Hapus</button>
                                                                </div>
                                                                {!! Form::open(['id' => 'formDelete','route' => 'profile.project.delete']) !!}
                                                                    {!! Form::hidden('id', $project->id) !!}
                                                                {!! Form::close() !!}
                                                            @elseif($project->status == 'menunggu pembayaran' && $project->user_id == Auth::user()->id)
                                                                <div class="text-right">
                                                                    <button type="button" class="btn btn-red do-payment" data-id="{{ $project->id }}">Lakukan Pembayaran</button>
                                                                </div>
                                                            @elseif($project->status == 'menunggu konfirmasi pembayaran' && $project->user_id == Auth::user()->id)
                                                                <div class="text-right">
                                                                    <button type="button" class="btn btn-red ">Konfirmasi Pembayaran</button>
                                                                </div>
                                                            @endif
                                                            <h4 itemprop="headline" style="width: 100%; margin-bottom: 25px; margin-top: 45px;">
                                                                <a href="{{ route('profile.project.detail', $project->uuid) }}" title="" itemprop="url">{{ $project->title }}</a>
                                                            </h4>
                                                            <div class="row" style="margin-bottom: 25px;">
                                                                <div class="col-md-5">
                                                                    <div class="w100 pull-left">
                                                                        <span class="food-types">Harga :</span>
                                                                        <span>Rp {{ $project->published_budget }}</span>
                                                                    </div>
                                                                    <div class="w100 pull-left">
                                                                        <span class="food-types">Total Penawaran :</span>
                                                                        <span>{{ $project->bids->count() }}</span>
                                                                    </div>
                                                                    <div class="w100 pull-left">
                                                                        <span class="food-types">Lama Pengerjaan :</span>
                                                                        <span>{{ $project->finish_day }} Hari</span>
                                                                    </div>
                                                                    <div class="w100 pull-left">
                                                                        <span class="food-types">Status :</span>
                                                                        <span>{{ $project->status }}</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-7">
                                                                    <div class="w100 pull-left">
                                                                        <span class="food-types">Tawaran Yang Disetujui :</span>
                                                                        <span>{{ $project->winner ? $project->winner->username : '-' }}</span>
                                                                    </div>
                                                                    <div class="w100 pull-left">
                                                                        <span class="food-types">Harga Yang Disepakati:</span>
                                                                        <span>Rp {{ $project->accept_price }}</span>
                                                                    </div>
                                                                    <div class="w100 pull-left">
                                                                        <span class="food-types">Kadaluarsa Pada :</span>
                                                                        <span>{{ $project->created_at->subDays(-15)->format('d/M/Y') }}</span>
                                                                    </div>
                                                                    <div class="w100 pull-left">
                                                                        <span class="food-types">Keahlian Yang Dibutuhkan : </span>
                                                                        @foreach($project->skills as $skill)
                                                                            <span>{{ $skill->name.','}}</span>
                                                                        @endforeach
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            {!! $project->description !!}
                                                        </div>
                                                    </div><!-- Review List -->
                                                @endforeach
                                            </div>
                                        </div>

                                        <div class="tab-pane fade" id="expire">
                                            <div class="tabs-wrp brd-rd5">
                                                <h4 itemprop="headline">Proyek Lama Saya</h4>
                                                @foreach($old_projects as $old)
                                                    <div class="review-list" style="margin-bottom: 40px">
                                                        <div class="review-box brd-rd5">
                                                            <h4 itemprop="headline">
                                                                <a href="{{ route('profile.project.detail', $old->uuid) }}" title="" itemprop="url">{{ $old->title }}</a>
                                                            </h4>
                                                            <div>
                                                                <span class="food-types">Harga:</span>
                                                                <span>Rp {{ $old->published_budget }}</span>
                                                            </div>
                                                            <div class="text-left">
                                                                <p style="width: 100%; margin-bottom: 0">Keahlian : 
                                                                    <span>Php, Jquery</span>
                                                                </p>
                                                                @if($old->is_approve == 0 && $old->is_reject == 0)
                                                                    <p style="width: 100%"> Status : Sedang Direview Admin</p>
                                                                @elseif($old->is_reject == 1 && $old->is_approve == 0)
                                                                    <p style="width: 100%"> Status : Di Tolak Admin</p>
                                                                @elseif($old->is_reject == 0 && $old->is_approve == 1)
                                                                    <p style="width: 100%"> Status : Di Setujui Admin</p>
                                                                @endif
                                                            </div>
                                                            {!! $old->description !!}
                                                        </div>
                                                    </div><!-- Review List -->
                                                @endforeach
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- Section Box -->
                </div>
            </div>
        </div>
    </div>

    @include('pages.projects.user.modal.do_payment')
</section>
@endsection
@push('scripts')
    <script src="{{ asset('assets/js/sweetalert2.all.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $(document).on('click','.btn-delete', function() {
                Swal.fire({
                title: 'Apakah kamu yakin untuk menghapus proyek ini ?',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Batalkan',
                confirmButtonText: 'Iya!'
                }).then((result) => {
                if (result.value) {
                    $("#formDelete").submit();
                }
                })
            })

            $('.do-payment').on('click', function(e) {
                e.preventDefault()
                $.ajax({
                    url : "{{ route('profile.project.transaction.get.transaction') }}",
                    headers: {
                        'X-CSRF-Token': "{{ csrf_token() }}"
                    },
                    type: "POST",
                    data : {
                        id : $(".do-payment").data("id")
                    },
                    success : function(result) {
                        $("#doPayment").modal('show')
                        $("#id").val(result.data.id)
                        $(".price-get-transaction").text(result.data.price + result.data.unique_code)
                    },
                    error : function(err) {
                        console.log(err)
                    }
                })
            })
        })
    </script>
@endpush
