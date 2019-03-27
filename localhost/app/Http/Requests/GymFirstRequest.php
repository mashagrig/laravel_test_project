<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GymFirstRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(\Auth::user() == null) {
            return true;
        }
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
            'gym_name' => [
                'nullable',
               // 'distinct',
                'alpha'
            ],
            'gym_num' => [
                'nullable',
             //   'distinct',
                'integer'
            ],
            'equip_name' => [
             //   'nullable',
                'unique:equipments,equip_name'//unique:таблица,поле - не должно быть пробелов между "таблицей" и "полем"!!!
               // 'distinct'
            ]
        ];
    }

    public function messages()
    {
        return [
            "gym_name.alpha" => 'ошибка в поле gym_name - не должно быть цифр',
            "gym_num.integer" => 'ошибка в поле gym_num - не должно быть букв',
            "equip_name.unique" => 'ошибка в поле equip_name - должно быть  уникально'
        ];
    }
}
