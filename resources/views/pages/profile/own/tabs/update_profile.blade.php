<div class="tab-pane fade" id="update-profile">
        <div class="tabs-wrp brd-rd5">
            <h4 itemprop="headline">Perbaruhi Profil</h4>
            {!! Form::open() !!}
                <div class="form-group">
                    <label for="">Nama</label>
                    {!! Form::text('name',Auth::user()->name, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    <label for="">Nomor Handphone</label>
                    {!! Form::text('phone',Auth::user()->phone, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    <label for="">Tanggal Lahir</label>
                    {!! Form::text('birthdate',Auth::user()->birthdate, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    <label for="">Jenis Kelamin</label>
                    {!! Form::select('gender',['L' => 'Laki - Laki' ,'P' => 'Perempuan'],Auth::user()->gender, ['class' => 'form-control','placeholder' => 'Pilih Jenis Kelamin']) !!}
                </div>

                <div class="form-group">
                    <label for="">Alamat</label>
                    {!! Form::textarea('address',Auth::user()->address, ['class' => 'form-control','placeholder' => 'Pilih Jenis Kelamin']) !!}
                </div>

                <div class="form-group">
                    <label for="">Provinsi</label>
                    {!! Form::select('state',['L' => 'Laki - Laki' ,'P' => 'Perempuan'],Auth::user()->gender, ['class' => 'form-control select2','placeholder' => 'Pilih Jenis Kelamin']) !!}
                </div>

                <div class="form-group">
                    <label for="">Kota</label>
                    {!! Form::select('city',['L' => 'Laki - Laki' ,'P' => 'Perempuan'],Auth::user()->gender, ['class' => 'form-control select2','placeholder' => 'Pilih Jenis Kelamin']) !!}
                </div>

                <div class="form-group">
                    <label for="">Kecamatan</label>
                    {!! Form::select('district',['L' => 'Laki - Laki' ,'P' => 'Perempuan'],Auth::user()->gender, ['class' => 'form-control select2','placeholder' => 'Pilih Jenis Kelamin']) !!}
                </div>

                <div class="form-group">
                    <label for="">Kelurahan</label>
                    {!! Form::select('sub_district',['L' => 'Laki - Laki' ,'P' => 'Perempuan'],Auth::user()->gender, ['class' => 'form-control select2','placeholder' => 'Pilih Jenis Kelamin']) !!}
                </div>

                <div class="form-group">
                    <label for="">Kode Pos</label>
                    {!! Form::text('postal_code',Auth::user()->postal_code, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    <label for="">Foto</label>
                    {!! Form::file('photo',null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    <label for="">Tentang Saya</label>
                    {!! Form::textarea('about',Auth::user()->about, ['class' => 'form-control','placeholder' => 'Ceritakan Tentang Diri Anda']) !!}
                </div>
            {!! Form::close() !!}
        </div>
    </div>