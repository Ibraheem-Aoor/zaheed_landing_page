@php
    $name = $digitalProduct->getTranslation('name');
    $description = $digitalProduct->getTranslation('description');
    $originalPrice = (float) $digitalProduct->original_price;
    $discountedPrice = (float) $digitalProduct->discounted_price;
    $hasDiscount = $discountedPrice > 0 && $discountedPrice < $originalPrice;
    $savings = $hasDiscount ? number_format($originalPrice - $discountedPrice, 2, '.', '') : null;
@endphp
<div class="box-product-card">
    @if ($digitalProduct->thumbnail_path)
        <img class="image-product img-fluid" src="{{ digital_product_asset($digitalProduct->thumbnail_path) }}"
            alt="{{ $name }}" />
    @else
        <div class="digital-product-placeholder">
            <span class="bx bx-gift"></span>
        </div>
    @endif
    <div class="content-product">
        <div class="product-title" title="{{ $name }}">{{ $name }}</div>
        <p class="digital-product-desc">{{ $description }}</p>

        <div class="price-product">
            @if ($hasDiscount)
                <div class="price-meta">
                    <span class="price-old">{{ $digitalProduct->original_price }} {{ $digitalProduct->currency }}</span>
                    <span class="price-save">
                        <span class="bx bx-purchase-tag"></span>
                        {{ __('general.sec_product.save') }} {{ $savings }} {{ $digitalProduct->currency }}
                    </span>
                </div>
                <div class="price-now">{{ $digitalProduct->discounted_price }} {{ $digitalProduct->currency }}</div>
            @else
                <div class="price-now">{{ $digitalProduct->original_price }} {{ $digitalProduct->currency }}</div>
            @endif
        </div>
    </div>
</div>
