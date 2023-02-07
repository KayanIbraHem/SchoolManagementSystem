<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClassRequest extends FormRequest
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
            'data_list.*.name_ar' => 'required|min:4',
            'data_list.*.name_en' => 'required|min:4',
        ];
    }

    public function messages()
    {
        return[
            'data_list.*.name_ar.required'=>trans('classes.name_ar_req'),
            'data_list.*.name_ar.min'=>trans('classes.name_min'),
            'data_list.*.name_en.required'=>trans('classes.name_en_req'),
            'data_list.*.name_en.min'=>trans('classes.name_min'),


        ];
    }
}
