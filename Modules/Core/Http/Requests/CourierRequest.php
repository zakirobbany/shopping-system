<?php

namespace Modules\Core\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourierRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch ($this->method()) {
            case 'PUT':
                return [
                    'name' => 'required',
                    'address' => 'required',
                    'phone_number' => 'required',
                    'courier_type_id' => 'required',
                ];
                break;
            case 'POST':
                return [
                    'name' => 'required',
                    'address' => 'required',
                    'phone_number' => 'required',
                    'courier_type_id' => 'required',
                ];
                break;
            default :
                return [];
                break;
        }
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
