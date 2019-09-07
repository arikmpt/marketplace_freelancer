<div class="tab-pane fade in active" id="dashboard">
    <div class="dashboard-wrapper dashboard-profile brd-rd5">
        <div class="dashboard-title">
            <h4 itemprop="headline">Profile Saya</h4>
        </div>
        <div class="restaurants-list">
            <div class="featured-restaurant-box style3 brd-rd5 wow fadeInUp" data-wow-delay="0.2s">
                <div class="row">
                    <div class="col-md-4">
                        <label for="">Nama</label>
                        <p>{{ Auth::user()->name }}</p>
                    </div>
                    <div class="col-md-4">
                        <label for="">Email</label>
                        <p>{{ Auth::user()->email }}</p>
                    </div>
                    <div class="col-md-4">
                        <label for="">No Handphone</label>
                        <p>{{ Auth::user()->phone ? Auth::user()->phone : '-' }}</p>
                    </div>
                    <div class="col-md-4">
                        <label for="">Tanggal Lahir</label>
                        <p>{{ Auth::user()->birthdate ? Auth::user()->birthdate : '-' }}</p>
                    </div>
                    <div class="col-md-4">
                        <label for="">Jenis Kelamin</label>
                        <p>{{ Auth::user()->gender ? Auth::user()->gender : '-' }}</p>
                    </div>
                    <div class="col-md-4">
                        <label for="">Alamat</label>
                        <p>{{ Auth::user()->address ? Auth::user()->address : '-' }}</p>
                    </div>
                    <div class="col-md-4">
                        <label for="">Provinsi</label>
                        <p>{{ Auth::user()->state ? Auth::user()->state : '-' }}</p>
                    </div>
                    <div class="col-md-4">
                        <label for="">Kota</label>
                        <p>{{ Auth::user()->city ? Auth::user()->city : '-' }}</p>
                    </div>
                    <div class="col-md-4">
                        <label for="">Kecamatan</label>
                        <p>{{ Auth::user()->district ? Auth::user()->district : '-' }}</p>
                    </div>
                    <div class="col-md-4">
                        <label for="">Kelurahan</label>
                        <p>{{ Auth::user()->sub_district ? Auth::user()->sub_district : '-' }}</p>
                    </div>
                    <div class="col-md-4">
                        <label for="">Kodepos</label>
                        <p>{{ Auth::user()->postal_code ? Auth::user()->postal_code : '-' }}</p>
                    </div>
                    <div class="col-md-12">
                        <label for="">Tentang Saya</label>
                        <p>{{ Auth::user()->about ? Auth::user()->about : '-' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>