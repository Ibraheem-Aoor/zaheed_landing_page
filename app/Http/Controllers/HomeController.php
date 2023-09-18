<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\LandingPageContact;
use App\Models\Page;
use App\Models\Product;
use App\Models\ProductStock;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Throwable;

class HomeController extends Controller
{
    public function index()
    {
        $data['locale'] = app()->getLocale();
        $data['faqs'] = DB::table('common_question_translations')->where('lang', $data['locale'])->get();
        $data['top_product_stokcs'] = $this->getTopProducts();
        $data['top_product_stokcs_1'] = $data['top_product_stokcs']->take(8); //from 0 => 7
        $data['top_product_stokcs_2'] = $data['top_product_stokcs']->slice(8); // from 8 => end
        $data['top_shops'] = $this->getTopShops();
        $data['latest_shops'] = $this->getLatestShops();
        $data['landing_page_sliders'] = DB::table('landing_page_sliders')->get();
        return view('home', $data);
    }



    /**
     * Get Top Products
     */
    public function getTopProducts()
    {
        return Cache::remember('products', 600, function () {
            return ProductStock::query()->where('is_published', 1)
                ->whereHas('product', function ($product) {
                    $product->select('id')->distinct();
                })->orderByDesc('num_of_sales')->limit(16)->get();
        });
    }


    /**
     * Get Top Shops
     */
    public function getTopShops()
    {
        return Cache::remember('top_shops', 600, function () {
            $product_stocks = $this->getTopProducts();
            $shops = [];
            for ($i = 0; $i < 4; $i++) {
                array_push($shops, $product_stocks[$i]->product->shop);
            }
            return $shops;
        });
    }

    /**
     * get Latest Created Shops
     */
    public function getLatestShops()
    {
        return Cache::remember('top_shops', 600, function () {
            return Shop::query()->latest()->limit(4)->get();
        });
    }

    /**
     * Submit footer contact form
     */
    public function submitContactForm(ContactRequest $request)
    {
        try {
            LandingPageContact::query()->create($request->all());
            $response = generateResponse(status: true, reset_form: true, redirect: route('home'), message: __('general.response_messages.contact_success'));
        } catch (Throwable $e) {
            $response = generateResponse(status: false);
        }
        return response()->json($response);
    }

    /**
     * Privacy Policy page
     */
    public function showPrivacyPolicy()
    {
        $data['page'] = Page::where('slug', 'privacy-policy')->first();
        return view('privacy_policy' , $data);
    }
}
