<div class="list_container" id="product_list">

    @foreach ($products as $product)
        <div class="card">
            <div class="card_img">
                <img src="{{ asset('images/'.$product->p_image) }}" alt="" />
            </div>
            <div class="card_title">{{ $product->p_name }}</div>
            <div class="card_desc">
                {{ $product->specs }}
            </div>
            <div class="btn_group">
                <i class="bx bx-pencil"></i>
                <i class="bx bx-trash"></i>
            </div>
        </div>
    @endforeach
</div>

<div class="product_pagination">
    {!! $products->links('dashboard.custom_paginate') !!}
</div>
