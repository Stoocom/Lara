<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminNewsCreateRequest extends FormRequest
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
            'news.title' => 'required|min:5|max:255|unique:news',
            'news.content' => 'required',
            'news.id_category' => 'required|exists:categories,id|integer',
        ];
    }

    public function required()
    {
        return ['required' => "Прошу тебя заполни поле :attribute"];
    }
}
