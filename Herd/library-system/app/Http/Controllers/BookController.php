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

    // STORE: Menyimpan Data Buku Baru ke Database beserta Validasi
    public function store(Request $request)
    {
        $validated = $request->validate([
            // Tambahan rule: unique:books,title (mencegah judul ganda)
            'title' => 'required|string|max:255|unique:books,title',
            'author' => 'required|string|max:255',
            // Tambahan rule: digits:4 (memaksa tahun harus 4 digit) dan max:2027
            'year' => 'required|integer|digits:4|min:1900|max:2027',
            'stock' => 'required|integer|min:0',
        ]);

        Book::create($validated);

        return redirect()->route('books.index')->with('success', 'Buku berhasil ditambahkan!');
    }

    // READ DETAIL: Menampilkan Detail 1 Buku
    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    // EDIT: Menampilkan Form Edit Buku (Ditambahkan)
    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    // UPDATE: Menyimpan Perubahan Data Buku beserta Validasi (Ditambahkan)
    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            // Pengecualian rule unique untuk ID buku yang sedang diedit
            'title' => 'required|string|max:255|unique:books,title,' . $book->id,
            'author' => 'required|string|max:255',
            'year' => 'required|integer|digits:4|min:1900|max:2027',
            'stock' => 'required|integer|min:0',
        ]);

        $book->update($validated);

        return redirect()->route('books.index')->with('success', 'Buku berhasil diperbarui!');
    }

    // DELETE: Menghapus Data Buku dari Database
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Buku berhasil dihapus!');
    }
}