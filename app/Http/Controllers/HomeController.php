<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends BaseController
{

    public function construct()
    {
        parent::__construct();
    }

    public function index()
    {
        return view($this->getViewDir() . '.home.index');
    }



}
