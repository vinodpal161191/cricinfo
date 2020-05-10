<?php

namespace App\Http\Requests;

class TeamRequest extends Request
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
            'name' => 'required|unique:teams,id|max:255',
            'identifier' => 'required',
            'clubState' => 'required',
            // 'logoUri' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
}
