<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Http\Request;
use function PHPUnit\Framework\isJson;

class OrderController extends Controller
{
	public function index()
	{

		$data = null;

		$orders = Feedback::query()
			->orderBy('id', 'desc')
			->paginate(10);

		foreach ($orders as $order){
			dd($order->user_data[0]['value']);
		}

		return view('admin.orders.index', compact('orders'));
	}


}
