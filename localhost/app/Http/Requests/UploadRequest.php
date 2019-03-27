<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UploadRequest extends FormRequest
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
            'files.*' => [
                //'file',
                'mimes:jpeg,jpg,png'
            ]
        ];
    }

    public function messages()
    {
        return [
            "files.mimes" => 'Файлы не были загружены - попытка загрузить файлы не формата jpeg,jpg,png'
        ];}

}
