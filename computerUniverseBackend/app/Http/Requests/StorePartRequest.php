<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePartRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => [
              'required', 'max:30'
            ],
            'manufacturer' => [
                'required', 'max:20'
            ],
            'price' => [
                'required', 'numeric'
            ],
            'warranty' => [
                'required', 'max:18'
            ],
            'device_id' => [
                'required', 'numeric'
            ],
            'category' => [
              'required', 'max:20'
            ]
        ];
    }
}
