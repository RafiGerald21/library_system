<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category; // Wajib di-import agar bisa memanggil tabel categories
use Illuminate\Http\Request;

class BookController extends Controller
{
    // READ: Menampilkan Daftar Buku
    public function index()
    {
        // Menggunakan Eager Loading (with) agar data kategori ikut terambil dengan cepat
        $books = Book::with('category')->get();
        return view('books.index', compact('books'));
    }

    // CREATE: Menampilkan Form Tambah Buku
    public function create()
    {
        // Mengambil semua data kategori diurutkan berdasarkan nama
        $categories = Category::orderBy('name')->get();
        return view('books.create', compact('categories'));
    }

    // STORE: Menyimpan Data Buku Baru ke Database beserta Validasi
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255|unique:books,title',
            'author' => 'required|string|max:255',
            'year' => 'required|integer|digits:4|min:1900|max:2027',
            'stock' => 'required|integer|min:0',
            // Validasi tambahan: memastikan id kategori yang dipilih ada di tabel categories
            'category_id' => 'required|exists:categories,id',
        ]);

        Book::create($validated);

        return redirect()->route('books.index')->with('success', 'Buku berhasil ditambahkan!');
    }

    // READ DETAIL: Menampilkan Detail 1 Buku
    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    // EDIT: Menampilkan Form Edit Buku
    public function edit(Book $book)
    {
        // Mengambil semua data kategori untuk ditampilkan di dropdown form edit
        $categories = Category::orderBy('name')->get();
        return view('books.edit', compact('book', 'categories'));
    }

    // UPDATE: Menyimpan Perubahan Data Buku beserta Validasi
    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255|unique:books,title,' . $book->id,
            'author' => 'required|string|max:255',
            'year' => 'required|integer|digits:4|min:1900|max:2027',
            'stock' => 'required|integer|min:0',
            // Validasi tambahan: memastikan id kategori yang dipilih ada di tabel categories
            'category_id' => 'required|exists:categories,id',
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