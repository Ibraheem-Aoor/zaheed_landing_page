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
                'number_of_branches' => 'nullable|integer',
                'city_id' => 'required',
                // step 2
                'company_name_en' => 'nullable|string',
                'company_name_ar' => 'required',
                'commercial_register' => 'nullable|string',
                'tax_number' => 'nullable|integer',
                'bank_id' => 'nullable|integer',
                'iban' => 'nullable|string',
                'company_email' => 'required|email',
                'company_phone' => 'required',
                'name' => 'required|string',
                'position' => 'nullable|string',
                // step 3
                'commercial_no_file' => 'required|file',
                'vat_no_file' => 'nullable|file',
                'iban_file' => 'nullable|file',
                'other_file_1' => 'nullable|file',
                'other_file_2' => 'nullable|file',
            ];
    }
}
