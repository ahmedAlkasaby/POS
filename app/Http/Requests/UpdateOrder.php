<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOrder extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'status'=>'required',
            'payment_status'=>'required',
            'payment_method'=>'required',
            'total_price'=>'required|numeric',
            'city'=>'required|string',
            'area'=>'required|string',
            'street'=>'required|string',
        ];
    }
}
