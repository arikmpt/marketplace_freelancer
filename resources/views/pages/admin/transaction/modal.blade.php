<div id="modal" class="modal fade" role="dialog">
    <div class="modal-dialog"> 
            <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Lakukan Pembayaran</h4>
            </div>
            <div class="modal-body">
                <img src="" class="img-responsive" id="receiptImg">
                {!! Form::open(['route' => 'admin.transaction.confirm']) !!}
                    {!! Form::hidden('id', null, ['id' => 'id']) !!}
                    <button class="btn btn-primary" type="submit">Konfirmasi</button>
                {!! Form::close() !!}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
        
    </div>
</div>