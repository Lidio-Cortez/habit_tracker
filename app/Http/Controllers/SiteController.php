<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class SiteController extends Controller
{
    public function index(): view{
        return view('home');
    }
    public function dashboard(): view{
        $habits = auth()->user()->habits;
        return view('dashboard', compact('habits'));
    }
}
