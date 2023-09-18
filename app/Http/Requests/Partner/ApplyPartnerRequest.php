<?php

namespace App\Http\Requests\Partner;

use Illuminate\Foundation\Http\FormRequest;

class ApplyPartnerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return
            [
                // step 1
                'store_name_en' => 'required',
                'store_name_ar' => 'required',
                'category_id' => 'required',
                'number_of_branches' => 'required',
                'username_en' => 'required',
                'username_ar' => 'required',
                'email' => 'required|email',
                'city_id' => 'required',
                // step 2
                'company_name_en' => 'required',
                'commercial_register' => 'required',
                'tax_number' => 'required',
                'company_email' => 'required|email',
                'company_phone' => 'required',
                // step 3
                'commercial_no_file' => 'required',
                'vat_no_file' => 'required',
                'iban_file' => 'required',
            ];
    }
}
