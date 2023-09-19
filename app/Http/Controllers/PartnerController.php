<?php

namespace App\Http\Controllers;

use App\Http\Requests\Partner\ApplyPartnerRequest;
use App\Http\Requests\Partner\CheckStepRequest;
use App\Models\Category;
use App\Models\City;
use App\Models\PartnerApplication;
use Illuminate\Http\Request;
use Throwable;

class PartnerController extends Controller
{
    public function create()
    {
        $data['categories'] =   Category::query()->whereNull('parent_id')->orWhere('parent_id' , 0)->get();
        $data['city'] =   City::query()->find(37444);
        return view('partner.create' , $data);
    }


    /**
     * Simplee Action to check partner form steps
     */
    public function applyAsSeller(ApplyPartnerRequest $reqeust)
    {
        try {
            $files = $this->uploadFiles($reqeust);
            $data = array_merge($reqeust->toArray(), $files);
            PartnerApplication::query()->create($data);
            $response = generateResponse(status: true, redirect: route('home'));
        } catch (Throwable $e) {
            dd($e);
            $response = generateResponse(status: false);
        }
        return response()->json($response);
    }


    /**
     * Upload Files Request.
     */
    protected function uploadFiles($reqeust): array
    {
        foreach ($reqeust->files as $key => $file) {
            $files[$key] = saveImage('partner_applications', $file);
        }
        return $files;
    }
}
