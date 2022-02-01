<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAssetRequest extends FormRequest
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
            'serial_number'=>'required|string|max:15',
            'description'=>'required|string',
            'fixed_movable'=>'required|string',
            'picture_path'=>'required|string',
            'start_use_date'=>'required|date',
            'purchase_price'=>'required|integer',
            'warranty_expiry_date'=>'required|date',
            'degredation_in_years'=>'required|integer',
            'current_value'=>'required|integer',
            'location'=>'required|string'
        ];
    }
}
