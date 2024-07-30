<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;
use Session;
class CmsRequest extends FormRequest
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
                         'name' => 'required|min:5|unique:cms,name,NULL,id',
                         'slug' => 'required|min:5|unique:cms,name,NULL,id',
                          'image' => 'mimes:jpeg,bmp,png',
                    ];
                }
                case 'PUT':
                case 'PATCH':
                {
                    return [       
                         'name' => 'required|min:5|unique:cms,name,'.$request->segment(3).',id',
                         'slug' => 'required|min:5|unique:cms,slug,'.$request->segment(3).',id',
                           'image' => 'mimes:jpeg,bmp,png',
                         ];
                }
                default:break;
            }
          
    }
}
