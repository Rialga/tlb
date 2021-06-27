<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Pengadaan;

class UpdatePengadaanRequest extends FormRequest
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
        $pengadaan = Pengadaan::where('nomor_dokumen', request()->nomor_dokumen)->first();

        if ($pengadaan) {
            Pengadaan::$rules['nomor_dokumen'] = 'required|unique:produksis,nomor_dokumen,'.$pengadaan->id.',id';
        }

        return Pengadaan::$rules;
    }
}
