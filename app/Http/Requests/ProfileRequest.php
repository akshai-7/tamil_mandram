<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'u_first_name'      => 'required:max:50',
            'u_last_name'       => 'required:max:50',
            'u_mobile_no'       => 'required',
            'u_email',
            'u_profile_image',
            'u_gender'          => 'required',
            'u_nationality'     => 'required',
            'u_country'         => 'required',
            'u_state'           => 'required',
            'u_city'            => 'required',
            'u_address'         => 'required',
            'updated_by'
        ];
    }
}
