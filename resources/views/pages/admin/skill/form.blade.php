@component('components.admin.modalform')
    @slot('title',' Form Skill')
    <div class="form-group">
        <label for="">Nama Skill</label>
        {{ Form::text('name', null, ['id' => 'name', 
            'class' => 'form-control','data-validation' => 'required',
            'data-validation-error-msg' => 'Name is required'
            ]) }}
    </div>
@endcomponent