<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GradeRequest extends FormRequest
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
            'name_ar'=>'required|min:4',
            'name_en'=>'required|min:4',
            'description'=>'required|min:4',
        ];
    }
    public function messages()
    {
        return[
            'name_ar.required'=>trans('schoolgrade.name_ar_req'),
            'name_ar.min'=>trans('schoolgrade.min'),
            // 'name_ar.unique'=>trans('schoolgrade.name_uni'),

            'name_en.required'=>trans('schoolgrade.name_en_req'),
            'name_en.min'=>trans('schoolgrade.min'),
            // 'name_en.unique'=>trans('schoolgrade.name_uni'),

            'description.required'=>trans('schoolgrade.description_req'),
            'description.min'=>trans('schoolgrade.min')
        ];
    }
}
