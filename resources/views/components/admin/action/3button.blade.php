<div class="btn-group">
    <button type="button" class="btn btn-warning btn-icon-anim btn-square btn-sm edit">
        <i class="ti-pencil"></i>
    </button>
    @if($model->is_active)
        <button type="button" class="btn btn-info btn-icon-anim btn-square btn-sm status">
            <i class="ti-na"></i>
        </button>
    @else
        <button type="button" class="btn btn-primary btn-icon-anim btn-square btn-sm status">
            <i class="ti-check"></i>
        </button>
    @endif
    <button type="button" class="btn btn-danger btn-icon-anim btn-square btn-sm trash">
        <i class="ti-trash"></i>
    </button>
</div>