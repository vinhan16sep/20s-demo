<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'input_client_firstName' => 'required',
            'input_client_lastName' => 'required',
            'input_client_email_signup' => 'required|email',
            'input_client_phone_signup' => 'required|numeric',
            'input_client_password_signup' => 'required',
            'input_client_confirm_password_signup' => 'required|same:input_client_password_signup'
        ];
    }

    public function messages()
{
    return [
        'input_client_firstName.required' => 'Bắt buộc nhập',
        'input_client_lastName.required' => 'Bắt buộc nhập',
        'input_client_email_signup.required' => 'Bắt buộc nhập',
        'input_client_phone_signup.required' => 'Bắt buộc nhập',
        'input_client_password_signup.required' => 'Bắt buộc nhập',
        'input_client_confirm_password_signup.required' => 'Bắt buộc nhập',
        'input_client_email_signup.email' => 'Định dạng email không đúng',
        'input_client_phone_signup.numeric' => 'Vui lòng nhập số',
        'input_client_confirm_password_signup.same' => 'Xác nhận mật khẩu không đúng'

    ];
}
}
