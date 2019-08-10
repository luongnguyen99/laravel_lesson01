<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class ClassRoomRequest extends FormRequest
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
            'name' => 'required|string|min:8',
            // |unique:classes'
            
            'teacher_name' => 'required|string|min:8',
            'major' => 'required|string',
            'max_student' => 'nullable||numeric',         
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên bắt buộc phải nhập',
            'name.string' => 'Tên phải là chuỗi',
            'name.min' => 'Vui lòng nhập ít nhất 8 kí tự',


            'teacher_name.required'  => 'Tên giáo viên bắt buộc phải nhập',
            'teacher_name.string'  => 'Tên giáo viên phải là chuỗi',
            'teacher_name.min'  => 'Vui lòng nhập ít nhất 8 kí tự',
            
        ];
    }
}
