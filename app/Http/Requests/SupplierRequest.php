<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupplierRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        if(request()->isMethod('POST')){
            $data = [
                'name' => 'required|unique:suppliers',
                'telp' => 'required|numeric|digits_between:1,12',
                'address' => 'required|string',
            ];
        }elseif(request()->isMethod('PUT')){
            $data = [
                'name' => 'required','unique:suppliers,name'.$this->id,
                'telp' => 'required|numeric|digits_between:1,12',
                'address' => 'required|string',
            ];
        }

        return $data;
    }
}