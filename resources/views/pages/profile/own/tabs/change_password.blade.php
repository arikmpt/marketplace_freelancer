<div class="tab-pane fade" id="change-password">
    <div class="dashboard-wrapper dashboard-profile brd-rd5">
        <div class="dashboard-title">
            <h4 itemprop="headline">Ganti Password</h4>
        </div>
        <div class="restaurants-list">
            <div class="featured-restaurant-box style3 brd-rd5">
                <div class="row">
                    <div class="col-md-12">
                        {!! Form::open(['route' => 'profile.change.password']) !!}
                        <div class="form-group">
                            <label for="">Password Lama</label>
                            {!! Form::password('old_password',['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            <label for="">Password Baru</label>
                            {!! Form::password('new_password',['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            <label for="">Password Konfirmasi</label>
                            {!! Form::password('confirm_password',['class' => 'form-control']) !!}
                        </div>
                        <button type="submit" class="btn btn-red">Ganti Password</button>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>