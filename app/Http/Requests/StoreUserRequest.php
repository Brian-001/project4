<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    // public function authorize(): bool
    // {
    //     return true;
    // }

    // /**
    //  * Get the validation rules that apply to the request.
    //  *
    //  * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
    //  */

    /**
     * 'roles.*' field indicates an array of role IDs and each ID must be an integer
     * 'roles' is required and must be an array 
    */
    public function rules(): array
    {
        return [
            'name'=>['string', 'required'],
            'email'=>['required', 'unique:users'],
            'password'=>['required'],
            'roles.*'=>['integer'],
            'roles'=>['required', 'array'],
        ];
    }

    /**
     * authorize() determines if the user is authorized before allowing request to proceed
     * This method uses 'Gate' facade to check if the current user is allowed to access 'user_access' gate
    */
    public function authorize(){
        return Gate::allows('user_access');
    }
}
