<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClassesController extends Controller
{
    public function sessions()
    {
        $classes = auth()->user()->classes;
        $classes = $classes->sortByDesc('created_at');
        return view('users.sessions', compact('classes'));
    }
}
