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
