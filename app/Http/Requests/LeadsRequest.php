<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * Class LeadsRequest
 * @package App\Http\Requests
 */
class LeadsRequest extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool {
        // Allowing guests //
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array {
        $rules = [
            'first_name' => 'required|string|max:255|min:3',
            'last_name' => 'required|string|max:255|min:3',
            'email' => [
                'required',
                'email',
            ],
            'opt' => 'required|boolean',
        ];

        // Only unique emails allowed //
        $unique = Rule::unique('leads', 'email');

        // If updating a lead, grab the request id //
        if ($this->method() === 'PUT') {
            $unique->ignore($this->route('leads')->id);
        }

        // Add unique rule to email element //
        $rules['email'][] = $unique;

        return $rules;
    }
}
