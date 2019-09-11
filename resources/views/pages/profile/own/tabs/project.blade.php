<div class="tab-pane fade" id="active">
    <div class="tabs-wrp brd-rd5">
        <h4 itemprop="headline">Proyek Saya</h4>
        <div class="select-wrap-inner text-right">
            <a href="{{route('profile.project.new')}}" class="btn btn-red">Tambah Proyek</a>
        </div>
        @foreach($projects as $project)
            <div class="review-list" style="margin-bottom: 40px">
                <div class="review-box brd-rd5">
                    @if(!$project->is_approve)
                        <div class="text-right pull-right">
                            
                            <a href="{{ route('profile.project.edit', $project->uuid) }}" class="btn btn-red">Sunting</a>
                            <button type="button" class="btn btn-red btn-delete">Hapus</button>
                        </div>
                        {!! Form::open(['id' => 'formDelete','route' => 'profile.project.delete']) !!}
                            {!! Form::hidden('id', $project->id) !!}
                        {!! Form::close() !!}
                    @elseif($project->status == 'menunggu pembayaran' && $project->user_id == Auth::user()->id)
                        <div class="text-right">
                            <button type="button" class="btn btn-red do-payment" data-id="{{ $project->id }}">Lakukan Pembayaran</button>
                        </div>
                    @elseif($project->status == 'menunggu konfirmasi pembayaran' && $project->user_id == Auth::user()->id)
                        <div class="text-right">
                            <button type="button" class="btn btn-red confirm-payment " data-id="{{ $project->id }}" data-toggle="modal" data-target="#confirmPayment">Konfirmasi Pembayaran</button>
                        </div>
                    @elseif($project->is_worker_done == 0 && $project->winner_id == Auth::user()->id)
                        <div class="text-right">
                            {!! Form::open(['route' => 'profile.project.worker.done','id' =>'worker-done-form']) !!}
                                {!! Form::hidden('id', $project->id) !!}
                            {!! Form::close() !!}
                                <button type="submit" class="btn btn-red worker-done">Nyatakan Selesai</button>
                            <button type="button" class="btn btn-red confirm-payment">Batalkan Proyek</button>
                        </div>
                    @endif
                    <h4 itemprop="headline" style="width: 100%; margin-bottom: 25px; margin-top: 45px;">
                        <a href="{{ route('profile.project.detail', $project->uuid) }}" title="" itemprop="url">{{ $project->title }}</a>
                    </h4>
                    <div class="row" style="margin-bottom: 25px;">
                        <div class="col-md-5">
                            <div class="w100 pull-left">
                                <span class="food-types">Harga :</span>
                                <span>Rp {{ $project->published_budget }}</span>
                            </div>
                            <div class="w100 pull-left">
                                <span class="food-types">Total Penawaran :</span>
                                <span>{{ $project->bids->count() }}</span>
                            </div>
                            <div class="w100 pull-left">
                                <span class="food-types">Lama Pengerjaan :</span>
                                <span>{{ $project->finish_day }} Hari</span>
                            </div>
                            <div class="w100 pull-left">
                                <span class="food-types">Status :</span>
                                <span>{{ $project->status }}</span>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="w100 pull-left">
                                <span class="food-types">Tawaran Yang Disetujui :</span>
                                @if($project->winner)
                                    <a href="{{ route('profile.guest', $project->winner ? $project->winner->uuid : null ) }}">{{ $project->winner ? $project->winner->username : '-' }}</a>
                                @endif
                            </div>
                            <div class="w100 pull-left">
                                <span class="food-types">Harga Yang Disepakati:</span>
                                <span>Rp {{ $project->accept_price }}</span>
                            </div>
                            <div class="w100 pull-left">
                                <span class="food-types">Kadaluarsa Pada :</span>
                                <span>{{ $project->created_at->subDays(-15)->format('d/M/Y') }}</span>
                            </div>
                            <div class="w100 pull-left">
                                <span class="food-types">Keahlian Yang Dibutuhkan : </span>
                                @foreach($project->skills as $skill)
                                    <span>{{ $skill->name.','}}</span>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    {!! $project->description !!}
                </div>
            </div><!-- Review List -->
        @endforeach
    </div>
</div>