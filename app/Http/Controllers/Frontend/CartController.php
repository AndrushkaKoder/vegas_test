<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class CartController extends Controller
{
	public function index(){
		$page = new Page();
		return view('frontend.cart.index', compact('page'));
	}
}
