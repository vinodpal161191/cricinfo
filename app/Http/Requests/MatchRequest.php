<?php

namespace App\Http\Requests;

class MatchRequest extends Request
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
            'team1' => 'required|matches,id|max:255',
            'team1' => 'required',
            'match_status' => 'required'
        ];
    }
}
