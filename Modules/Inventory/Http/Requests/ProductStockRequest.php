<?php

namespace Modules\Inventory\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStockRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch ($this->method()) {
            case 'POST' :
                return [
                    'product_id' => 'required',
                    'quantity' => 'required|numeric',
                ];
                break;
            case 'PUT' :
                return [
                    'product_id' => 'required',
                    'quantity' => 'required|numeric',
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
