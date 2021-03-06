<?php

namespace App\Http\Controllers\Traits;

use App\Flyer;
use Illuminate\Http\Request;


//Ne koristi se od kad je napravljen ChangeFlyerRequest za autorizaciju i validaciju
trait AuthorizesUsers {
    protected function userCreatedFlyer(Request $request)
    {
        return Flyer::where([
            'zip' => $request->zip,
            'street' => $request->street,
            'user_id'=> $this->user->id
        ])->exists();
    }

    protected function unauthorized(Request $request)
    {
        if($request->ajax())
        {
            return response(['message' =>  'No way' ], 403);
        }

        flash('No Way!');

        return redirect('/');
    }

}