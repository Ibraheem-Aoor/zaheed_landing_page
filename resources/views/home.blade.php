@extends('layouts.master')
@section('content')
    <!-- --- Start Main -->
    <main id="Main">
        <!-- -- Start Sec-Cover -->
        <section class="sec-cover" data-aos="fade-up" data-aos-duration="1500" id="sec-cover">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-sm-12 col-md-12 col-lg-7">
                        <div class="content-cover">
                            {!! get_setting('about_us_description', null, App::getLocale()) !!}
                            <div class="flex-but-download-sotre">
                                <img src="{{ asset('assets/img/Mobile app store badge (1).svg') }}" alt=""
                                    onclick='window.location.href="{{ get_setting('play_store_link') }}"' />
                                <img src="{{ asset('assets/img/Mobile app store badge.svg') }}" alt=""
                                    onclick='window.location.href="{{ get_setting('app_store_link') }}"' />
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-5">
                        <div class="image-cover-header">
                            <img class="man-cover" src="{{ asset('assets/img/cover.svg') }}" alt="" />

                            <div class="image-vactor-pos">
                                <img class="vactor-one" src="{{ asset('assets/img/Star 1.png') }}" alt="" />
                                <img class="vactor-tow" src="{{ asset('assets/img/Star 1.png') }}" alt="" />
                                <img class="vactor-three" src="{{ asset('assets/img/Star 1.png') }}" alt="" />
                                <img class="vactor-four" src="{{ asset('assets/img/Star 1.png') }}" alt="" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- --- End Sec-Cover -->

        <!-- --- Start Sec-Client -->
        {{-- <section class="sec-client" id="sec-client" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="1000">
            <div class="container">
                <div class="flex-client-row">
                    <div class="card-client-row">
                        <img src="{{ asset('assets/img/1280px-Zara_Logo 1.png') }}" alt="" />
                    </div>
                    <div class="card-client-row">
                        <img src="{{ asset('assets/img/Vector (1).svg') }}" alt="" />
                    </div>
                    <div class="card-client-row">
                        <img src="{{ asset('assets/img/champion-logo 1.svg') }}" alt="" />
                    </div>
                    <div class="card-client-row">
                        <img src="{{ asset('assets/img/Umbro_logo_(current) 1.png') }}" alt="" />
                    </div>
                    <div class="card-client-row">
                        <img src="{{ asset('assets/img/DeFacto_logo 1.png') }}" alt="" />
                    </div>
                    <div class="card-client-row">
                        <img src="{{ asset('assets/img/1280px-Zara_Logo 1.png') }}" alt="" />
                    </div>
                    <div class="card-client-row">
                        <img src="{{ asset('assets/img/1280px-Zara_Logo 1.png') }}" alt="" />
                    </div>
                </div>
            </div>
        </section> --}}
        <!-- --- End Sec_Client -->

        <!-- --- Start Sec-App-Works -->
        <div class="title-tst-center-work-step" data-aos="zoom-in" data-aos-duration="1500" id="faqs">
            <div class="container">
                <h4>{{ __('general.sec_app_works.title') }}</h4>
            </div>
        </div>
        <section class="sec-app-work" data-aos="fade-up" data-aos-duration="1500">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-4 customeRowStep">
                        <div class="image-work-step">
                            <img src="{{ asset('assets/img/body.png') }}" class="body-image" alt="" />
                            <div class="image-change-step-all">
                                @foreach ($faqs as $faq)
                                    <img id="ImageStepOne" src="{{ uploaded_asset($faq->image) }}"
                                        class="imageAll" alt="{{ __('general.sec_app_works.step_1.title') }}" />
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-8 customeRowStep2">
                        @foreach ($faqs as $faq)
                            @switch($loop->index)
                                @case(0)
                                    @php
                                        $box_id = 'BoxOneStep';
                                    @endphp
                                @break

                                @case(1)
                                    @php
                                        $box_id = 'BoxTowStep';
                                    @endphp
                                @break

                                @case(2)
                                    @php
                                        $box_id = 'BoxThreeStep';
                                    @endphp
                                @break

                                @case(3)
                                    @php
                                        $box_id = 'BoxThreeStep';
                                    @endphp
                                @break

                                @default
                            @endswitch
                            <div id="{{ $box_id }}"
                                class="box-step-work @if ($loop->index == 0) activeBoxWork @endif"
                                data-aos="zoom-in" data-aos-duration="1500">
                                <article class="art-num">
                                    <h2>{{ $loop->index + 1 }}</h2>
                                </article>
                                <article class="content-work">
                                    <h4>{{ $faq->question }}</h4>
                                    <p>
                                        {{ $faq->answer }}
                                    </p>
                                </article>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </section>
        <!-- --- End  Sec-App-Works-->

        <!-- --- Start advantages? -->
        <section class="advantages" id="advantages" data-aos="zoom-in" data-aos-duration="1000">
            <div class="container-fluid">
                <h3>{{ __('general.advantages.title') }}</h3>
                <div class="row mt-5">
                    <div class="col-sm-12 col-md-6 col-lg-3 customeAd">
                        <div class="box-advantages">
                            <div class="box-bg-adv">
                                <img src="{{ asset('assets/img/ad1.svg') }}"
                                    alt="{{ __('general.advantages.advantage_1.title') }}" />
                            </div>
                            <h6>{{ __('general.advantages.advantage_1.description') }}</h6>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-3 customeAd">
                        <div class="box-advantages">
                            <div class="box-bg-adv">
                                <img src="{{ asset('assets/img/noun-pin-1015736 1.svg') }}"
                                    alt="{{ __('general.advantages.advantage_2.title') }}" />
                            </div>
                            <h6>{{ __('general.advantages.advantage_2.description') }}</h6>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-3 customeAd">
                        <div class="box-advantages">
                            <div class="box-bg-adv">
                                <img src="{{ asset('assets/img/search-svgrepo-com (1) 1.svg') }}"
                                    alt="{{ __('general.advantages.advantage_3.title') }}" />
                            </div>
                            <h6>{{ __('general.advantages.advantage_3.description') }}</h6>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-3 customeAd">
                        <div class="box-advantages">
                            <div class="box-bg-adv">
                                <img src="{{ asset('assets/img/price-tag-svgrepo-com 2.svg') }}"
                                    alt="{{ __('general.advantages.advantage_4.title') }}" />
                            </div>
                            <h6>{{ __('general.advantages.advantage_4.description') }}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- --- End advantages? -->



        @if (isset($landing_page_sliders) && !$landing_page_sliders->isEmpty())
            <!-- --- Start Sec Silder 3D  -->
            <section class="bg-sildeRed" data-aos="zoom-in-up" data-aos-duration="1000">
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        @foreach ($landing_page_sliders as $slider)
                            <div class="swiper-slide">
                                <img src="{{ uploaded_asset($slider->image) }}" />
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-button-next">
                        <span class="bx bx-chevron-right"></span>
                    </div>
                    <div class="swiper-button-prev">
                        <span class="bx bx-chevron-left"></span>
                    </div>
                </div>
            </section>
            <!-- ---- End Sec Silder 3D  -->
        @endif


        <!-- --- Start Product Section -->
        <section class="sec-product" id="sec-product">
            <div class="container-fluid">
                <div class="flex-title-product">
                    <h4>{{ __('general.sec_product.title') }}</h4>
                    <article class="info-right-product">
                        {{-- <a href="">{{ __('general.sec_product.view_all') }}</a> --}}
                        <div class="arrow-action-product">
                            <span id="prevs" onclick="prevSilder();" class="bx bx bx-chevron-left"></span>
                            <span id="nexts" onclick="nextSilder();" class="bx bx bx-chevron-right"></span>
                        </div>
                    </article>
                </div>
                <div class="row-flex-product">
                    <div class="card-product activeCardProdut">
                        <div class="row mt-5">
                            @foreach ($top_product_stokcs_1 as $product_stock)
                                <div class="col-sm-12 col-md-6 col-lg-3">
                                    <div class="box-product-card">
                                        <img class="image-product"
                                            src="{{ uploaded_asset($product_stock->product?->thumbnail_img) }}"
                                            alt="" />
                                        <div class="content-product">
                                            <h5>{{ $product_stock->product?->getTranslation('name') }}</h5>
                                            <div class="flex-inof-detalis-product">
                                                <img src="{{ asset('assets/img/FrameStore.svg') }}" alt="" />
                                                <span>{{ $product_stock->product?->shop?->getTranslation('name') }}</span>
                                            </div>
                                            <div class="flex-inof-detalis-product">
                                                <img src="{{ asset('assets/img/system-uicons_location (1).svg') }}"
                                                    alt="" />
                                                <span>
                                                    {{ $product_stock->product?->shop?->getAddress() }}
                                                </span>
                                            </div>
                                            <div class="price-product">
                                                <h6>{{ $product_stock->price }} {{ getSystemCurrency() }}</h6>
                                                <h5>{{ getStockDiscount($product_stock->price, $product_stock->discount, $product_stock->discount_type, true) }}
                                                    {{ getSystemCurrency() }}
                                                </h5>
                                            </div>
                                            <div class="pos-cat-product">
                                                <span class="bx bx-minus"></span>
                                                <span>{{ $product_stock->discount }}</span>
                                                <img src="{{ asset('assets/img/Frame 20636.svg') }}" alt="" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="card-product">
                        <div class="row mt-5">
                            @foreach ($top_product_stokcs_2 as $product_stock)
                                <div class="col-sm-12 col-md-6 col-lg-3">
                                    <div class="box-product-card">
                                        <img class="image-product"
                                            src="{{ uploaded_asset($product_stock->product?->thumbnail_img) }}"
                                            alt="" />
                                        <div class="content-product">
                                            <h5>{{ $product_stock->product?->getTranslation('name') }}</h5>
                                            <div class="flex-inof-detalis-product">
                                                <img src="{{ asset('assets/img/FrameStore.svg') }}" alt="" />
                                                <span>{{ $product_stock->product?->shop?->getTranslation('name') }}</span>
                                            </div>
                                            <div class="flex-inof-detalis-product">
                                                <img src="{{ asset('assets/img/system-uicons_location (1).svg') }}"
                                                    alt="" />
                                                <span>
                                                    {{ $product_stock->product?->shop?->getAddress() }}
                                                </span>
                                            </div>
                                            <div class="price-product">
                                                <h6>{{ $product_stock->price }} {{ getSystemCurrency() }}</h6>
                                                <h5>{{ getStockDiscount($product_stock->price, $product_stock->discount, $product_stock->discount_type, true) }}
                                                    {{ getSystemCurrency() }}
                                                </h5>
                                            </div>
                                            <div class="pos-cat-product">
                                                <span class="bx bx-minus"></span>
                                                <span>{{ $product_stock->discount }}</span>
                                                <img src="{{ asset('assets/img/Frame 20636.svg') }}" alt="" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- --- End Product Section -->

        <!-- --- Start Sec-Store -->
        {{-- <section class="Sec_Store">
            <div class="container-fluid">
                <div class="flex-title-store-viewAll">
                    <h4>{{ __('general.sec_store.title') }}</h4>
                    <a href="">{{ __('general.view_all') }} </a>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-6 customeColumeTopStore">
                        <div class="row">
                            @foreach ($top_shops as $shop)
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="box-store">
                                        <div class="flex-detalis-box-store">
                                            <article class="art-logo">
                                                <img src="{{ uploaded_asset($shop->logo) }}" alt="" />
                                            </article>
                                            <article class="content-store">
                                                <h4>{{ $shop->getTranslation('name') }}</h4>
                                                <h6>{{ $shop->getCategroiesNamesString() }}</h6>
                                                <div class="info-detalis-store">
                                                    <img src="{{ asset('assets/img/system-uicons_location.svg') }}" />
                                                    <span>{{ $shop->getAddress() }}</span>
                                                </div>
                                            </article>
                                        </div>

                                        <div class="pos-tag-top">Top</div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-6 customeColumeGoodStore">
                        <div class="row">
                            @foreach ($latest_shops as $shop)
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="box-store">
                                        <div class="flex-detalis-box-store">
                                            <article class="art-logo">
                                                <img src="{{ uploaded_asset($shop->logo) }}" alt="" />
                                            </article>
                                            <article class="content-store">
                                                <h4>{{ $shop->getTranslation('name') }}</h4>
                                                <h6>{{ $shop->getCategroiesNamesString() }}</h6>
                                                <div class="info-detalis-store">
                                                    <img src="{{ asset('assets/img/system-uicons_location.svg') }}" />
                                                    <span>{{ $shop->getAddress() }}</span>
                                                </div>
                                            </article>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
        <!-- --- End Sec_Store -->


        <!-- --- Startr Sec_Get_App_Download -->
        <section class="sec-get-app-donwload" id="app">
            <div class="container-fluid">
                <div class="row customeRowDonwload">
                    <div class="col-sm-12 col-md-12 col-lg-6 customeOrder2">
                        <div class="image-donwload-app">
                            <div class="image-download-body">
                                <img class="imageBody" src="{{ asset('assets/img/body.png') }}" alt="" />
                                <div class="image-pos-store">
                                    <img class="img-fluid" src="{{ asset('assets/img/search Products.png') }}"
                                        alt="" />
                                </div>
                            </div>
                            <div class="image-download-body2">
                                <img class="imageBody" src="{{ asset('assets/img/body.png') }}" alt="" />
                                <div class="image-pos-store2">
                                    <img class="img-fluid" src="{{ asset('assets/img/image 198.png') }}"
                                        alt="" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-6 customeOrder1">
                        <div class="content-download-image">
                            <h3>{{ __('general.sec_get_app_download.title') }}</h3>
                            <p>{{ __('general.sec_get_app_download.description') }}</p>
                            <div class="flex-but-download-sotre">
                                <img src="{{ asset('assets/img/Mobile app store badge (1).svg') }}" alt=""
                                    onclick='window.location.href="{{ get_setting('play_store_link') }}"' />
                                <img src="{{ asset('assets/img/Mobile app store badge.svg') }}" alt=""
                                    onclick='window.location.href="{{ get_setting('app_store_link') }}"' />
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- --- End Sec_Get_App_Download -->

        <!-- ---- Start Sec_Massage -->
        <div class="title-massage">
            <h4>{{ __('general.sec_massage.title') }}</h4>
        </div>
        <section class="Sec_Massage">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-6">
                        <div class="content-massage">
                            <h4>{{ __('general.sec_massage.content') }}</h4>
                            <a href="{{ route('partner.index') }}">{{ __('general.sec_massage.become_partner') }}</a>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-6">
                        <div class="image-massage">
                            <img class="imageChatOne" src="{{ asset('assets/img/chat-round-line-svgrepo-com 2.svg') }}"
                                alt="" />
                            <img class="imageChatTow" src="{{ asset('assets/img/chat2.svg') }}" alt="" />
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ------ End Sec_Massage -->



        <div id="progress">
            <span id="progress-value">
                <span class="bx bxs-chevron-up"></span>
            </span>
        </div>
    </main>
    <!-- ---- End Main -->
@endsection

@push('js')
    <script src="{{ asset('assets/js/silder-en.js') }}"></script>

    <script>
        let calcScrollValue = () => {
            let scrollProgress = document.getElementById("progress");
            let progressValue = document.getElementById("progress-value");
            let pos = document.documentElement.scrollTop;
            let calcHeight =
                document.documentElement.scrollHeight -
                document.documentElement.clientHeight;
            let scrollValue = Math.round((pos * 100) / calcHeight);
            if (pos > 100) {
                scrollProgress.style.display = "grid";
            } else {
                scrollProgress.style.display = "none";
            }
            scrollProgress.addEventListener("click", () => {
                document.documentElement.scrollTop = 0;
            });
            scrollProgress.style.background = `conic-gradient(#F00 ${scrollValue}%, #d7d7d7 ${scrollValue}%)`;
        };

        window.onscroll = calcScrollValue;
        window.onload = calcScrollValue;
    </script>
@endpush
