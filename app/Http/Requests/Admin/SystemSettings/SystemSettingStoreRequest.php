<?php

namespace App\Http\Requests\Admin\SystemSettings;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

use Illuminate\Foundation\Http\FormRequest;

class SystemSettingStoreRequest extends FormRequest
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
            'system_setting_site_record_info' => 'required|string|max:30',
            'system_setting_other' => 'required|string|max:30',
            'system_setting_wx_qrcode' => 'required|string',
            'system_access_key_id' => 'required',
            'system_access_key_secret' => 'required',
        ];
    }
    protected function failedValidation(Validator $validator)
    {
        throw (new HttpResponseException(response()->fail(422, '参数错误！', $validator->errors()->all(), 422)));
    }
}
