<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = [
            'Pemrograman',
            'Algoritma dan Struktur Data',
            'Cloud Computing',
            'Blockchain',
            'Kecerdasan Buatan',
        ];
        return view('categories.index', compact('categories'));
    }
}
