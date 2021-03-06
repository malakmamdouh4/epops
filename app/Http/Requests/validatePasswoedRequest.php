<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class validatePasswoedRequest extends FormRequest
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
            'newPassword' => 'required|min:8',
            'oldPassword' => 'required|min:8',
        ];
    }
}
