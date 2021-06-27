<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Pemesanan;

class UpdatePemesananRequest extends FormRequest
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
        $pemesanan = Pemesanan::where('nomor_dokumen', request()->nomor_dokumen)->first();

        if ($pemesanan) {
            Pemesanan::$rules['nomor_dokumen'] = 'required|unique:pemesanans,nomor_dokumen,'.$pemesanan->id.',id';
        }

        return Pemesanan::$rules;
    }
}
