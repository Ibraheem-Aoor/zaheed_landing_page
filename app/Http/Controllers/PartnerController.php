<?php

namespace App\Http\Controllers;

use App\Http\Requests\Partner\ApplyPartnerRequest;
use App\Http\Requests\Partner\CheckStepRequest;
use App\Models\PartnerApplication;
use Illuminate\Http\Request;
use Throwable;

class PartnerController extends Controller
{
    public function create()
    {
        return view('partner.create');
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
            $files[$key] = saveImage('uploads/partner_applications/', $file);
        }
        return $files;
    }
}
