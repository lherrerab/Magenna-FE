<?php

namespace Magenna\Http\Controllers;

use Illuminate\Http\Request;
use Magenna\Http\Requests;
use Magenna\Http\Controllers\Controller;

class MagennaController extends Controller
{
	public function index(){
		return view('index');
	} 
}

?>