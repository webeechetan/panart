<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;
use Session;
class CategoryRequest extends FormRequest
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
                         'name' => 'required|min:3|unique:categories,name,NULL,id',
                         'slug' => 'required|min:3|unique:categories,name,NULL,id',
                    ];
                }
                case 'PUT':
                case 'PATCH':
                {
                    return [       
                         'name' => 'required|min:3|unique:categories,name,'.$request->segment(3).',id',
                         'slug' => 'required|min:3|unique:categories,slug,'.$request->segment(3).',id',
                         ];
                }
                default:break;
            }
          
    }
}
