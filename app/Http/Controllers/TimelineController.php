<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class TimelineController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        $status = Auth::user()->timeline();
        return \view('timeline', \compact('status'));
    }
}
