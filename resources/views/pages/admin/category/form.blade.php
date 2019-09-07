@component('components.admin.modalform')
    @slot('title',' Form Category')
    <div class="form-group">
        <label for="">Nama Kategori</label>
        {{ Form::text('name', null, ['id' => 'name', 
            'class' => 'form-control','data-validation' => 'required',
            'data-validation-error-msg' => 'Name is required'
            ]) }}
    </div>
@endcomponent