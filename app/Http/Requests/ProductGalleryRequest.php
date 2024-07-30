<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;
use Session;
class ProductGalleryRequest extends FormRequest
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
                         'title' => 'required',
                          'image' => 'mimes:jpeg,bmp,png',
                          'thumb_image' => 'mimes:jpeg,bmp,png',
                    ];
                }
                case 'PUT':
                case 'PATCH':
                {
                    return [       
                         'title' => 'required',
                         'image' => 'mimes:jpeg,bmp,png',
                          'thumb_image' => 'mimes:jpeg,bmp,png',
                         ];
                }
                default:break;
            }
          
    }
}
