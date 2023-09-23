<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseFeedBackRequest extends FormRequest
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
            'course_id',
            'language_id',
            'test_type',
            'question_type',
            'questions_part_1',
            'option_text_1',
            'option_text_2',
            'option_text_3',
            'option_text_4',
            'correct_text',
            'correct_answer',
            'created_by',
            'updated_by',
            'created_at',
            'updated_at',
            'questions_no',
            'status'
        ];
    }
}
