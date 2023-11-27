<!-- -- Start Header -->
<header class="headerPage" id="HeaderPage">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container flex-nowrap">
            <div class="but-app d-block d-sm-none">
                @php
                    $app_link = getUserAgent() == 'Chrome' ? get_setting('play_store_link') : get_setting('app_store_link');
                @endphp
                <a href="{{ $app_link }}">{{ __('general.header.getApp') }}</a>
            </div>
            <div class="d-flex align-items-center">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img class="mx-1" src="{{ asset('assets/img/Group.svg') }}" alt="" />
                </a>
                <button class="navbar-toggler " id="sidebar-toggle" type="button"
                    aria-label="Toggle navigation">
                    <span class="bx bx-menu-alt-left"></span>
                </button>
            </div>


            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0 ">
                    {{-- <li class="nav-item">
                        <a class="nav-link" aria-current="page"
                            href="@if (Route::currentRouteName() != 'home') {{ route('home') }} @else #sec-cover @endif">{{ __('general.header.about') }}</a>
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link"
                            href="#advantages">{{ __('general.header.advantages') }}</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link"
                            href="#sec-product">{{ __('general.header.discounts') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#faqs">{{ __('general.header.faq') }}</a>
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link @if (Route::currentRouteName() == 'partner.index') activeListNav @endif"
                        href="{{ route('partner.index') }}">{{ __('general.header.partner') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">{{ __('general.header.contacts') }}</a>
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
                    </div>
                </form>
                <div class="but-app d-none d-sm-block">
                    <a href="">Get App</a>
            </div>
            </div>
        </div>
    </nav>
</header>
<!-- --- End Header -->
