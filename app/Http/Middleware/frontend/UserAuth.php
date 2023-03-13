<?php

namespace App\Http\Middleware\frontend;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAuth
{
	/**
	 * Handle an incoming request.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
	 * @return Closure|\Illuminate\Http\RedirectResponse|Request|\Illuminate\Http\Response
	 */
	public function handle(Request $request, Closure $next)
	{
		if (Auth::guard('user')->user()) {
			return $next($request);
		} else {
			return redirect()->route('user.login');
		}

	}
}
