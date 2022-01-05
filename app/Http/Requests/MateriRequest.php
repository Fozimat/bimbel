<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MateriRequest extends FormRequest
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
            'id_mapel' => 'required',
            'id_tingkat' => 'required',
            'judul' => 'required|min:2',
            'materi' => 'required|mimes:csv,txt,xlx,xls,pdf,doc,docx,xlsx,pptx,ppt|max:2048',
            'keterangan' => 'required'
        ];
    }
}
