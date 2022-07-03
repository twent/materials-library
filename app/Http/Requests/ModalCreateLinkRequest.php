<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ModalCreateLinkRequest extends FormRequest
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
            'material_id' => 'Id материала',
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
            'material_id' => 'required|exists:materials,id',
            'title' => 'nullable|string|min:5',
            'url' => 'required|url'
        ];
    }
}
