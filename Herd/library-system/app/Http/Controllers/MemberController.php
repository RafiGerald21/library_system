<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        $members = [
            'Rafi',
            'Raza',
            'Hakim',
            'Rizal',
            'Darrel',
        ];
        
        return view('members.index', compact('members'));
    }
}
