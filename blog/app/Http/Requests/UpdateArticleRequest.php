<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class UpdateArticleRequest extends FormRequest
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
    protected function prepareForValidation()
    {
        $this->merge(
            ['slug' => $this->input('slug') ?: Str::slug($this->input('title'))]
        );
    }
   public function rules(): array
    {
        $article = $this->route('article');

        return [
            'title'   => ['required','string','min:3','max:150'],
            'slug'    => [
                'required','string','max:180',
                Rule::unique('articles','slug')->ignore($article)
            ],
            'content' => ['required','string','min:20'],
        ];
    }

    public function messages(){
        return[
            'slug.unique' => 'Ce slug set déjà pris par un autre article'
        ];
    }
}
