<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComponentsController extends Controller
{
    public function nav(){
        return dd(Auth::user());
    }
}
