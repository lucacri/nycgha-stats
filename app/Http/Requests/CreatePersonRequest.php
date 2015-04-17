<?php namespace Stats\Http\Requests;

use Stats\Http\Requests\Request;

class CreatePersonRequest extends Request {

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
			'fname' => 'required',
			'lname' => 'required',
			'birthdate' => 'date',
		];
	}

}
