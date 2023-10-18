<?php
namespace App\Http\Requests;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
class EmployeesAddRequest extends FormRequest
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
            
				"employee_number" => "nullable|numeric",
				"first_name" => "nullable|string",
				"last_name" => "nullable|string",
				"surname" => "nullable|string",
				"tax_id" => "nullable|string",
				"id_number" => "nullable|string",
				"position_id" => "nullable",
				"schedule_id" => "nullable",
				"status" => "nullable",
				"id_user" => "nullable",
				"photo" => "nullable",
        ];
    }

	public function messages()
    {
        return [
            //using laravel default validation messages
        ];
    }

	/**
     * If validator fails return the exception in json form
     * @param Validator $validator
     * @return array
     */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}
