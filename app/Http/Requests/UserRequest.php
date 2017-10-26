<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Storage;

class UserRequest extends FormRequest
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
        if(!request()->input('id')){
            return [
                'name' => 'required|max:255|unique:users,name,' . request()->input('id'),
                'email' => 'required|unique:users,email,' . request()->input('id'),
                'address' => 'required',
                'phone_number' => 'required',
                'status' => 'required',
                'password' => 'required|min:6|confirmed'
            ];
        } else {
            return [
                'name' => 'required|max:255|unique:users,name,' . request()->input('id'),
                'email' => 'required|unique:users,email,' . request()->input('id'),
                'address' => 'required',
                'phone_number' => 'required',
                'status' => 'required',
                'password' => 'min:6'
            ];
        }
    }

    public function response(array $errors)
    {
        return $this->redirector->to($this->getRedirectUrl())
            ->withInput($this->request->all())
            ->withErrors($errors, $this->errorBag);
    }
}
