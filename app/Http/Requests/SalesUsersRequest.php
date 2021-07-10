<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SalesUsersRequest extends FormRequest
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
            'emailAddress'        => "required|email|unique:sales_users",
            'telephoneNumbers'    => 'required|max:15',
            'joinedDates'         => 'required|max:20',
            'currentRoutes'       => 'required|max:200',
            'comments'            => 'required',
        ];
    }

}