@extends('master.main')

@section('main')

    <!-- Slider Section Strat -->
    <div class="slider-section slider-active overflow-hidden">
        <div class="swiper">
            <div class="swiper-wrapper">

                <!-- Single Slider Start -->
                <div class="swiper-slide single-slider animation-style-01"
                    style="background-image: url(assets/images/slider/slider-01.jpg);">
                    <div class="container">

                        <!-- Slider Content Start -->
                        <div class="slider-content text-center mx-auto">
                            <img class="slider-content__shape" width="95" height="108"
                                src="assets/images/slider/shape-01.png" alt="Shape">
                            <h1 class="slider-content__title text-white">Mang lại trải nghiệm tốt nhất</h1>
                            <a class="slider-content__btn btn btn-primary btn-hover-black"
                                href="{{ route('shop.index') }}">Đặt hàng ngay</a>
                        </div>
                        <!-- Slider Content Start -->

                    </div>
                </div>
                <!-- Single Slider End -->

                <!-- Single Slider Start -->
                <div class="swiper-slide single-slider animation-style-01"
                    style="background-image: url(assets/images/slider/slider-02.jpg);">
                    <div class="container">

                        <!-- Slider Content Start -->
                        <div class="slider-content text-center custom-ms-01">
                            <img class="slider-content__shape" width="95" height="62"
                                src="assets/images/slider/shape-02.png" alt="Shape">
                            <h1 class="slider-content__title text-white">Hương vị kéo dài mãi mãi</h1>
                            <a class="slider-content__btn btn btn-primary btn-hover-black"
                                href="{{ route('shop.index') }}">Đặt hàng ngay</a>
                        </div>
                        <!-- Slider Content Start -->

                    </div>
                </div>
                <!-- Single Slider End -->

            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
    <!-- Slider Section End -->

    <!-- Product Section End -->
    <div class="section-padding-01">

        <div class="container">
            <!-- Section Title Strat -->
            <div class="section-title text-center max-width-720 mx-auto">
                <h2 class="section-title__title">SẢN PHẨM CỦA CHÚNG TÔI</h2>
                <p>Không có khách hàng nào làm dịu đi sự khao khát cháy bỏng. Không cần phải đau ở bất kỳ sợi tóc nào. Họ
                    yêu thích bài tập</p>
            </div>
            <!-- Section Title End -->

            <!-- Product Tab Menu Strat -->
            <div class="product-tab-menu pb-8">
                <ul class="nav justify-content-center">
                    <li><button class="btn-tab_list active" data-bs-toggle="tab" data-bs-target="#tab1" data-category_id="" data-url="{{ route('home.tabList') }}">Tất cả</button></li>
                    @php
                        $tab = 2;
                    @endphp
                    @foreach ($globalVariableCategory as $cat)
                        <li><button class="btn-tab_list" data-bs-toggle="tab" data-category_id="{{ $cat->id }}" data-url="{{ route('home.tabList') }}"
                                data-bs-target="#tab{{ $tab++ }}">{{ $cat->name }}</button></li>
                    @endforeach
                </ul>
            </div>
            <!-- Product Tab Menu End -->

            <div  class="tab-content" >
                <div class="tab-pane fade show active" >
                    <div class="row row-cols-lg-4 row-cols-sm-2 row-cols-1 mb-n50">
                        @foreach ($itemsList as $productItem)
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
                <div style="center;display: block;text-align: center; margin-top: 32px;">
                    <a href="{{ route('shop.index') }}" style="padding: 12px 40px; background-color: #bc8157;">Tất cả</a>
                </div>
            </div>

        </div>

    </div>
    <!-- Product Section End -->

    <!-- Banner Section Strat -->
    {{-- <div class="banner-section">
        <div class="row row-cols-1 row-cols-md-2 g-0">
            @foreach ($globalVariableCategory as $cat)
                <div class="col">
                    <!-- Banner Item Strat -->
                    <a href="{{ route('shop.product', $cat->id) }}" class="banner-item"
                        style="background-image: url(uploads/category/{{ $cat->image }});">
                        <div class="banner-item__content">
                            <h3 class="banner-item__title text-white">{{ $cat->name }}</h3>
                            <span class="banner-item__btn text-white">Mua ngay</span>
                        </div>
                    </a>
                    <!-- Banner Item End -->
                </div>
            @endforeach
        </div>
    </div> --}}
    <!-- Banner Section End -->

    <!-- Product Section Strat -->
    <div class="section-padding-01">
        <div class="container">

            <!-- Section Title Strat -->
            <div class="section-title text-center max-width-720 mx-auto">
                <h2 class="section-title__title">CHO MỘT NGÀY NGỌT NGÀO</h2>
                <p>Không có khách hàng nào làm dịu đi sự khao khát cháy bỏng. Không cần phải đau ở bất kỳ sợi tóc nào. Họ
                    yêu thích bài tập</p>
            </div>
            <!-- Section Title End -->
        </div>
    </div>
    <!-- Product Section End -->

    <!-- Call to Action Section Strat -->
    <div class="call-to-action-02" style="background-image: url(assets/images/call-to-action-bg-02.jpg);">

        <!-- Call to Action Section Strat -->
        <div class="call-to-action-02-wrapper section-padding-01">
            <div class="container">
                <!-- Call to Action Section Strat -->
                <div class="call-to-action-02-content text-center">
                    <h4 class="call-to-action-02-content__sub-title text-primary">Bánh mì tươi</h4>
                    <h2 class="call-to-action-02-content__title text-white mt-1">Những chiếc bánh tuyệt vời nhất</h2>
                    <p class="mt-6 text-white">Hãy để anh ta chạy trốn khỏi hai ngôi nhà theo một cách nào đó. Có người
                        sinh hai người đàn ông, trong chốc lát sợi tóc mềm đi vì đau đớn</p>
                    <a class="btn btn-outline-white btn-hover-primary" href="{{ route('shop.index') }}">Mua ngay</a>
                </div>
                <!-- Call to Action Section End -->
            </div>
        </div>
        <!-- Call to Action Section End -->

        <!-- Call to Action Meta Strat -->
        <div class="call-to-action-02-meta">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <!-- Call to Action Meta Strat -->
                        <div class="call-to-action-02-meta-item text-center">
                            <a href="shop.html">
                                <div class="call-to-action-02-meta-item__icon text-primary">
                                    <i class="dlicon tech_mobile"></i>
                                </div>
                                <div class="call-to-action-02-meta-item__text text-white">Liên hệ chúng tôi</div>
                            </a>
                        </div>
                        <!-- Call to Action Meta End -->
                    </div>
                    <div class="col-md-4">
                        <!-- Call to Action Meta Strat -->
                        <div class="call-to-action-02-meta-item text-center">
                            <a href="shop.html">
                                <div class="call-to-action-02-meta-item__icon text-primary">
                                    <i class="dlicon shopping_bag-09"></i>
                                </div>
                                <div class="call-to-action-02-meta-item__text text-white">Mua sắm trực tuyến</div>
                            </a>
                        </div>
                        <!-- Call to Action Meta End -->
                    </div>
                    <div class="col-md-4">
                        <!-- Call to Action Meta Strat -->
                        <div class="call-to-action-02-meta-item text-center">
                            <a href="shop.html">
                                <div class="call-to-action-02-meta-item__icon text-primary">
                                    <i class="lastudioicon lastudioicon-pin-3-2"></i>
                                </div>
                                <div class="call-to-action-02-meta-item__text text-white">Vị trí cửa hàng</div>
                            </a>
                        </div>
                        <!-- Call to Action Meta End -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Call to Action Meta End -->

    </div>
    <!-- Call to Action Section End -->

    <!-- Instagram Section Strat -->
    <div class="instagram-section section-padding-01">
        <div class="container">
            <div class="row gy-6 align-items-center">
                <div class="col-md-4">
                    <!-- Instagram Title Strat -->
                    <div class="instagram-title">
                        <h2 class="instagram-title__title">INSTAGRAM</h2>
                        <p class="instagram-title__sub-title text-global-color-01">@BakerFreshCakeshop </p>
                    </div>
                    <!-- Instagram Title End -->
                </div>
                <div class="col-md-8">

                    <!-- Instagram Images Strat -->
                    <div class="instagram-active">
                        <div class="swiper">
                            <div class="swiper-wrapper">

                                <!-- Instagram Item Strat -->
                                <div class="swiper-slide instagram-item">
                                    <a href="https://www.instagram.com/">
                                        <div class="instagram-item__image">
                                            <img src="assets/images/instagram/instagram-1.jpg" alt="Instagram">
                                        </div>
                                        <div class="instagram-item__icon">
                                            <i class="lastudioicon lastudioicon-b-instagram"></i>
                                        </div>
                                    </a>
                                </div>
                                <!-- Instagram Item End -->

                                <!-- Instagram Item Strat -->
                                <div class="swiper-slide instagram-item">
                                    <a href="https://www.instagram.com/">
                                        <div class="instagram-item__image">
                                            <img src="assets/images/instagram/instagram-2.jpg" alt="Instagram">
                                        </div>
                                        <div class="instagram-item__icon">
                                            <i class="lastudioicon lastudioicon-b-instagram"></i>
                                        </div>
                                    </a>
                                </div>
                                <!-- Instagram Item End -->

                                <!-- Instagram Item Strat -->
                                <div class="swiper-slide instagram-item">
                                    <a href="https://www.instagram.com/">
                                        <div class="instagram-item__image">
                                            <img src="assets/images/instagram/instagram-3.jpg" alt="Instagram">
                                        </div>
                                        <div class="instagram-item__icon">
                                            <i class="lastudioicon lastudioicon-b-instagram"></i>
                                        </div>
                                    </a>
                                </div>
                                <!-- Instagram Item End -->

                                <!-- Instagram Item Strat -->
                                <div class="swiper-slide instagram-item">
                                    <a href="https://www.instagram.com/">
                                        <div class="instagram-item__image">
                                            <img src="assets/images/instagram/instagram-4.jpg" alt="Instagram">
                                        </div>
                                        <div class="instagram-item__icon">
                                            <i class="lastudioicon lastudioicon-b-instagram"></i>
                                        </div>
                                    </a>
                                </div>
                                <!-- Instagram Item End -->

                                <!-- Instagram Item Strat -->
                                <div class="swiper-slide instagram-item">
                                    <a href="https://www.instagram.com/">
                                        <div class="instagram-item__image">
                                            <img src="assets/images/instagram/instagram-5.jpg" alt="Instagram">
                                        </div>
                                        <div class="instagram-item__icon">
                                            <i class="lastudioicon lastudioicon-b-instagram"></i>
                                        </div>
                                    </a>
                                </div>
                                <!-- Instagram Item End -->

                                <!-- Instagram Item Strat -->
                                <div class="swiper-slide instagram-item">
                                    <a href="https://www.instagram.com/">
                                        <div class="instagram-item__image">
                                            <img src="assets/images/instagram/instagram-6.jpg" alt="Instagram">
                                        </div>
                                        <div class="instagram-item__icon">
                                            <i class="lastudioicon lastudioicon-b-instagram"></i>
                                        </div>
                                    </a>
                                </div>
                                <!-- Instagram Item End -->

                                <!-- Instagram Item Strat -->
                                <div class="swiper-slide instagram-item">
                                    <a href="https://www.instagram.com/">
                                        <div class="instagram-item__image">
                                            <img src="assets/images/instagram/instagram-7.jpg" alt="Instagram">
                                        </div>
                                        <div class="instagram-item__icon">
                                            <i class="lastudioicon lastudioicon-b-instagram"></i>
                                        </div>
                                    </a>
                                </div>
                                <!-- Instagram Item End -->

                                <!-- Instagram Item Strat -->
                                <div class="swiper-slide instagram-item">
                                    <a href="https://www.instagram.com/">
                                        <div class="instagram-item__image">
                                            <img src="assets/images/instagram/instagram-8.jpg" alt="Instagram">
                                        </div>
                                        <div class="instagram-item__icon">
                                            <i class="lastudioicon lastudioicon-b-instagram"></i>
                                        </div>
                                    </a>
                                </div>
                                <!-- Instagram Item End -->

                            </div>
                        </div>
                    </div>
                    <!-- Instagram Images End -->

                </div>
            </div>
        </div>
    </div>
    <!-- Instagram Section End -->

    <!-- Newsletter Section Strat -->
    <div class="newsletter-section" style="background-image: url(assets/images/newsletter-bg.jpg);">
        <div class="container">

            <!-- Newsletter Section Strat -->
            <div class="newsletter text-center">
                <h2 class="newsletter__title text-white">GIỮ LIÊN LẠC & NHẬN GIẢM GIÁ 10%</h2>

                <div class="newsletter__form">
                    <form action="#">
                        <input class="newsletter__field" type="text" placeholder="Địa chỉ email của bạn">
                        <button class="newsletter__btn">Đặt mua</button>
                    </form>
                </div>
            </div>
            <!-- Newsletter Section End -->

        </div>
    </div>
    <!-- Newsletter Section End -->

@stop()
