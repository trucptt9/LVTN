<?php

namespace App\Http\Requests\Promotions;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
class PromotionsUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Gate::allows('promotion-update');
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
            'id' => 'required|exists:promotions,id'
        ];
    }
}