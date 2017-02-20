<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class BookController extends Controller
{
	public function showIndex() {
		
		$people = DB::table('people')->get(['id','name','surname','company','position','email','phone']);
		
		return view('index', compact('people'));
	}
	
	public function showAdd() {
		
		return view('edit');
	}
	
	
	public function showEdit($id) {
		
		$person = DB::table('people')->where('id','=',$id)->first(['id','name','surname','company','position','email','phone']);
		
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
		
		if (request('id'))
			DB::table('people')->where('id','=',request('id'))->update($data);
		else
			DB::table('people')->insert($data);
		
		return redirect('/');
	}
	
	public function doDelete ($id) {
		
		DB::table('people')->where('id','=',$id)->delete();	
		return redirect('/');
	}
	
	public function doSearch() {
		
		$this->validate(request(), ['search_string' => 'required']);
		$search_string = request('search_string');
		$people = DB::table('people')
			->where('name', 'LIKE', '%' . $search_string . '%')
			->orWhere('surname', 'LIKE', '%' . $search_string . '%')
			->orWhere('company', 'LIKE', '%' . $search_string . '%')
			->orWhere('position', 'LIKE', '%' . $search_string . '%')
			->orWhere('email', 'LIKE', '%' . $search_string . '%')
			->orWhere('phone', 'LIKE', '%' . $search_string . '%')
			->get();
		return view('index', compact('people'), ['search_string' => $search_string]);
	}
	
}
