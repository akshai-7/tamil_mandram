<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'u_code',
            'user_role',
            'u_first_name'      => 'required:max:50',
            'u_last_name'       => 'required:max:50',
            'u_user_id',
            'u_mobile_no'       => 'required',
            // 'u_email'           => 'required|unique:sm_users,u_email',
            'date_of_birth',
            // 'image'             => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'u_profile_image',
            'u_designation'     => 'required',
            'u_address'         => 'required',
            'u_emirates_id'     => 'required',
            'u_gender'          => 'required',
            'u_nationality'     => 'required',
            'u_country'         => 'required',
            'u_state'           => 'required',
            'u_city'            => 'required',
            'u_pincode'         => 'required',
            'password'          => 'required|min:4',
            'show_password',
            'device',
            'fcm_token',
            'created_by',
            'updated_by',
            'remember_token',
            'super_admin',
            'organization_id',
            'status'
        ];
    }

    public function messages(): array
    {
        return [
            'u_first_name.required'       => 'Please enter first name',
            'u_last_name.required'        => 'Please enter last name',
            'u_mobile_no.required'        => 'Please enter mobile number',
            'u_designation.required'      => 'Please enter designation',
            'u_address.required'          => 'Please enter address',
            'u_emirates_id'               => 'Please enter emirates id',
            'u_gender'                    => 'Please select gender',
            'u_nationality'               => 'Please select nationality',
            'u_country'                   => 'Please select country',
            'u_state'                     => 'Please select state',
            'u_city'                      => 'Please select city',
            'u_pincode'                   => 'Please select pincode',
            'u_email.required'            => 'Please give your email',
            'u_email.unique'              => 'User already exists by this email, please try with another email.',
            'password.required'           => 'Please give your password',
            'password.min'                => 'Minumum 8 Character of Password',
        ];
    }
}
