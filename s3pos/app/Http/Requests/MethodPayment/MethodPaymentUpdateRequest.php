<?php

namespace App\Http\Requests\MethodPayment;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
class MethodPaymentUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Gate::allows('method_payment-update');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            //
            'id' => 'required|exists:method_payments,id'
        ];
    }
}