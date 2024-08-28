<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ComponentsController extends Controller
{
    public function alert(Request $request)
    {
        session()->flash('alertType', $request->type);
        session()->flash('alertMessage', $request->message);

        return view('components.alert');
    }
}
