<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Jobs\SendEmailJob;
use App\Models\CommonQuestion;
use App\Models\Feature;
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
    public function index(Request $request)
    {
        $data['user_agent'] = getUserAgent();
        $data['locale'] = app()->getLocale();
        $data['faqs'] = CommonQuestion::query()->limit(4)->get();
        $data['features'] = Feature::query()->get();
        $data['top_product_stokcs'] = $this->getTopProducts();
        $data['top_product_stokcs_1'] = $data['top_product_stokcs']->take(8); //from 0 => 7
        $data['top_product_stokcs_2'] = $data['top_product_stokcs']->slice(8); // from 8 => end
        $data['top_shops'] = $this->getTopShops();
        $data['latest_shops'] = $this->getLatestShops();
        $data['landing_page_sliders'] = DB::table('landing_page_sliders')->get();
        $data['brands'] = DB::table('brands')->where('logo' , '!=' , null)->where('is_published_for_landing_page' , true)->limit(15)->pluck('logo')->toArray();
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
            $contact = LandingPageContact::query()->create($request->all());
            SendEmailJob::dispatch($contact);
            $response = generateResponse(status: true, reset_form: true, redirect: route('home'), message: __('general.response_messages.contact_success'));
        } catch (Throwable $e) {
            dd($e);
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
        return view('privacy_policy', $data);
    }
    /**
     * About Us page
     */
    public function showAboutPage()
    {
        $data['content'] = get_setting('about_us_page' , null  , app()->getLocale());
        return view('about_us', data: $data);
    }

    /**
     * Shows a page by its slug
     *
     * @param string $slug
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showPage($slug)
    {
        $data['page'] = Page::whereSlug($slug)->firstOrFail();
        return view('page', $data);
    }
}

