<?php

namespace App\Http\Controllers; 

class DashboardController extends Controller
{
    public function index()
    {
        $title = 'Library System Dashboard';
        $description = 'Selamat datang di Sistem Informasi perpustakaan sederhana.';
        $totalBooks = 5;
        $totalMembers = 5;
        $totalCategories = 5;
        return view('dashboard.index', compact(
            'title',
            'description',
            'totalBooks',
            'totalMembers',
            'totalCategories'
        ));
    }
}
