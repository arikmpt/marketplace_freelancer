@extends('layouts.master')
@section('breadcrumb')
<div class="bread-crumbs-wrapper">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('homepage') }}" title="" itemprop="url">Beranda</a></li>
            <li class="breadcrumb-item active">Akun Saya</li>
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
                                <div class="col-md-4 col-sm-12 col-lg-4">
                                    <div class="profile-sidebar brd-rd5 wow fadeIn" data-wow-delay="0.2s">
                                        <div class="profile-sidebar-inner brd-rd5">
                                            <div class="user-info red-bg">
                                                <img class="brd-rd50" src="{{ Auth::user()->photo ? '/storage/'.Auth::user()->photo : 'https://via.placeholder.com/75?text=Belum Ada Foto' }}" alt="user-avatar.jpg" itemprop="image" style="width :60px">
                                                <div class="user-info-inner">
                                                    <h5 itemprop="headline"><a href="#" title="" itemprop="url">{{ Auth::user()->name }}</a></h5>
                                                    <span><a href="#" title="" itemprop="url">{{ Auth::user()->email }}</a></span>
                                                    <a class="brd-rd3 sign-out-btn yellow-bg" href="#" title="" itemprop="url"><i class="fa fa-sign-out"></i> Keluar</a>
                                                </div>
                                            </div>
                                            @include('pages.profile.own.menu.index')
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8 col-sm-12 col-lg-8">
                                    <div class="tab-content">
                                        @include('pages.profile.own.tabs.dashboard')
                                        
                                        @include('pages.profile.own.tabs.update_profile')

                                        @include('pages.profile.own.tabs.change_password')


                                        @include('pages.profile.own.tabs.bid')

                                        @include('pages.profile.own.tabs.project')
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- Section Box -->
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@push('scripts')
    <script src="{{ asset('assets/js/sweetalert2.all.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2({
                theme: 'bootstrap'
            });

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

            $(document).on('click','.worker-done', function() {
                Swal.fire({
                title: 'Apakah kamu yakin untuk menyatakan proyek ini selesai ?',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Batalkan',
                confirmButtonText: 'Iya!'
                }).then((result) => {
                if (result.value) {
                    $("#worker-done-form").submit();
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

            $('.confirm-payment').on('click', function(e) {
                $("#id_confirm_payment").val($(".confirm-payment").data('id'))
            })

            $('#state').on('change', function() {
                $.ajax({
                    headers : {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    url : '{{ route("misc.getcities") }}',
                    type : "POST",
                    data : {
                        state_name : $(this).val()
                    },
                    success: function(res){
                        console.log(res)
                        let cities = res.data
                        $("#city").empty()
                        $.each(cities, (key, val) => {
                            $("#city").append($("<option></option>").attr("value", val.name).text(val.name))
                        })
                    },
                    error: function(err) {
                        console.log(err)
                    }
                })

                
            })

            $('#city').on('change', function() {
                $.ajax({
                    headers : {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    url : '{{ route("misc.getdistricts") }}',
                    type : "POST",
                    data : {
                        city_name : $(this).val()
                    },
                    success: function(res){
                        console.log(res)
                        let cities = res.data
                        $("#district").empty()
                        $.each(cities, (key, val) => {
                            $("#district").append($("<option></option>").attr("value", val.name).text(val.name))
                        })
                    },
                    error: function(err) {
                        console.log(err)
                    }
                })

                
            })

            $('#district').on('change', function() {
                $.ajax({
                    headers : {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    url : '{{ route("misc.getvillages") }}',
                    type : "POST",
                    data : {
                        district_name : $(this).val()
                    },
                    success: function(res){
                        console.log(res)
                        let cities = res.data
                        $("#village").empty()
                        $.each(cities, (key, val) => {
                            $("#village").append($("<option></option>").attr("value", val.name).text(val.name))
                        })
                    },
                    error: function(err) {
                        console.log(err)
                    }
                })

                
            })

        })
    </script>
@endpush
