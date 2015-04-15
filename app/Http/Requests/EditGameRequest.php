<?php namespace Stats\Http\Requests;

use Stats\Http\Requests\Request;

class EditGameRequest extends Request
{

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize() {
		return TRUE;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules() {
		return [
			'ghateam_id'   => 'required',
			'otherteam_id' => 'required',
			'datetime'     => 'required|date',
			'goalagainst'  => 'numeric'
		];
	}

}
