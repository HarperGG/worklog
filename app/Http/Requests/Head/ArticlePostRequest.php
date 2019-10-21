<?php

namespace App\Http\Requests\Head;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ArticlePostRequest extends FormRequest
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
            'category_id' => 'required|integer',
            'title' => 'required|String',
            'intro' => 'required|String',
            'content' => 'required|String',
            'picture_id' => 'required|integer',
            'video' => 'required|integer'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw (new HttpResponseException(response()->fail(422, '参数错误！', $validator->errors()->all(), 422)));
    }
}
