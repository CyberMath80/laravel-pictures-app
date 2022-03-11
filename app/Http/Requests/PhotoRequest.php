<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PhotoRequest extends FormRequest
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
            'title' => ['required', 'max:191'],
            'photo' => ['required', 'file', 'image', 'mimes:jpeg,jpg,png', 'dimensions:min_width=1920, min_height=1080'],
            'tags' => ['required', 'max:191'],
        ];
    }
}
