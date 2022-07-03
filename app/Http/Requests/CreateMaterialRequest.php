<?php

namespace App\Http\Requests;

use App\Models\MaterialType;
use Illuminate\Foundation\Http\FormRequest;

class CreateMaterialRequest extends FormRequest
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
            'type' => 'Тип материала',
            'category_id' => 'Категория',
            'title' => 'Название материала',
            'authors' => 'Авторы',
            'description' => 'Описание',
        ];
    }

    public function prepareForValidation()
    {
        // Uppercase for MaterialType Enum
        return $this->request->set('type', strtoupper($this->request->get('type')));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'type' => 'in:'. implode(",", MaterialType::keys()),
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string|min:5',
            'authors' => 'nullable|string',
            'description' => 'nullable|string|max:1024',
        ];
    }
}
