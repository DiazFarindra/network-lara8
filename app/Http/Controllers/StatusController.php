<?php

namespace App\Http\Controllers;

use App\Http\Requests\StatusRequest;

class StatusController extends Controller
{
    //
    public function store(StatusRequest $request)
    {
        $request->make($request->body);
        return \redirect()->back();
    }
}
