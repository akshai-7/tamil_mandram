<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseLevelRequest extends FormRequest
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
            'level_title',
            'video_url',
            'level_image_path',
            'description',
            'status',
            'created_by',
            'updated_by',
        ];
    }
}
