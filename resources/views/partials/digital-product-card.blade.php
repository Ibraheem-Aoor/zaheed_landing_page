{{-- @var \App\Support\ProductCard $product --}}
<a class="box-product-card" href="{{ $product->url }}"
    @if ($product->isAffiliate()) target="_blank" rel="nofollow sponsored noopener" @endif
    aria-label="{{ $product->name }}">
    @if ($product->image)
        <img class="image-product img-fluid" src="{{ $product->image }}" alt="{{ $product->name }}" loading="lazy" />
    @else
        <div class="digital-product-placeholder">
            <span class="bx bx-gift"></span>
        </div>
    @endif

    @if ($product->isAffiliate())
        <span class="product-source-chip">
            <span class="bx bx-link-external"></span>
            {{ $product->platform ?: __('general.products_page.partner_offer') }}
        </span>
    @endif

    <div class="content-product">
        <div class="product-title" title="{{ $product->name }}">{{ $product->name }}</div>
        <p class="digital-product-desc">{{ $product->description }}</p>

        <div class="price-product">
            @if ($product->hasDiscount())
                <div class="price-meta">
                    <span class="price-old">{{ \App\Support\ProductCard::formatPrice($product->originalPrice) }} {{ $product->currency }}</span>
                    <span class="price-save">
                        <span class="bx bx-purchase-tag"></span>
                        {{ __('general.sec_product.save') }} {{ \App\Support\ProductCard::formatPrice($product->savings()) }} {{ $product->currency }}
                    </span>
                </div>
            @endif
            <div class="price-now">{{ \App\Support\ProductCard::formatPrice($product->finalPrice()) }} {{ $product->currency }}</div>
        </div>
    </div>
</a>
