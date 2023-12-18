<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
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
            'order_date' => [
                'required', 'date'
            ],
            'operator' => [
                'required', 'numeric'
            ],
            'status' => [
                'required', 'max:15'
            ],
            'delivery_time' => [
                'required', 'numeric'
            ]
        ];
    }
}
