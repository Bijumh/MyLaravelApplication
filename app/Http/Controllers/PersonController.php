<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Person;
use Illuminate\Http\Request;

class PersonController extends Controller {

    public function __construct() {
        $this->middleware('auth',
                         ['only' =>['create', 'edit']]);
    }
    
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
        $search = $request->input("search");
        
        if ($search != '') {
            $people = Person::where('first_name', 'LIKE', '%'. $search .'%')->
                orWhere('last_name', 'LIKE', '%'. $search .'%');
            $people = $people->paginate(10);

        } else {
            $people = Person::orderBy('id', 'desc')->paginate(10);
        }
		
		return view('people.index', compact('people'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('people.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
        
        $this->validate($request, [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'address' => 'required|max:255',
            'city' => 'required|max:255',
            'state' => 'required|max:255',
            'zip_code' => 'required|integer',
            'country' => 'required|max:255',
            'dob' => 'required|date',
            'height' => 'required|numeric',
            'weight' => 'required|numeric',
        ]);
        
		$person = new Person();
        
		$person->first_name = $request->input("first_name");
        $person->last_name = $request->input("last_name");
        $person->address = $request->input("address");
        $person->city = $request->input("city");
        $person->state = $request->input("state");
        $person->zip_code = $request->input("zip_code");
        $person->country = $request->input("country");
        $person->dob = $request->input("dob");
        $person->height = $request->input("height");
        $person->weight = $request->input("weight");

        $person->save();

		return redirect()->route('people.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$person = Person::findOrFail($id);

		return view('people.show', compact('person'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$person = Person::findOrFail($id);

		return view('people.edit', compact('person'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @param Request $request
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
        $this->validate($request, [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'address' => 'required|max:255',
            'city' => 'required|max:255',
            'state' => 'required|max:255',
            'zip_code' => 'required|integer',
            'country' => 'required|max:255',
            'dob' => 'required|date',
            'height' => 'required|numeric',
            'weight' => 'required|numeric',
        ]);
        
		$person = Person::findOrFail($id);

		$person->first_name = $request->input("first_name");
        $person->last_name = $request->input("last_name");
        $person->address = $request->input("address");
        $person->city = $request->input("city");
        $person->state = $request->input("state");
        $person->zip_code = $request->input("zip_code");
        $person->country = $request->input("country");
        $person->dob = $request->input("dob");
        $person->height = $request->input("height");
        $person->weight = $request->input("weight");

        echo $person->dob;
        die();
		
		$person->save();

		return redirect()->route('people.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$person = Person::findOrFail($id);
		$person->delete();

		return redirect()->route('people.index')->with('message', 'Item deleted successfully.');
	}

}
