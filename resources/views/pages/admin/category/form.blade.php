@component('components.admin.modalform')
    @slot('title',' Form Category')
    <div class="form-group">
        <label for="">Nama Kategori</label>
        {{ Form::text('name', null, ['id' => 'category', 'class' => 'form-control']) }}
    </div>
@endcomponent