@extends('layouts.admin.master')
@section('page_title', 'Dashboard')
@section('breadcrumb')
    <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
    <li class="active">Skill</li>
@endsection
@section('content')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Data Skill</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalForm">
                    <i class="fa fa-add"></i> Add Skill
                </button>
            </div>
        </div>
        <div class="box-body">
            {!! $html->table() !!}
        </div>
    </div>

    @include('pages.admin.category.form')
@endsection
@push('scripts')
    {!! $html->scripts() !!}
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
    <script src="{{ asset('admin/js/scripts.js') }}"></script>
    <script>
        $( document ).ready(function() {
            $('table#dataTableBuilder tbody').on( 'click', 'td button', function (e) {
                var mode = $(this).attr("data-mode");
                var parent = $(this).parent().get( 0 );
                var parent1 = $(parent).parent().get( 0 );
                var row = $('#dataTableBuilder').DataTable().row(parent1);
                var data = row.data();
                console.log(data)

                if($(this).hasClass('edit')) {
                    $('#type').val('PUT')
                    $('#id').val(data.id)
                    $('#name').val(data.name)
                    $('#parent_id').val(data.parent_id == 0 ? null : data.parent_id)
                    $('#modalForm').modal('show')
                } else {
                    swal({   
                        title: "Are you sure to delete?",   
                        text: "You will not be able to recover this data!",   
                        type: "warning",   
                        showCancelButton: true,   
                        confirmButtonColor: "#ff354d",   
                        confirmButtonText: "Yes, delete it!",   
                        closeOnConfirm: true 
                    }, function(){   
                        $('.preloader-it').show();
                        remove(data.id,"{{ route('admin.skill.delete') }}", "{{ csrf_token() }}")   
                        .then((result) => {
                            $('.preloader-it').hide();
                            success(result.message)
                            $('#dataTableBuilder').DataTable().ajax.reload();
                        })
                        .catch((err) => {
                            $('.preloader-it').hide();
                            fail(err.responseJSON.message)
                            $('#dataTableBuilder').DataTable().ajax.reload();
                        })
                    });
                }
            })
            $.validate({
                form : '#form',
                onSuccess : function(form) {
                    $('.preloader-it').show();
                    const data = $(form).serialize();

                    if($('#type').val() === 'POST')
                    {
                        save(data,"{{ route('admin.skill.save') }}", "{{ csrf_token() }}")
                        .then((result) => {
                            $('#form')[0].reset();
                            $('#modalForm').modal('hide')
                            $('.preloader-it').hide();
                            success(result.message)
                            $('#dataTableBuilder').DataTable().ajax.reload();
                        })
                        .catch((err) => {
                            $('#form')[0].reset();
                            $('#modalForm').modal('hide')
                            $('.preloader-it').hide();
                            if(Array.isArray(err.responseJSON.message)){
                                err.responseJSON.message.forEach(function(v) {
                                    fail(v)
                                })
                            } else {
                                fail(err.responseJSON.message)
                            }
                            $('#dataTableBuilder').DataTable().ajax.reload();
                        })

                    } else {
                        update(data,"{{ route('admin.skill.update') }}", "{{ csrf_token() }}")
                        .then((result) => {
                            $('#form')[0].reset();
                            $('#type').val('POST')
                            $('#modalForm').modal('hide')
                            $('.preloader-it').hide();
                            success(result.message)
                            $('#dataTableBuilder').DataTable().ajax.reload();
                        })
                        .catch((err) => {
                            $('#form')[0].reset();
                            $('#modalForm').modal('hide')
                            $('.preloader-it').hide();
                            $('#type').val('POST')
                            if(Array.isArray(err.responseJSON.message)){
                                err.responseJSON.message.forEach(function(v) {
                                    fail(v)
                                })
                            } else {
                                fail(err.responseJSON.message)
                            }
                            $('#dataTableBuilder').DataTable().ajax.reload();
                        })
                    }
                    return false;
                }
            });

        });
    </script>
@endpush