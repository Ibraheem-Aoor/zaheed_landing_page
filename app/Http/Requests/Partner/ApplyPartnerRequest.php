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
                'store_name_ar' => 'required|string|max:255',
                'store_name_en' => 'required|string|max:255',
                'category_id' => 'required|exists:categories,id',
                'number_of_branches' => 'nullable|numeric',
                'city_id' => 'required',
                // step 2
                'company_name_en' => 'nullable|string|max:255',
                'commercial_register' => 'nullable|string|max:255',
                'vat_number' => 'nullable|string|max:255',
                'iban' => 'nullable|string|max:255',
                'bank_id' => 'nullable|exists:banks,id',
                'company_email' => 'required|email',
                'company_phone' => 'required',
                'name' => 'required|string|max:255',

                // step 3
                'commercial_no_file' => 'required',
                'vat_no_file' => 'nullable|file|max:1048',
                'iban_file' => 'nullable|file|max:1048',
                'other_file_1' => 'nullable|file|max:1048',
                'other_file_2' => 'nullable|file|max:1048',
            ];
    }
}
