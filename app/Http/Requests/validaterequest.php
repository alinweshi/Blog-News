<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class validaterequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
         $data=[
            'logo'=>'image',
            'favicon'=>'image',
            'facebook'=>'string|required',
            'instagram'=>'',
            'email'=>'email',
            'phone'=>'string',
            'address'=>'string',
            
        ];
        foreach(config("app.languages") as $key=>$value){
            $data[$key.'*.title']='string|nullable';
            $data[$key.'*.content']='string|nullable';
        }
        return $data;
    }
}
