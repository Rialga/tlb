<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Produksi;

class UpdateProduksiRequest extends FormRequest
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
        $produksi = Produksi::where('nomor_dokumen', request()->nomor_dokumen)->first();

        if ($produksi) {
            Produksi::$rules['nomor_dokumen'] = 'required|unique:produksis,nomor_dokumen,'.$produksi->id.',id';
        }

        return Produksi::$rules;
    }
}
