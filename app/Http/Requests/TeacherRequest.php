<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeacherRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'email'=>'required|unique:teachers',
            'password'=>'required|min:8',
            'teacher_name_ar'=>'required|min:4|max:20',
            'teacher_name_en'=>'required|min:4|max:20',
            'specialization_id'=>'required',
            'gender_id'=>'required',
            'joining_date'=>'required',
            'address'=>'required|min:10|max:50',
        ];
    }

    public function messages()
    {
        return[
            'email.required'=>"هذا الحقل مطلوب",
            'email.unique'=>"هذا الحساب موجود بالفعل",

            'password.required'=>'كلمه المرور مطلوبه',
            'password.min'=>'كلمه المرور قصيرة',

            'teacher_name_ar.required'=>'هذا الحقل مطلوب',
            'teacher_name_ar.min'=>'لاقل يقل عن اربعه',
            'teacher_name_ar.max'=>'لايزيد عن عشرين',

            'teacher_name_en.required'=>'هذا الحقل مطلوب',
            'teacher_name_en.min'=>'لاقل يقل عن اربعه',
            'teacher_name_en.max'=>'لايزيد عن عشرين',

            'specialization_id.required'=>'مطلوب',

            'gender_id.required'=>'مطلوب',

            'joining_date.required'=>'مطلوب',
            'joining_date.numeric'=>'رقم',

            
            'address.required'=>'هذا الحقل مطلوب',
            'address.min'=>'لاقل يقل عن عشرة',
            'address.max'=>'لايزيد عن خمسين',

        ];
    }

}
