<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DetachLinkRequest extends FormRequest
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
            'link_id' => 'Id ссылки',
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
            'link_id' => 'required|exists:links,id',
        ];
    }
}
