<div class="modal fade" id="modalForm">
    <div class="modal-dialog">
        <div class="modal-content">
            {{ Form::open(['role' => 'form', 'id' => 'form']) }}
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title">{{ $title }}</h4>
            </div>
            <div class="modal-body">
                {!! Form::hidden('id', null,['id' => 'id']) !!}
                {!! Form::hidden('type', 'POST',['id' => 'type']) !!}
                {{ $slot }}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            {{ Form::close() }}
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>