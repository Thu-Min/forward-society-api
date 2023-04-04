<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBlogRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            "title" => "required|min:5|max:255|unique:blogs,title,".$this->route('blog')->id,
            "category" => "required|exists:categories,id",
            "description" => "required|min:10",
            "author_name" => "required",
            "designer_name" => "required",
            "image" => "required"
        ];
    }
}
