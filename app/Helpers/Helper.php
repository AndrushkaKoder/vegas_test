<?php

//Возвращает объект текущего админа
function currentAdmin()
{
	return \Illuminate\Support\Facades\Auth::guard('admin')->user();
}

//Возвращает объект текущего юзера
function user()
{
	return \Illuminate\Support\Facades\Auth::guard('user')->user();
}


function hclass($if, $true, $false = '')
{
	return $if ? $true : $false;
}


function getParameters($name)
{
	$result = [];
	$res = explode(',', \App\Models\Params::getValue($name));

	foreach ($res as $item) {
		$result[] = trim($item);
	}

	return array_filter($result);
}

function getDataToDiscountStart($discount_date_start){
	//передать request('discount_date_start')
//	$today =  strtotime(date(today()->format('Y-m-d')));
//	$discDateStart = strtotime($discount_date_start);
//	$res = $discDateStart - $today;
//	$min = floor($res/60);
//	$hours = floor($min/60);
//
//	return intval(floor($hours/24));
}

