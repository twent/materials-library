<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AttachTagRequest extends FormRequest
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
            'tag_id' => 'Id Тега',
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
            'tag_id' => 'required|exists:tags,id',
        ];
    }
}
