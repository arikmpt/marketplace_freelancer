<div class="tab-pane fade" id="bid">
    <div class="tabs-wrp brd-rd5">
        <h4 itemprop="headline">Penawaran Saya</h4>
        @foreach($bids as $bid)
            <div class="review-list" style="margin-bottom: 40px">
                <div class="review-box brd-rd5">
                    <div class="row" style="margin-bottom: 25px;">
                        <div class="col-md-12">
                            <div class="w100 pull-left">
                                <span class="food-types">Project :</span>
                                <a href="{{route('project.detail', $bid->project->uuid)}}">{{ $bid->project->title }}</a>
                            </div>
                            <div class="w100 pull-left">
                                <span class="food-types">Penawaran :</span>
                                <span>Rp {{ $bid->price }}</span>
                            </div>
                            <div class="w100 pull-left">
                                <span class="food-types">Pesan :</span>
                                <span>{{ $bid->description }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- Review List -->
        @endforeach
    </div>
</div>