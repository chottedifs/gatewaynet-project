<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class TransactionRequest extends FormRequest
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

            $periodMonthValidation = date('M Y', time()),

            // 'name' => 'required|string',
            // 'email' => 'required|email|unique:users,email,'.Auth::id().',id',
            // 'occupation' => 'required|string',
            // 'card_number' => 'required|numeric|digits_between:8,16',
            'period_month' => 'required|date|date_format:Y-m|after_or_equal:'.$periodMonthValidation,
            // 'cvc' => 'required|numeric|digits:3'

        ];
    }
}
