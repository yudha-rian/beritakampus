<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCustomerRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        // Mengambil ID customer yang sedang diedit dari URL
        $customerId = $this->route('customer')->id;

        return [
            'name'    => 'required|string|min:3',
            
            // email: Unique, TAPI kecualikan ID customer ini sendiri
            'email'   => 'required|email|unique:customers,email,' . $customerId,
            
            'phone'   => 'required|numeric|digits_between:10,15',
            'address' => 'nullable|string',
        ];
    }
}
