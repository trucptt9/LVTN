@foreach ($products as $item)
    <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-4 col-sm-6 pb-4" data-type="{{ $item->category_id }}">
        <a href="{{ route('sale.detail', $item->id) }}" class="{{'pos-product '.$item->id}}" data-bs-toggle="modal" >
            @if ($item->image == null)
                <div class="img" style="background-image: url({{ asset('images/meo.jpg') }})">
                </div>
            @else
                <div class="img" style="background-image: url({{ asset('storage/' . $item->image) }})">
                </div>
            @endif
            <div class="info">
                <div class="title">{{ $item->name }}</div>
                <div class="desc">{{ $item->description }}</div>
                <div class="price">{{ number_format($item->price, 0, ',', '.') . 'đ' }}</div>
            </div>
        </a>
    </div>
@endforeach
