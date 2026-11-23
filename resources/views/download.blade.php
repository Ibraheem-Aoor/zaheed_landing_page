@extends('layouts.master')

@section('meta_title', __('general.download_page.title') . ' | ' . get_setting('website_name'))

@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.0/css/boxicons.min.css"
        integrity="sha512-pVCM5+SN2+qwj36KonHToF2p1oIvoU3bsqxphdOIWMYmgr4ZqD3t5DjKvvetKhXGc/ZG5REYTT6ltKfExEei/Q=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('assets/css/products.css') }}?v=0.01" />
    <script>
        // iPadOS 13+ identifies as desktop Safari, so the server can't spot it: detect it by touch support.
        (function () {
            var isIpadOs = navigator.platform === 'MacIntel' && navigator.maxTouchPoints > 1;
            if (isIpadOs) {
                window.location.replace(@json($appStoreLink));
            }
        })();
    </script>
@endpush

@section('content')
    <main id="Main" class="download-page">
        <section class="download-hero">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12 col-lg-7">
                        <div class="download-content">
                            <span class="products-hero-eyebrow">
                                <span class="bx bx-mobile-alt"></span>
                                {{ __('general.download_page.eyebrow') }}
                            </span>
                            <h1>{{ __('general.download_page.title') }}</h1>
                            <p>{{ __('general.download_page.subtitle') }}</p>

                            <div class="download-stores">
                                <a href="{{ $playStoreLink }}" rel="noopener" aria-label="Google Play">
                                    <img src="{{ asset('assets/img/Mobile app store badge (1).svg') }}" alt="Google Play"
                                        width="160" height="52" />
                                </a>
                                <a href="{{ $appStoreLink }}" rel="noopener" aria-label="App Store">
                                    <img src="{{ asset('assets/img/Mobile app store badge.svg') }}" alt="App Store"
                                        width="160" height="52" />
                                </a>
                            </div>

                            <div class="download-qr d-none d-lg-flex" id="download-qr-box">
                                <div class="download-qr-code" id="download-qr"></div>
                                <div>
                                    <h4>{{ __('general.download_page.scan_title') }}</h4>
                                    <p>{{ __('general.download_page.scan_text') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-5">
                        <div class="download-visual">
                            <img class="img-fluid" src="{{ asset('assets/img/image-cover-header-phone.png') }}"
                                alt="{{ get_setting('website_name') }}" />
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/qrcodejs@1.0.0/qrcode.min.js"
        integrity="sha384-3zSEDfvllQohrq0PHL1fOXJuC/jSOO34H46t6UQfobFOmxE5BpjjaIJY5F2/bMnU" crossorigin="anonymous"></script>
    <script>
        (function () {
            var box = document.getElementById('download-qr-box');
            if (typeof QRCode === 'undefined') {
                box.remove();
                return;
            }
            // The QR points back to this page, so scanning it redirects each phone to its own store.
            new QRCode(document.getElementById('download-qr'), {
                text: @json(route('app.download')),
                width: 112,
                height: 112,
                colorDark: '#211E1E',
                colorLight: '#FFFFFF',
                correctLevel: QRCode.CorrectLevel.M
            });
        })();
    </script>
@endpush
