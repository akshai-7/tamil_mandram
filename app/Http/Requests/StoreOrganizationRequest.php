<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrganizationRequest extends FormRequest
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
            'user_id',
            'org_name' => 'required:max:50',
            'org_code',
            'permit_code',
            'org_email'  => 'required|unique:sm_organizations,org_email',
            'org_contract_expiry_date',
            'smart_worker_strength',
            'org_user_name',
            'org_logo',
            'password',
            'show_password',
            'pre_test',
            'pre_test_attempt_limit',
            'post_test',
            'post_test_attempt_limit',
            'feed_back',
            'shuffle_questions',
            'status'
        ];
    }
}
