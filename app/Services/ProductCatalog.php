<?php

namespace App\Services;

use App\Models\DigitalProduct;
use App\Support\ProductCard;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class ProductCatalog
{
    private const CACHE_TTL = 1800;

    /**
     * Every product shown on the products page: our own first, then affiliate ones.
     *
     * @return Collection<int, ProductCard>
     */
    public function all(): Collection
    {
        return $this->ownProducts()->concat($this->affiliateProducts())->values();
    }

    /**
     * Our own (Zaheed) digital products.
     *
     * Models are cached (not cards) so each request still resolves the
     * translation for the current locale.
     *
     * @return Collection<int, ProductCard>
     */
    public function ownProducts(): Collection
    {
        $products = Cache::remember('products_page.digital_products', self::CACHE_TTL, function () {
            return DigitalProduct::query()
                ->select('id', 'name', 'description', 'original_price', 'discounted_price', 'currency', 'thumbnail_path')
                ->with('digitalProductTranslations')
                ->where('status', 'active')
                ->whereNull('deleted_at')
                ->latest('id')
                ->get();
        });

        return $products->map(fn (DigitalProduct $product) => ProductCard::fromDigitalProduct($product))->values();
    }

    /**
     * Affiliate products from external platforms.
     *
     * TODO: fetch from the affiliate source(s) once defined. Each item only needs
     * to be mapped with ProductCard::fromAffiliate([...]) — see that method for
     * the expected keys (each product carries its own outbound `url`).
     *
     * @return Collection<int, ProductCard>
     */
    public function affiliateProducts(): Collection
    {
        return collect();
    }
}
