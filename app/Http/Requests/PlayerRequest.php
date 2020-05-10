<?php

namespace App\Http\Requests;

class PlayerRequest extends Request
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
            'firstName' => 'required|unique:players,id|max:255',
            'lastName' => 'required',
            'identifier' => 'required',
            'team_id' => 'required',
            // 'imageUri' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
}
