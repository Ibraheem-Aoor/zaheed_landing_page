<!-- --- Start Footer -->
<footer class="footer">
    @php
        $locale = app()->getLocale();
    @endphp
    <div class="container-fluid">
        <div class="contact-form px-3 px-sm-4 py-2 my-5 py-sm-5">
            <div class="row mt-0 pt-2 mt-sm-0 pt-sm-0 ">
                <div class="col-sm-12 col-md-12 col-lg-6">
                    <div class="content-contact-form w-100 w-sm-75">
                        <h4>   {!! get_setting('landing_page_contact_sec_title', null, $locale) !!}</h4>
                        <p> {!! get_setting('landing_page_contact_us_sec_description', null, $locale) !!}</p>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-6">
                    <div class="content-form-footer" id="contact">
                        <form class="custom-form"  action="{{ route('contact.submit') }}" method="POST">
                            @csrf
                            <h2>{{ __('general.footer.help_title') }}</h2>
                            <div class="all-input-fails-footer">
                                <input type="text" placeholder="{{ __('general.footer.name_placeholder') }}"
                                    name="name" />
                            </div>
                            <div class="all-input-fails-footer">
                                <input type="text" placeholder="{{ __('general.footer.email_placeholder') }}"
                                    name="email" />
                            </div>
                            <div class="all-input-fails-footer">
                                <textarea placeholder="{{ __('general.footer.message_placeholder') }}" name="message"></textarea>
                            </div>
                            <div class="but-all-form">
                                <button class="button2"
                                    type="submit">{{ __('general.footer.contact_button') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-4 col-lg-4">
                <div class="logo-footer">
                    <img class="imageFooterLogo" src="{{ asset('assets/img/GrouLogo.svg') }}"
                        alt="{{ __('general.footer.logo_alt') }}" />
                    <div class="but-download-footer">
                        <img src="{{ asset('assets/img/Mobile app store badge (2).svg') }}" alt=""   onclick='window.location.href="{{ get_setting('play_store_link') }}"'/>
                        <img src="{{ asset('assets/img/Mobile app store badge (3).svg') }}" alt=""   onclick='window.location.href="{{ get_setting('app_store_link') }}"'/>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-4">
                <div class="foot-content">
                    {{-- <h4>{{ __('general.footer.sitemap_title') }}</h4> --}}
                    <div class="flex-info-footer-contact">
                        <i class="bx bx-map"></i>
                        <span>{{ __('general.footer.location_icon') }}</span>
                    </div>
                    <div class="flex-info-footer-contact">
                        <i class="bx bx-send"></i>
                        <span>{{ __('general.footer.email_icon') }}</span>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-4">
                <div class="foot-content">
                    {{-- <h4>{{ __('general.footer.sitemap_title') }}</h4> --}}
                    <div class="link-page">
                        <a href="{{ route('home') }}">{{ __('general.footer.home') }}</a>
                        <a href="{{ route('home') }}">{{ __('general.footer.about') }}</a>
                        <a href="{{ route('home') }}#advantages">{{ __('general.footer.service') }}</a>
                        <a href="{{ route('privacy') }}">{{ __('general.footer.privacy_policy') }}</a>
                        <a href="{{ route('home') }}#contact">{{ __('general.footer.contacts') }}</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright">
            <p>
                {!! __('general.footer.copyright') !!}
            </p>
        </div>
    </div>
</footer>
<!-- --- End Footer -->
