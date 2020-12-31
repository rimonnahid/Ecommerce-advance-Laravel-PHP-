<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class LocalizationController extends Controller
{
    public function locale($locale)
    {
    	Session::put('locale',$locale);
    	return redirect()->back();
    }
}
