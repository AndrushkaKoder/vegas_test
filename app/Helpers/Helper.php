<?php

//Возвращает объект текущего админа
function currentAdmin()
{
	return \Illuminate\Support\Facades\Auth::guard('admin')->user();
}

function hclass($if, $true, $false = '')
{
	return $if ? $true : $false;
}
