@extends('layouts.master')
@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.0/css/boxicons.min.css" integrity="sha512-pVCM5+SN2+qwj36KonHToF2p1oIvoU3bsqxphdOIWMYmgr4ZqD3t5DjKvvetKhXGc/ZG5REYTT6ltKfExEei/Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush

@section('content')
    <!-- --- Start Main -->
    <main id="Main">
        <!-- -- Start Sec-Cover -->
        <section class="sec-cover pt-5 pt-sm-0" data-aos="fade-up" data-aos-duration="1500" data-aos-once="true" id="sec-cover">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-sm-12 col-md-12 col-lg-7">
                        <div class="content-cover">
                            {!! get_setting('about_us_description', null, App::getLocale()) !!}
                            <div class="flex-but-download-sotre row">
                                <div class="col-12 col-sm-6 d-flex justify-content-start px-0 ">
                                    <img class="img-fluid me-2" width="140" height="46"
                                        src="{{ asset('assets/img/Mobile app store badge (1).svg') }}" alt=""
                                        onclick='window.location.href="{{ get_setting('play_store_link') }}"' />
                                    <img class="img-fluid" width="140" height="46"
                                        src="{{ asset('assets/img/Mobile app store badge.svg') }}" alt=""
                                        onclick='window.location.href="{{ get_setting('app_store_link') }}"' />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-5">
                        <div class="image-cover-header">
                            <img class="man-cover img-fluid" src="{{ asset('assets/img/image-cover-header-phone.png') }}"
                                alt="" />
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
                    @foreach ($brands as $brand_image)
                        <div class="card-client-row">
                            <img src="{{ uploaded_asset($brand_image) }}" alt="" width="80" height="80" />
                        </div>
                    @endforeach

                </div>
            </div>
        </section> --}}
        <!-- --- End Sec_Client -->

        <!-- --- Start Sec-App-Works -->
        <div class="title-tst-center-work-step" data-aos="zoom-in" data-aos-duration="1500" data-aos-once="true"
            id="faqs">
            <div class="container">
                {{-- <h4>{!! get_setting('landing_page_faqs_sec_title', null, $locale) !!}</h4> --}}
                <div>{{ __('general.sec_app_works.title') }}</div>
            </div>
        </div>
        <section class="sec-app-work py-0 py-sm-4" data-aos="fade-up" data-aos-duration="1500" data-aos-once="true">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-4 customeRowStep">
                        <div class="image-work-step">
                            <img src="{{ asset('assets/img/body.png') }}" class="body-image" alt="" />
                            <div class="image-change-step-all">
                                @foreach ($faqs as $faq)
                                    <img id="ImageStep{{ $faq->id }}" src="{{ uploaded_asset($faq->image) }}"
                                        class="imageAll" @if ($loop->index == 0) style="display: block" @endif
                                        alt="{{ __('general.sec_app_works.step_1.title') }}" />
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-8 customeRowStep2  d-none d-sm-block ">
                        @foreach ($faqs as $faq)
                            <div data-id="{{ $faq->id }}"
                                class="box-step-work @if ($loop->index == 0) activeBoxWork @endif"
                                data-aos="zoom-in" data-aos-duration="1500" data-aos-once="true">
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


                    <div class="col-sm-12 col-md-12 col-lg-8 customeRowStep2 d-flex overflow-auto d-sm-none">
                        @foreach ($faqs as $faq)
                            <div data-id="{{ $faq->id }}"
                                class="d-flex flex-column align-items-start  box-step-work @if ($loop->index == 0) activeBoxWork @endif"
                                data-aos="zoom-in" data-aos-duration="1500" data-aos-once="true">
                                <div class="art-num">
                                    <h2>{{ $loop->index + 1 }}</h2>
                                </div>
                                <div class="question">
                                    <h4>{{ $faq->getTranslation('question') }}</h4>
                                </div>
                                <div class="answer">
                                    {{ $faq->getTranslation('answer') }}
                                </div>
                            </div>
                        @endforeach
                    </div>


                </div>
            </div>
        </section>
        <!-- --- End  Sec-App-Works-->

        <!-- --- Start advantages? -->
        <section class="advantages" id="advantages" data-aos="zoom-in" data-aos-duration="1000" data-aos-once="true">
            <div class="container-fluid">
                <h3>{!! get_setting('landing_page_feature_sec_title', null, $locale) !!}</h3>
                <div class="row mt-5">
                    @foreach ($features as $feature)
                        <div class="col-sm-12 col-md-6 col-lg-3 customeAd">
                            <div class="box-advantages">
                                <div class="box-bg-adv mb-2">
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
            <section class="bg-sildeRed" data-aos="zoom-in-up" data-aos-duration="1000" data-aos-once="true">

                <div class="swiper mySwiper">
                    <img class="iphone-cover" src="{{ asset('assets/img/iphone_frame.png') }}">
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


        <!-- --- Start desktop Product Section -->
        <section class="sec-product d-none d-sm-block" id="sec-product">
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
                <div class="row-flex-product ">
                    <div class="card-product activeCardProdut">
                        <div class="row mt-5">
                            @foreach ($top_product_stokcs_1 as $product_stock)
                                <div class="col-sm-12 col-md-6 col-lg-3">
                                    <div class="box-product-card">
                                        <img class="image-product img-fluid"
                                            src="{{ uploaded_asset($product_stock->product?->thumbnail_img) }}"
                                            alt="" />
                                        <div class="content-product">
                                            <div class="product-title">
                                                {{ $product_stock->product?->getTranslation('name') }}</div>
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
                                            <div class="price-product mt-2 mb-1 mt-sm-4 mb-sm-2">
                                                <div class="discounted-price">
                                                    {{ getStockDiscount($product_stock->price, $product_stock->discount, $product_stock->discount_type, true) }}
                                                    {{ getSystemCurrency() }}
                                                </div>
                                                <div class="original-price">{{ $product_stock->price }}
                                                    {{ getSystemCurrency() }}</div>
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
                                                <div class="product-title">MEN'S T-SHIRT Space print</div>
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
                                        <img class="image-product img-fluid"
                                            src="{{ uploaded_asset($product_stock->product?->thumbnail_img) }}"
                                            alt="" />
                                        <div class="content-product">
                                            <div class="product-title">
                                                {{ $product_stock->product?->getTranslation('name') }}</div>
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
                                                <div class="discounted-price">
                                                    {{ getStockDiscount($product_stock->price, $product_stock->discount, $product_stock->discount_type, true) }}
                                                    {{ getSystemCurrency() }}
                                                </div>
                                                <div class="original-price">{{ $product_stock->price }}
                                                    {{ getSystemCurrency() }}</div>
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
        <!-- --- End desktop Product Section -->





        <!-- --- Start mobile Product Section -->
        <section class="sec-product d-block d-sm-none" id="sec-product">
            <div class="container-fluid">
                <div class="flex-title-product">
                    <h4>{{ __('general.sec_product.title') }}</h4>
                </div>
                <div class="row-flex-product mb ">
                    <div class="card-product activeCardProdut overflow-auto" style="overflow-y: hidden !important;">
                        <div class="row mt-5 flex-nowrap">
                            @foreach ($top_product_stokcs_1 as $product_stock)
                                <div class="col-sm-6 col-md-6 col-lg-3 w-75">
                                    <div class="box-product-card">
                                        <img class="image-product img-fluid"
                                            src="{{ uploaded_asset($product_stock->product?->thumbnail_img) }}"
                                            alt="" />
                                        <div class="content-product">
                                            <div class="product-title">
                                                {{ $product_stock->product?->getTranslation('name') }}</div>
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
                                                <div class="discounted-price">
                                                    {{ getStockDiscount($product_stock->price, $product_stock->discount, $product_stock->discount_type, true) }}
                                                    {{ getSystemCurrency() }}
                                                </div>
                                                <div class="original-price">{{ $product_stock->price }}
                                                    {{ getSystemCurrency() }}</div>
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
                        <div class="row mt-2 flex-nowrap">
                            @foreach ($top_product_stokcs_2 as $product_stock)
                                @if ($loop->index == 1)
                                    <div class="col-sm-6 col-md-6 col-lg-3 w-75">
                                        <div class="box-product-card">
                                            <div class="bg-soon">
                                                <img src="{{ asset('assets/img/not-found.png') }}" />
                                                <h5 data-text="Soon...">
                                                </h5>
                                            </div>
                                            <div class="content-product">
                                                <div class="product-title">MEN'S T-SHIRT Space print</div>
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
                                <div class="col-sm-12 col-md-6 col-lg-3 w-75">
                                    <div class="box-product-card">
                                        <img class="image-product img-fluid"
                                            src="{{ uploaded_asset($product_stock->product?->thumbnail_img) }}"
                                            alt="" />
                                        <div class="content-product">
                                            <div class="product-title">
                                                {{ $product_stock->product?->getTranslation('name') }}</div>
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
                                                <div class="discounted-price">
                                                    {{ getStockDiscount($product_stock->price, $product_stock->discount, $product_stock->discount_type, true) }}
                                                    {{ getSystemCurrency() }}
                                                </div>
                                                <div class="original-price">{{ $product_stock->price }}
                                                    {{ getSystemCurrency() }}</div>
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
        <!-- --- End mobile Product Section -->


        <!-- --- Start Sec-Store -->
        <section class="Sec_Store ">
            <div class="container-fluid">
                <div class="flex-title-store-viewAll">
                    <h4>{{ __('general.sec_store.title') }}</h4>
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
                                            <article class="content-store mx-0 mx-sm-2 ">
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
                                            <article class="content-store mt-2 mt-sm-0 mx-0 mx-sm-2">
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
                <div class="row customeRowDonwload px-sm-5">
                    <div class="col-sm-12 col-md-12 col-lg-6 customeOrder2 d-flex flex-column justify-content-end">
                        <div class="image-donwload-app d-flex h-75">
                            <img class="img-fluid img-download-1"
                                src="{{ uploaded_asset(get_setting('landing_page_download_app_img_1', null, $locale)) }}"
                                alt="" />
                            <img class="img-fluid img-download-2"
                                src="{{ uploaded_asset(get_setting('landing_page_download_app_img_2', null, $locale)) }}"alt="" />
                            {{-- <div class="image-download-body">
                            </div>
                            <div class="image-download-body2">
                            </div> --}}
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-6 customeOrder1 py-4">
                        <div class="content-download-image">
                            <h3>{!! get_setting('landing_page_download_app_sec_title', null, $locale) !!}</h3>
                            <p>{!! get_setting('landing_page_download_app_sec_description', null, $locale) !!}</p>
                            <div class="flex-but-download-sotre">
                                <img src="{{ asset('assets/img/Mobile app store badge (1).svg') }}" class="img-fluid"
                                    alt=""
                                    onclick='window.location.href="{{ get_setting('play_store_link') }}"' />
                                <img src="{{ asset('assets/img/Mobile app store badge.svg') }}" alt=""
                                    onclick='window.location.href="{{ get_setting('app_store_link') }}"'
                                    class="img-fluid" />
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.0/dist/boxicons.min.js" integrity="sha512-y8/3lysXD6CUJkBj4RZM7o9U0t35voPBOSRHLvlUZ2zmU+NLQhezEpe/pMeFxfpRJY7RmlTv67DYhphyiyxBRA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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
