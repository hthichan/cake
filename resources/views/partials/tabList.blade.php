<div class="tab-pane fade show active" >
    <div class="row row-cols-lg-4 row-cols-sm-2 row-cols-1 mb-n50">
        @foreach ($products as $productItem)
            <div class="col mb-50">
                <!-- Product Item Start -->
                <div class="product-item text-center">
                    @if (!is_null($productItem->promotion_id))
                        <div class="product-item__badge">
                            - {{ $productItem->promotion->discount_percentage }} %
                        </div>
                    @endif
                    <div class="product-item__image border w-100">
                        <a href="{{ route('shop.details', $productItem->id) }}"><img width="350"
                                height="350" src="uploads/product/{{ $productItem->image->url }}"
                                alt="Product"></a>
                        <ul class="product-item__meta">
                            <li class="product-item__meta-action">
                                <button class="addToCart shadow-1 labtn-icon-cart"
                                    data-product_id= "{{ $productItem->id }}"
                                    data-url= "{{ route('home.add_to_cart') }}"></button>
                            </li>
                            {{-- <li class="product-item__meta-action">
                                <button class="favorited shadow-1 labtn-icon-wishlist"
                                    data-product_id= "{{ $productItem->id }}"
                                    data-url="{{ route('home.favorited') }}"
                                    @if ($productItem->favorited) style="background-color: #bc8157" @endif></button>
                            </li> --}}
                        </ul>
                    </div>
                    <div class="product-item__content pt-5">
                        <h5 class="product-item__title"><a
                                href="{{ route('shop.details', $productItem->id) }}">{{ $productItem->prodName }}</a>
                        </h5>
                        @if (is_null($productItem->promotion_id))
                            <span class="product-item__price">{{ $productItem->price }} VND</span>
                        @else
                            <span class="product-item__price" style="text-decoration: line-through red; font-size: 16px;">{{ $productItem->price }} VND</span>
                            <span class="product-item__price">{{ $productItem->promotionalPrice }} VND</span>
                        @endif
                    </div>
                </div>
                <!-- Product Item End -->
            </div>
        @endforeach
    </div>
</div>