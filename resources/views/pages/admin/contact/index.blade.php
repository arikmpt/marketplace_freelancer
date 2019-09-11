@extends('layouts.admin.master')
@section('page_title', 'Setting Contact')
@section('breadcrumb')
    <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
    <li class="active">Contanct</li>
@endsection
@section('content')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Contact Setting</h3>
        </div>
        <div class="box-body">
            {!! Form::open(['route' => 'admin.contact.save']) !!}
                <div class="form-group">
                    <label for="">Email</label>
                    {!! Form::text('email', $contact ? $contact->email : null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    <label for="">Phone</label>
                    {!! Form::text('phone', $contact ? $contact->phone : null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    <label for="">Address</label>
                    {!! Form::textarea('address', $contact ? $contact->address : null, ['class' => 'form-control']) !!}
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>

            {!! Form::close() !!}
        </div>
    </div>

@endsection