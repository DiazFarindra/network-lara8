<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;

class TimelineController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $status = Status::whereUserId(auth()->user()->id)->get();
        return \view('timeline', \compact('status'));
    }
}
