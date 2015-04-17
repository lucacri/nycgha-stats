<?php namespace Stats\Http\Controllers\Admin\Godmode;

use Stats\Http\Requests;
use Illuminate\Http\Request;
use Stats\Http\Requests\CreatePersonRequest;
use Stats\Person;

class PersonController extends Controller
{

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() {
		return view('admin.person.index')->withPeople(Person::orderBy('fname', 'asc')
															->orderBy('lname', 'asc')
															->paginate(25));
	}

	public function create() {
		return view('admin.person.create');
	}

	/**
	 * @param CreatePersonRequest $request
	 * @return \Illuminate\View\View
	 */
	public function store(CreatePersonRequest $request) {
		$person = Person::create($request->all());

		\Flash::success("Person created");

		return redirect()->route('admin.person.index');
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param Person $person
	 * @return Response
	 */
	public function edit(Person $person) {
		return view('admin.person.edit')->withPerson($person);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param Request $request
	 * @param Person  $person
	 * @return Response
	 */
	public function update(Request $request, Person $person) {
		$person->fill($request->all());
		$person->save();
		\Flash::success("User updated");

		return redirect()->route('admin.person.edit', [$person]);
	}


}
