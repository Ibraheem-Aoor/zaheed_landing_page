<!-- --- Start Footer -->
<footer class="footer">
    <div class="container-fluid">
        <div class="contact-form">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-6">
                    <div class="content-contact-form">
                        <h4>{{ __('general.footer.title') }}</h4>
                        <p>{{ __('general.footer.content') }}</p>
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
                        <img src="{{ asset('assets/img/Mobile app store badge (2).svg') }}" alt="" />
                        <img src="{{ asset('assets/img/Mobile app store badge (3).svg') }}" alt="" />
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-4">
                <div class="foot-content">
                    <h4>{{ __('general.footer.sitemap_title') }}</h4>
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
                    <h4>{{ __('general.footer.sitemap_title') }}</h4>
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
