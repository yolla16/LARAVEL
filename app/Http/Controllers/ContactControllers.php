<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;

class ContactControllers extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) 
    {
        $keyword = $request->get('keyword');
        $contacts = Contact::all();

        if($keyword){
         $contacts = Contact::where("name","LIKE","%$keyword%")->get();
        }

        return view('contact.index',compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('contact.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) 
    {
        $request->validate([
            'full_name' => 'required|max:30',
            'email' => 'required|email:rfc,dns',
            'phone' => 'required',
            'address' => 'required'
        ]);
        $contact = new Contact([
            'name' => $request->input('full_name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address')
        ]);
        $contact->save();
        return redirect('/')->with('success','Contact saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $contact = Contact::find($id);
        return view('contact.edit',compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $contact  = Contact::find($id);
        $request->validate([
            'full_name' => 'required|max:30',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required'
        ]);
        $contact->name = $request->input('full_name');
        $contact->email = $request->input('email');
        $contact->phone = $request->input('phone');
        $contact->address = $request->input('address');
        $contact->save();
        return redirect('/')->with('success','Contact update!');       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $contact  = Contact::find($id);
        $contact->delete();
        return redirect('/')->with('success','Contact deleted!');  
    }
}
