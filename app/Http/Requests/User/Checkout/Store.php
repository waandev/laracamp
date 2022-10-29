<?php

namespace App\Http\Requests\User\Checkout;

use Auth;
use Illuminate\Foundation\Http\FormRequest;

class Store extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $expiredValidation = date('Y-m', time());

        return [
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . Auth::id() . ',id',
            'occupation' => 'required|string',
            'phone' => 'required|string',
            'address' => 'required|string',
        ];
    }
}
