<?php

namespace App\Http\Responses;

use Illuminate\Support\Facades\URL;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{
    /**
     * @param  $request
     * @return mixed
     */
    public function toResponse($request)
    {
        $home = auth()->user()->is_admin ? '/admin' : session()->get('url.intended');
        return redirect()->intended($home);
    }
}
