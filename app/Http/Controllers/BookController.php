<?php

namespace App\Http\Controllers;

use App\Person;
use Illuminate\Http\Request;

class BookController extends Controller
{
	public function showIndex() {
		
		$people = Person::all();
		
		return view('index', compact('people'));
	}
	
	public function showAdd() {
		
		return view('edit');
	}
	
	
	public function showEdit(Person $person) {
		
		return view('edit', compact('person'));
	}
	
	public function showSearch() {
		
		return view('search');
	}
	
	public function doEdit() {
		
		$this->validate(request(), [
			'name' => 'required',
			'surname' => 'required',
		]);
		
		$data = [
			'name' => (string)request('name'),
			'surname' => (string)request('surname'),
			'company' => (string)request('company'),
			'position' => (string)request('position'),
			'email' => (string)request('email'),
			'phone' => (string)request('phone'),
		];
		
		if (request('id')) {
			$person = Person::find(request('id'));
			$person->fill($data);
			$person->save();
		} else {
			Person::create($data);
		}
		
		return redirect('/');
	}
	
	public function doDelete (Person $person) {

		$person->delete();
		
		return redirect('/');
	}
	
	public function doSearch() {
		
		$this->validate(request(), ['search_string' => 'required']);
		$search_string = request('search_string');
		
		$people = Person::search($search_string);
		
		return view('index', compact('people'), ['search_string' => $search_string]);
	}
	
}
