<div id="confirmPayment" class="modal fade" role="dialog">
        <div class="modal-dialog"> 
              <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Konfirmasi Pembayaran</h4>
                </div>
                <div class="modal-body">
                    {!! Form::open(['route' => 'profile.project.transaction.confirm','enctype' => 'multipart/form-data']) !!}
                        {!! Form::hidden('id', null,['id' => 'id_confirm_payment'])!!}
                        <div class="form-group">
                            <label for="">Upload Bukti Transfer Anda</label>
                            <input type="file" class="form-control" name="upload_receipt">
                        </div>
                        <button type="submit" class="btn btn-red">Upload</button>
                    {!! Form::close() !!}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
          
        </div>
    </div>