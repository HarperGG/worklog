<?php

namespace App\Http\Requests\Admin\Users;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'user_student_number' => 'required|integer|digits:11',
            'user_name' => 'required|string|between:2,5',
            'user_grade' => 'required|integer|digits:4',
            'user_major' => 'required|string|between:2,50',
            'user_permissions' => 'required|integer|between:1,2',
        ];
    }
    protected function failedValidation(Validator $validator)
    {
        throw (new HttpResponseException(response()->fail(422, '参数错误！', $validator->errors()->all(), 422)));
    }
}
