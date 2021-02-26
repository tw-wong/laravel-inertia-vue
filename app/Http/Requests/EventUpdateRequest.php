<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventUpdateRequest extends FormRequest
{
    // store the length of field in constant, 
    // to make it available outside the class.
    const TITLE_MAX_LENGTH = 191;
    
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // return false;
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
            'title'         => 'required|string|max:' . self::TITLE_MAX_LENGTH, 
            'description'   => 'required|string', 
            // 'date_time'     => 'required|date_format:d/m/Y, H:i A', 
            'date'     => 'required|date_format:Y-m-d',
        ];
    }
}
