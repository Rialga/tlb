<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Supir;

class UpdateSupirRequest extends FormRequest
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
        $supir = Supir::where('no_supir', request()->no_supir)->first();

        if ($supir) {
            Supir::$rules['no_supir'] = 'required|unique:supirs,no_supir,'.$supir->id.',id';
        }

        return Supir::$rules;
    }
}
