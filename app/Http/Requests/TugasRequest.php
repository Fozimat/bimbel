<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TugasRequest extends FormRequest
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
        if (request()->isMethod('put')) {
            return [
                'id_mapel' => 'required',
                'id_tingkat' => 'required',
                'judul' => 'required|min:2',
                'batas_pengantaran' => 'required',
                'keterangan' => 'required'
            ];
            if (request('tugas')) {
                $rules['tugas'] = 'required|mimes:csv,txt,xlx,xls,pdf,doc,docx,xlsx,pptx,ppt|max:2048';
            }
        } else {
            return [
                'id_mapel' => 'required',
                'id_tingkat' => 'required',
                'judul' => 'required|min:2',
                'keterangan' => 'required',
                'tugas' => 'required|mimes:csv,txt,xlx,xls,pdf,doc,docx,xlsx,pptx,ppt|max:2048',
                'batas_pengantaran' => 'required'
            ];
        }
    }
}
