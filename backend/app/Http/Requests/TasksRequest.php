<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TasksRequest extends FormRequest
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
            'name' => 'required|min:3|max:255',
            'deadline' => 'nullable|after_or_equal:today'
        ];
    }
    public function messages(){
        return[
            'name.required' => 'タスク内容を入力してください。',
            'name.min' => '3文字以上で入力してください。',
            'name.max' => '255文字以内で入力してください。',
            'deadline.after_or_equal' => '今日以降の日付を登録してください。'
        ];
    }
}
