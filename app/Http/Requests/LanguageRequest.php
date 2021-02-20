<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LanguageRequest extends FormRequest
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
            'name' => 'required|string|max:100',
            'abbr' => 'required|string|max:10',
            'direction' => 'required|in:rtl,ltr',
//            'active' => 'required|in:0,1',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'اسم اللغة مطلوب',
            'name.string' => 'اسم اللغة يكون حروف',
            'name.max' => 'اسم اللغة لا يزيد عن 100 حرف',

            'abbr.required' => 'اختصار اللغة مطلوب',
            'abbr.string' => 'اختصار اللغة يكون حروف',
            'abbr.max' => 'اختصار اللغة لا يزيد عن 10 حرف',

            'direction.required' => 'اتجاه اللغة مطلوب',
            'direction.in' => 'اتجاه اللغة غير صحيح',

//            'active.required' => 'حالة اللغة مطلوب',
//            'active.in' => 'حالة اللغة غير صحيح',
        ];
    }
}
