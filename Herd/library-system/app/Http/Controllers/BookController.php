<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = [
            ['title' => 'Pemrograman PHP', 'author' => 'Billy Ibrahim Hasbi', 'year' => 2026],
            ['title' => 'Algoritma Struktur Data', 'author' => 'Taufik Hidayat', 'year' => 2025],
            ['title' => 'Cloud Computing', 'author' => 'Agung Susilo Yuda Irawan', 'year' => 2026],
            ['title' => 'Pengantar Blockchain untuk Bisnis', 'author' => 'Ahmad  Khusaeri', 'year' => 2026],
            ['title' => 'Pengantar Kecerdasan Buatan', 'author' => 'Irfan Sriyono Putro', 'year' => 2026],
        ];
        return view('books.index', compact('books'));
    }
    public function show($id)
    {
        return view('books.show', compact('id'));
    }
}
