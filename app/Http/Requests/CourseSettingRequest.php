<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseSettingRequest extends FormRequest
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
            'pre_test',
            'post_test',
            'pre_test_re_attempt_limit',
            'post_test_re_attempt_limit',
            'feedback',
            'shuffle_questions',
            'completion_percent'
        ];
    }
}
