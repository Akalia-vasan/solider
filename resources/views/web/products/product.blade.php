@forelse ($data as $item)
    <div class="col-lg-4 col-md-6 col-sm-12 col-12 cardd1  ">
        <div class="card" >
            <div style="height: 217px;background:#f2f2f2;">
                @if($item->resource)
                    <img src="{{asset('resources/'.$item->id.'.'.$item->extension)}}" width="350px" height="217px">
                @else
                    <img src="{{asset('defaut/default.jpg')}}" width="350px" height="217px">
                @endif
            </div>
            <div class="card-body  d-flex flex-column">
                <h4 class="card-title">
                    <div class="product_info">
                        <div class="product_name">
                            <p class="Ofw-300 fs-20" title="{{$item->title}}">{{substr($item->title,0,45)}}</p>
                        </div>

                        <div class="price_block">
                            <p class="fs-11"><span class="fs-20" style="color:#00C247;">${{$item->basic_price}}</p>
                            @if(!is_null($item->discount))
                                <p class="fs-10">{{$item->discount}}% off </p>
                            @else
                                <br><br>
                            @endif
                        </div>
                    </div>
                </h4>
            </div>
        </div>
    </div>

@empty
    <p class="text-center ">
        No data found!
    </p>
@endforelse
