<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
//use App\Models\Flight;

class ProfileController extends Controller
{
    public function index(){
        return Inertia::render('Profile/Index', [
            'profile' => Auth::user()
        ]);
    }
}
