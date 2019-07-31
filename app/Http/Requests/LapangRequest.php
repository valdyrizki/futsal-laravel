<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LapangRequest extends FormRequest
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
            'image' => 'required|image|mimes:jpg,png,jpeg',
            'nama_lapang' => 'required|min:3',
            'jenis_lapang' => 'required',
            'harga_lapang' => 'required',
            'status_lapang' => 'required'
        ];
    }
}
