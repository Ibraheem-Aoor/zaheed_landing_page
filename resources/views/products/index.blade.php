@extends('layouts.master')

@section('meta_title', __('general.products_page.title') . ' | ' . get_setting('website_name'))

@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.0/css/boxicons.min.css"
        integrity="sha512-pVCM5+SN2+qwj36KonHToF2p1oIvoU3bsqxphdOIWMYmgr4ZqD3t5DjKvvetKhXGc/ZG5REYTT6ltKfExEei/Q=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('assets/css/products.css') }}?v=0.01" />
@endpush

@section('content')
    @php
        // Builds a products URL that keeps the current filters, overriding the given ones.
        $filterUrl = function (array $overrides) use ($type, $sort, $search) {
            $params = array_merge(['type' => $type, 'sort' => $sort, 'q' => $search], $overrides);
            $params = array_filter($params, fn ($value, $key) => $value !== '' && $value !== null
                && !($key === 'type' && $value === 'all')
                && !($key === 'sort' && $value === 'featured'), ARRAY_FILTER_USE_BOTH);

            return route('products.index', $params);
        };
        $tabs = [
            'all' => __('general.products_page.tabs.all'),
            \App\Support\ProductCard::TYPE_OWN => __('general.products_page.tabs.own'),
            \App\Support\ProductCard::TYPE_AFFILIATE => __('general.products_page.tabs.affiliate'),
        ];
    @endphp

    <main id="Main" class="products-page">
        <!-- --- Start Products Hero -->
        <section class="products-hero">
            <div class="container">
                <span class="products-hero-eyebrow">
                    <span class="bx bxs-offer"></span>
                    {{ __('general.products_page.eyebrow') }}
                </span>
                <h1>{{ __('general.products_page.title') }}</h1>
                <p>{{ __('general.products_page.subtitle') }}</p>
            </div>
        </section>
        <!-- --- End Products Hero -->

        <section class="products-listing">
            <div class="container">
                <!-- --- Toolbar -->
                <div class="products-toolbar">
                    <nav class="products-tabs" aria-label="{{ __('general.products_page.title') }}">
                        @foreach ($tabs as $tabKey => $tabLabel)
                            <a href="{{ $filterUrl(['type' => $tabKey]) }}"
                                class="products-tab @if ($type === $tabKey) active @endif"
                                @if ($type === $tabKey) aria-current="page" @endif>
                                {{ $tabLabel }}
                                <span class="products-tab-count">{{ $counts[$tabKey] }}</span>
                            </a>
                        @endforeach
                    </nav>

                    <form class="products-filters" method="GET" action="{{ route('products.index') }}">
                        @if ($type !== 'all')
                            <input type="hidden" name="type" value="{{ $type }}">
                        @endif
                        <div class="products-search">
                            <span class="bx bx-search"></span>
                            <input type="search" name="q" value="{{ $search }}"
                                placeholder="{{ __('general.products_page.search_placeholder') }}"
                                aria-label="{{ __('general.products_page.search_placeholder') }}">
                        </div>
                        <select class="products-sort" name="sort" onchange="this.form.submit()"
                            aria-label="{{ __('general.products_page.sort_label') }}">
                            @foreach (['featured', 'savings', 'price_asc', 'price_desc'] as $sortKey)
                                <option value="{{ $sortKey }}" @selected($sort === $sortKey)>
                                    {{ __('general.products_page.sort.' . $sortKey) }}
                                </option>
                            @endforeach
                        </select>
                    </form>
                </div>

                <div class="products-results-meta">
                    {{ trans_choice('general.products_page.results', $products->total(), ['count' => $products->total()]) }}
                    @if ($search !== '' || $type !== 'all' || $sort !== 'featured')
                        <a href="{{ route('products.index') }}" class="products-clear">
                            <span class="bx bx-x"></span>{{ __('general.products_page.clear_filters') }}
                        </a>
                    @endif
                </div>

                <!-- --- Grid -->
                @if ($products->isNotEmpty())
                    <div class="row products-grid">
                        @foreach ($products as $product)
                            <div class="col-12 col-sm-6 col-lg-4 col-xl-3">
                                @include('partials.digital-product-card', ['product' => $product])
                            </div>
                        @endforeach
                    </div>

                    @if ($products->hasPages())
                        <div class="products-pagination">
                            {{ $products->onEachSide(1)->links('pagination::bootstrap-5') }}
                        </div>
                    @endif
                @else
                    <div class="products-empty">
                        <span class="bx bx-search-alt"></span>
                        <h3>{{ __('general.products_page.empty_title') }}</h3>
                        <p>{{ __('general.products_page.empty_text') }}</p>
                        @if ($search !== '' || $type !== 'all')
                            <a href="{{ route('products.index') }}" class="products-btn">
                                {{ __('general.products_page.clear_filters') }}
                            </a>
                        @endif
                    </div>
                @endif

                <!-- --- App CTA -->
                <div class="products-cta">
                    <div>
                        <h3>{{ __('general.products_page.cta_title') }}</h3>
                        <p>{{ __('general.products_page.cta_text') }}</p>
                    </div>
                    <a href="{{ route('app.download') }}" class="products-btn products-btn-light">
                        <span class="bx bx-download"></span>
                        {{ __('general.products_page.cta_button') }}
                    </a>
                </div>
            </div>
        </section>

        <div id="progress">
            <span id="progress-value">
                <span class="bx bxs-chevron-up"></span>
            </span>
        </div>
    </main>
@endsection
