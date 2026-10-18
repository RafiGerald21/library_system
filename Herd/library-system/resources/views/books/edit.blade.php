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
            <!-- required dihapus, value menggunakan old() dengan fallback ke data database -->
            <input type="text" name="title" value="{{ old('title', $book->title) }}" style="width: 100%;">
            @error('title')
                <div style="color: red; font-size: 12px; margin-top: 4px;">{{ $message }}</div>
            @enderror
        </div>
        
        <div style="margin-bottom: 10px;">
            <label>Penulis:</label><br>
            <input type="text" name="author" value="{{ old('author', $book->author) }}" style="width: 100%;">
            @error('author')
                <div style="color: red; font-size: 12px; margin-top: 4px;">{{ $message }}</div>
            @enderror
        </div>
        
        <div style="margin-bottom: 10px;">
            <label>Tahun Terbit (4 digit):</label><br>
            <input type="number" name="year" value="{{ old('year', $book->year) }}" style="width: 100%;">
            @error('year')
                <div style="color: red; font-size: 12px; margin-top: 4px;">{{ $message }}</div>
            @enderror
        </div>
        
        <div style="margin-bottom: 20px;">
            <label>Stok:</label><br>
            <input type="number" name="stock" value="{{ old('stock', $book->stock) }}" style="width: 100%;">
            @error('stock')
                <div style="color: red; font-size: 12px; margin-top: 4px;">{{ $message }}</div>
            @enderror
        </div>
        
        <button type="submit" style="padding: 5px 15px; background-color: #ff9800; color: white; border: none; cursor: pointer;">
            Perbarui Data
        </button>
        <a href="{{ route('books.index') }}" style="margin-left: 10px; text-decoration: none;">Batal</a>
    </form>
@endsection