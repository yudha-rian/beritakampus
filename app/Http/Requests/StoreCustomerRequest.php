<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCustomerRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Ubah ke true
    }

    public function rules()
    {
        return [
            // name: Minimal 3 karakter
            'name'    => 'required|string|min:3',
            
            // email: Harus unique di tabel customers
            'email'   => 'required|email|unique:customers,email',
            
            // phone: Hanya angka, minimal 10 digit (kita pasang batas atas 15 agar masuk akal)
            'phone'   => 'required|numeric|digits_between:10,15',
            
            // address: Optional (boleh kosong)
            'address' => 'nullable|string',
        ];
    }
}