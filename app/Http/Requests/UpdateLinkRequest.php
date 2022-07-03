<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLinkRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth('web')->check();
    }

    public function attributes()
    {
        return [
            'title' => 'Название ссылки',
            'url' => 'Ссылка (URL)'
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'nullable|string|min:5',
            'url' => 'required|url'
        ];
    }
}
