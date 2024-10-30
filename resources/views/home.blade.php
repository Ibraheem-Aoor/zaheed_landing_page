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
                            <img class="man-cover"
                                src="{{ uploaded_asset(get_setting('landing_page_about_us_image', null, $locale)) }}"
                                alt="" />

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
        <section class="sec-client d-none" id="sec-client" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="1000">
            <div class="container">
                <div class="flex-client-row">
                    @foreach ($brands as $brand_image)
                        <div class="card-client-row">
                            <img src="{{ uploaded_asset($brand_image) }}" alt="" width="80" height="80" />
                        </div>
                    @endforeach

                </div>
            </div>
        </section>
        <!-- --- End Sec_Client -->

        <!-- --- Start Sec-App-Works -->
        <div class="title-tst-center-work-step" data-aos="zoom-in" data-aos-duration="1500" id="faqs">
            <div class="container">
                <h4>{!! get_setting('landing_page_faqs_sec_title', null, $locale) !!}</h4>
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
                                    @switch($loop->index)
                                        @case(0)
                                            @php
                                                $image_class = 'ImageStepOne';
                                            @endphp
                                        @break

                                        @case(1)
                                            @php
                                                $image_class = 'ImageStepTow';
                                            @endphp
                                        @break

                                        @case(2)
                                            @php
                                                $image_class = 'ImageStepThree';
                                            @endphp
                                        @break

                                        @case(3)
                                            @php
                                                $image_class = 'ImageStepFour';
                                            @endphp
                                        @break

                                        @default
                                    @endswitch

                                    <img id="{{ $image_class }}" src="{{ uploaded_asset($faq->image) }}" class="imageAll"
                                        alt="{{ __('general.sec_app_works.step_1.title') }}" />
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
                                    <h4>{{ $faq->getTranslation('question') }}</h4>
                                    <p>
                                        {{ $faq->getTranslation('answer') }}
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
                <h3>{!! get_setting('landing_page_feature_sec_title', null, $locale) !!}</h3>
                <div class="row mt-5">
                    @foreach ($features as $feature)
                        <div class="col-sm-12 col-md-6 col-lg-3 customeAd">
                            <div class="box-advantages">
                                <div class="box-bg-adv">
                                    <img src="{{ uploaded_asset($feature->image) }}"
                                        alt="{{ __('general.advantages.advantage_1.title') }}" />
                                </div>
                                <h6>{{ $feature->getTranslation('name') }}</h6>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </section>
        <!-- --- End advantages? -->



        @if (isset($landing_page_sliders) && !$landing_page_sliders->isEmpty())
            <!-- --- Start Sec Silder 3D  -->
            <section class="bg-sildeRed d-none" data-aos="zoom-in-up" data-aos-duration="1000">
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
        <section class="sec-product d-none" id="sec-product">
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
                                @if ($loop->index == 1)
                                    <div class="col-sm-12 col-md-6 col-lg-3">
                                        <div class="box-product-card">
                                            <div class="bg-soon">
                                                <img src="{{ asset('assets/img/not-found.png') }}" />
                                                <h5 data-text="Soon...">
                                                </h5>
                                            </div>
                                            <div class="content-product">
                                                <h5>MEN'S T-SHIRT Space print</h5>
                                                <div class="flex-inof-detalis-product">
                                                    <img src="{{ asset('assets/img/FrameStore.svg') }}" alt="" />
                                                    <span>_ </span>
                                                </div>
                                                <div class="flex-inof-detalis-product">
                                                    <img src="{{ asset('assets/img/system-uicons_location (1).svg') }}">
                                                    <span>
                                                        _
                                                    </span>
                                                </div>
                                                <div class="price-product">
                                                    <h6>150 SR</h6>
                                                    <h5>100 SR</h5>
                                                </div>
                                                <div class="pos-cat-product">
                                                    <span class="bx bx-minus"></span>
                                                    <span>0</span>
                                                    <img src="{{ asset('assets/img/Frame 20636.svg') }}"
                                                        alt="" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
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
        <section class="Sec_Store d-none">
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
        </section>
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
                                    <img class="img-fluid"
                                        src="{{ uploaded_asset(get_setting('landing_page_download_app_img_1', null, $locale)) }}"
                                        alt="" />
                                </div>
                            </div>
                            <div class="image-download-body2">
                                <img class="imageBody" src="{{ asset('assets/img/body.png') }}" alt="" />
                                <div class="image-pos-store2">
                                    <img class="img-fluid"
                                        src="{{ uploaded_asset(get_setting('landing_page_download_app_img_2', null, $locale)) }}"
                                        alt="" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-6 customeOrder1">
                        <div class="content-download-image">
                            <h3>{!! get_setting('landing_page_download_app_sec_title', null, $locale) !!}</h3>
                            <p>{!! get_setting('landing_page_download_app_sec_description', null, $locale) !!}</p>
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
            <h4> {!! get_setting('landing_page_help_partners_sec_title', null, $locale) !!}</h4>
        </div>
        <section class="Sec_Massage">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-6">
                        <div class="content-massage">
                            <h4> {!! get_setting('landing_page_help_partners_sec_description', null, $locale) !!}</h4>
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
