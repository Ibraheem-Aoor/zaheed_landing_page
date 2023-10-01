<!-- -- Start Header -->
<header class="headerPage" id="HeaderPage">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ asset('assets/img/Group.svg') }}" alt="" />
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="bx bx-menu-alt-left"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#sec-cover">{{ __('general.header.about') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"
                            href="{{ route('home') }}#advantages">{{ __('general.header.advantages') }}</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link"
                            href="{{ route('home') }}#sec-product">{{ __('general.header.discounts') }}</a>
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}#faqs">{{ __('general.header.faq') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">{{ __('general.header.contacts') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if (Route::currentRouteName() == 'partner.index') active @endif"
                            href="{{ route('partner.index') }}">{{ __('general.header.partner') }}</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <div class="flex-info-header-right">
                        <div class="box-lanaguah">
                            @if (app()->getLocale() == 'en')
                                <a href="{{ route('change_language', 'sa') }}">{{ __('general.header.arabic') }}</a>
                            @else
                                <a href="{{ route('change_language', 'en') }}">{{ __('general.header.english') }}</a>
                            @endif
                        </div>
                        <div class="but-app">
                            @php
                                $app_link = getUserAgent() == 'Chrome' ? get_setting('play_store_link') : get_setting('app_store_link');
                            @endphp
                            <a href="{{ $app_link }}">{{ __('general.header.getApp') }}</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </nav>
</header>
<!-- --- End Header -->
