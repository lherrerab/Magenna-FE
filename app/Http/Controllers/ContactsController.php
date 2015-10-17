<?php

namespace Magenna\Http\Controllers;

use Illuminate\Http\Request;
use Magenna\Http\Requests;
use Magenna\Http\Controllers\Controller;

class ContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = \Magenna\Contacts::all();
        return view('contacts',$contacts);
    }
	
	public function selectAll(){
		$contacts = \Magenna\Contacts::all();
		return $contacts;
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		//
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	$contact = new \Magenna\Contacts;
		$contact->user_id = '1';
    	$contact->name = $request->input('name');
    	$contact->email  = $request->input('email');
		$contact->phone  = $request->input('phone');
		$contact->favorite  = $request->input('favorite');
		$contact->save();
		
		return \Magenna\Contacts::all();   	
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    	$names = array(
      		1 => "John",
      		2 => "Mary",
      		3 => "Steven"
    	);    
    	return array($id => $names[$id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    	$contact = \Magenna\Contacts::find($id);
		
		$contact->name = $request->input('name');
    	$contact->email  = $request->input('email');
		$contact->phone  = $request->input('phone');
		$contact->save();		  	
		
        return \Magenna\Contacts::all();  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
