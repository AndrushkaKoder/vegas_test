<?php

namespace App\Http\Controllers\Admin;

use App\Models\Vendor;

class VendorsController extends BaseCrudController
{
	protected $model = Vendor::class;
	protected $paginateQuantity = 10;



}
