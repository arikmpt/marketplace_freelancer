<div class="tab-pane fade" id="update-profile">
        <div class="tabs-wrp brd-rd5">
            <h4 itemprop="headline">Perbaruhi Profil</h4>
            {!! Form::open(['route' => 'profile.update']) !!}
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
                    {!! Form::textarea('address',Auth::user()->address, ['class' => 'form-control','placeholder' => 'Masukan Alamat Anda']) !!}
                </div>

                <div class="form-group">
                    <label for="">Provinsi</label>
                    {!! Form::select('state',$states,Auth::user()->state, ['id' => 'state','class' => 'form-control select2','placeholder' => 'Pilih Propinsi']) !!}
                </div>

                <div class="form-group">
                    <label for="">Kota / Kabupaten</label>
                    {!! Form::select('city',[],Auth::user()->city, ['id' => 'city','class' => 'form-control select2','placeholder' => 'Pilih Kota / Kabupaten']) !!}
                </div>

                <div class="form-group">
                    <label for="">Kecamatan</label>
                    {!! Form::select('district',[],Auth::user()->district, ['id' => 'district','class' => 'form-control select2','placeholder' => 'Pilih Kecamatan']) !!}
                </div>

                <div class="form-group">
                    <label for="">Kelurahan</label>
                    {!! Form::select('sub_district',[],Auth::user()->sub_district, ['id' => 'village','class' => 'form-control select2','placeholder' => 'Pilih Kelurahan']) !!}
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

                <button class="btn red-bg text-white" type="submit">Perbaruhi</button>
            {!! Form::close() !!}
        </div>
    </div>