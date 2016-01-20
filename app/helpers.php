<?php

use App\Flyer;

function flash($title=null, $message=null)
{
    $flash = app('App\Http\Flash');
    if(func_num_args()==0)
    {
        return $flash;
    }
    return $flash->info($title, $message);
}

function flyer_path(Flyer $flyer)
{
    return $flyer->zip .'/'. str_replace('','-', $flyer->street);
}