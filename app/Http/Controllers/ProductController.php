<?php

namespace App\Http\Controllers;

use App\Services\ProductCatalog;
use App\Support\ProductCard;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductController extends Controller
{
    private const PER_PAGE = 12;

    private const TYPES = ['all', ProductCard::TYPE_OWN, ProductCard::TYPE_AFFILIATE];

    private const SORTS = ['featured', 'savings', 'price_asc', 'price_desc'];

    public function index(Request $request, ProductCatalog $catalog)
    {
        abort_unless(config('features.products_page'), 404);

        $type = in_array($request->query('type'), self::TYPES, true) ? $request->query('type') : 'all';
        $sort = in_array($request->query('sort'), self::SORTS, true) ? $request->query('sort') : 'featured';
        $search = trim((string) $request->query('q', ''));

        $allProducts = $catalog->all();

        $products = $allProducts
            ->when($type !== 'all', fn ($items) => $items->filter(fn (ProductCard $p) => $p->type === $type))
            ->when($search !== '', fn ($items) => $items->filter(
                fn (ProductCard $p) => mb_stripos($p->name . ' ' . $p->description, $search) !== false
            ));

        $products = match ($sort) {
            'savings' => $products->sortByDesc(fn (ProductCard $p) => $p->savings()),
            'price_asc' => $products->sortBy(fn (ProductCard $p) => $p->finalPrice()),
            'price_desc' => $products->sortByDesc(fn (ProductCard $p) => $p->finalPrice()),
            default => $products,
        };
        $products = $products->values();

        $page = LengthAwarePaginator::resolveCurrentPage();
        $paginator = new LengthAwarePaginator(
            $products->forPage($page, self::PER_PAGE)->values(),
            $products->count(),
            self::PER_PAGE,
            $page,
            ['path' => $request->url(), 'query' => $request->query()]
        );

        return view('products.index', [
            'products' => $paginator,
            'type' => $type,
            'sort' => $sort,
            'search' => $search,
            'counts' => [
                'all' => $allProducts->count(),
                ProductCard::TYPE_OWN => $allProducts->where('type', ProductCard::TYPE_OWN)->count(),
                ProductCard::TYPE_AFFILIATE => $allProducts->where('type', ProductCard::TYPE_AFFILIATE)->count(),
            ],
        ]);
    }
}
