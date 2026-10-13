<?php

namespace App\Http\Controllers;

use App\Models\Book; // Wajib dipanggil untuk akses ke database
use Illuminate\Http\Request; // Wajib untuk menangani inputan form

class BookController extends Controller
{
    // READ: Menampilkan Daftar Buku
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    // CREATE: Menampilkan Form Tambah Buku
    public function create()
    {
        return view('books.create');
    }

    // STORE: Menyimpan Data Buku Baru ke Database
    public function store(Request $request)
    {
        Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'year' => $request->year,
            'stock' => $request->stock,
        ]);
        return redirect()->route('books.index');
    }

    // READ DETAIL: Menampilkan Detail 1 Buku
    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    // UPDATE: Menampilkan Form Edit Buku (Route Model Binding)
    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    // UPDATE: Menyimpan Perubahan Data Buku ke Database
    public function update(Request $request, Book $book)
    {
        $book->update([
            'title' => $request->title,
            'author' => $request->author,
            'year' => $request->year,
            'stock' => $request->stock,
        ]);
        return redirect()->route('books.index');
    }

    // DELETE: Menghapus Data Buku dari Database
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index');
    }
}