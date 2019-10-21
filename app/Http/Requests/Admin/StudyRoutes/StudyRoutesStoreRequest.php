<?php

namespace App\Http\Requests\Admin\StudyRoutes;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

use Illuminate\Foundation\Http\FormRequest;

class StudyRoutesStoreRequest extends FormRequest
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
            'study_route_title' => 'required|string|max:50',
            'study_route_intro' => 'required|string|max:100',
            'study_route_content' => 'required|string',
            'category_id' => 'required|integer|exists:categorys,category_id',
            'study_route_state' => 'required|integer|between:0,1',
            'study_route_cover_picture_id' => 'required|integer|exists:cover_pictures,cover_picture_id',
            'study_route_video_id' => 'string',
        ];
    }
    protected function failedValidation(Validator $validator)
    {
        throw (new HttpResponseException(response()->fail(422, '参数错误！', $validator->errors()->all(), 422)));
    }
}
