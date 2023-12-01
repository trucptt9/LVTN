<?php

namespace App\Http\Requests\Promotions;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
class PromotionsInsertRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Gate::allows('promotion-create');
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
            'subject' => 'required',
            'start' => 'required',
            
        ];
    }
}