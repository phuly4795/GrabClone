<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class RoleAdd extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'code' => 'required|unique:roles|max:255',
            'name' => 'required|string|max:255',
        ];
    }


    /**
 * Get the error messages for the defined validation rules.
 *
 * @return array<string, string>
 */
public function messages(): array
{
    return [
        'code.required' => 'Không được bỏ trống mã quyền',
        'code.unique'   => 'Mã quyền đã tồn tại',
        'name.required' => 'Không được bỏ trống tên quyền',
    ];
}
}
