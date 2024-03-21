<?php

namespace App\Http\Requests;

use App\Application\Transaction\TransactionDTO;
use Illuminate\Foundation\Http\FormRequest;

/**
 * @property  float $value
 * @property  int   $payer
 * @property  int   $payee
 */
class TransactionExecutePostRequest extends FormRequest
{
    public $value = 0;
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'value.required' => 'A value is required',
            'value.min' => 'A value is not valid',
            'payer.required' => 'A payer is required for this operation',
            'payee.required' => 'A payee is required for this operation',
        ];
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'value' => 'required|min:1',
            'payer' => 'required',
            'payee' => 'required',
        ];
    }
}
