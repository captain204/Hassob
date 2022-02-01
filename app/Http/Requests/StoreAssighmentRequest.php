<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAssighmentRequest extends FormRequest
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
            'asset_id'=>'required|integer',
            'assighment_date'=>'required|date',
            'status'=>'required|string',
            'is_due'=>'required|date',
            'due_date'=>'required|date',
            'user_id'=>'required|integer',
            'assigned_by'=>'required|string'
        ];
    }
}
