<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function getAbout()
    {
    	return view('page.about');
    }

    public function getContact()
    {
    	return view('page.contact');
    }
}
