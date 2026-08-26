<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index(){
        $name = "Lidio";
        $habbit = ['run', 'study', 'eat'];
        return view('home',compact('name', 'habbit'));
    }
    public function dashboard(){
        return view('dashboard');
    }
}
