<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;
use Session;
class ProductRequest extends FormRequest
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
    public function rules(Request $request)
    {
           switch($this->method())
            {

                case 'GET':
                case 'DELETE':
                {
                    return [];
                }
                case 'POST':
                {
                    return [
                         'title' => 'required|min:5|unique:product,title,NULL,id',
                         'slug' => 'required|min:5|unique:product,slug,NULL,id',
                         'sku' => 'required|min:5|unique:product,sku,NULL,id',
                         //'category' => 'required',
                         'description' => 'required',
                        //  'inventory' =>'required',
                        //  'stock_status'=>'required',
                    ];
                }
                case 'PUT':
                case 'PATCH':
                {
                    return [       
                         'title' => 'required|min:5|unique:product,slug,'.$request->segment(3).',id',
                         'slug' => 'required|min:5,slug,'.$request->segment(3).',id',
                         'sku' => 'required|min:5,sku,'.$request->segment(3).',id',
                         //'category' => 'required',
                         'description' => 'required',
                        //  'inventory' =>'required',
                        //  'stock_status'=>'required'
                         ];
                }
                default:break;
            }
          
    }
}
