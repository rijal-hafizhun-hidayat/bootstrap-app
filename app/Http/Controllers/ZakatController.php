<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class ZakatController extends Controller
{
    public function index(){
        return Inertia::render('Zakat/Index');
    }

    public function create(){
        return Inertia::render('Zakat/Create');
    }
}
