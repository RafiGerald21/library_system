@extends('layouts.app')
@section('title', 'Edit Buku')

@section('content')
    <h2>Edit Data Buku</h2>
    
    <!-- Form mengarah ke route 'books.update' dengan menyisipkan parameter objek buku ($book) -->
    <form action="{{ route('books.update', $book) }}" method="POST" style="max-width: 400px;">
        @csrf
        <!-- Mengubah HTTP method dasar POST menjadi PUT untuk proses update (syarat standar RESTful Laravel) -->
        @method('PUT')
        
        <div style="margin-bottom: 10px;">
            <label>Judul Buku:</label><br>
            <!-- value="..." digunakan untuk me-render data lama ke dalam kotak input -->
            <input type="text" name="title" value="{{ $book->title }}" required style="width: 100%;">
        </div>
        
        <div style="margin-bottom: 10px;">
            <label>Penulis:</label><br>
            <input type="text" name="author" value="{{ $book->author }}" required style="width: 100%;">
        </div>
        
        <div style="margin-bottom: 10px;">
            <label>Tahun Terbit:</label><br>
            <input type="number" name="year" value="{{ $book->year }}" required style="width: 100%;">
        </div>
        
        <div style="margin-bottom: 20px;">
            <label>Stok:</label><br>
            <input type="number" name="stock" value="{{ $book->stock }}" required style="width: 100%;">
        </div>
        
        <button type="submit" style="padding: 5px 15px; background-color: #ff9800; color: white; border: none; cursor: pointer;">
            Perbarui Data
        </button>
        <a href="{{ route('books.index') }}" style="margin-left: 10px; text-decoration: none;">Batal</a>
    </form>
@endsection