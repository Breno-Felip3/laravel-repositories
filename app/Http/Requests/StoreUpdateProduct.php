<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateProduct extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $id = $this->id;
        return [
            'category_id' => 'required|exists:categories,id',
            'name' => "unique:products,name,$id,id|max:255|required",
            'url' => "unique:products,url,$id,id|max:255|required",
            'price' => 'required',
            'description' => 'nullable'
        ];
    }
}
