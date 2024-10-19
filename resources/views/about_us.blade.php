@extends('layouts.master')
@section('content')
    <!-- --- Start Main -->
    <main id="Main">
        <!-- --- Start Sec Privacy Policy -->
        <section class="privacy-policy">
            <div class="container">
                <div class="all-head-page">
                    <h4>
                        {{ __('general.header.about') }}
                    </h4>
                    <div class="cricle-bg"></div>
                </div>
                <div class="content-privacy">
                    {!! $content !!}
                </div>
            </div>
        </section>
        <!-- --- End Sec Privacy Policy -->
        <div id="progress">
            <span id="progress-value">
                <span class="bx bxs-chevron-up"></span>
            </span>
        </div>
    </main>
    <!-- ---- End Main -->
@endsection
