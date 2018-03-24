<?php

namespace Modules\Inventory\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
                    'name' => 'required',
                    'sell_price' => 'required|numeric',
                    'modal_price' => 'required|numeric',
                    'product_brand_id' => 'required',
                    'product_type_id' => 'required',
                ];
                break;
            case 'PUT' :
                return [
                    'name' => 'required',
                    'sell_price' => 'required|numeric',
                    'modal_price' => 'required|numeric',
                    'product_brand_id' => 'required',
                    'product_type_id' => 'required',
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
