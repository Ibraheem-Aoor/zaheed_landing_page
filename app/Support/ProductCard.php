<?php

namespace App\Support;

use App\Models\DigitalProduct;

/**
 * A display-ready product card. Both product sources (our own digital products
 * and affiliate products from external platforms) are mapped into this shape
 * so they render with the exact same card component.
 */
final class ProductCard
{
    public const TYPE_OWN = 'zaheed';
    public const TYPE_AFFILIATE = 'affiliate';

    public function __construct(
        public readonly string $type,
        public readonly string $name,
        public readonly ?string $description,
        public readonly ?string $image,
        public readonly float $originalPrice,
        public readonly ?float $discountedPrice,
        public readonly string $currency,
        public readonly string $url,
        public readonly ?string $platform = null,
    ) {
    }

    /**
     * Our own products: clicking them sends the user to the app download page.
     */
    public static function fromDigitalProduct(DigitalProduct $product): self
    {
        return new self(
            type: self::TYPE_OWN,
            name: (string) $product->getTranslation('name'),
            description: $product->getTranslation('description'),
            image: $product->thumbnail_path ? digital_product_asset($product->thumbnail_path) : null,
            originalPrice: (float) $product->original_price,
            discountedPrice: $product->discounted_price !== null ? (float) $product->discounted_price : null,
            currency: (string) $product->currency,
            url: route('app.download'),
        );
    }

    /**
     * Affiliate products: clicking them opens the product on its own platform.
     *
     * Expected keys: name, url, original_price, currency
     * Optional keys: description, image, discounted_price, platform
     */
    public static function fromAffiliate(array $product): self
    {
        return new self(
            type: self::TYPE_AFFILIATE,
            name: (string) $product['name'],
            description: $product['description'] ?? null,
            image: $product['image'] ?? null,
            originalPrice: (float) $product['original_price'],
            discountedPrice: isset($product['discounted_price']) ? (float) $product['discounted_price'] : null,
            currency: (string) $product['currency'],
            url: (string) $product['url'],
            platform: $product['platform'] ?? null,
        );
    }

    public function isAffiliate(): bool
    {
        return $this->type === self::TYPE_AFFILIATE;
    }

    public function hasDiscount(): bool
    {
        return $this->discountedPrice !== null
            && $this->discountedPrice > 0
            && $this->discountedPrice < $this->originalPrice;
    }

    /** The price the customer actually pays. */
    public function finalPrice(): float
    {
        return $this->hasDiscount() ? $this->discountedPrice : $this->originalPrice;
    }

    public function savings(): float
    {
        return $this->hasDiscount() ? $this->originalPrice - $this->discountedPrice : 0.0;
    }

    public static function formatPrice(float $amount): string
    {
        return number_format($amount, 2, '.', '');
    }
}
