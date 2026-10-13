@extends('layouts.app')
@section('title', 'Tambah Buku Baru')

@section('content')
    <h2>Tambah Data Buku Pergerakan</h2>
    
    <!-- Form mengarah ke route 'books.store' menggunakan method POST -->
    <form action="{{ route('books.store') }}" method="POST" style="max-width: 400px;">
        <!-- Wajib menambahkan @csrf untuk keamanan dari serangan Cross-Site Request Forgery -->
        @csrf
        
        <div style="margin-bottom: 10px;">
            <label>Judul Buku:</label><br>
            <input type="text" name="title" required style="width: 100%;">
        </div>
        
        <div style="margin-bottom: 10px;">
            <label>Penulis:</label><br>
            <input type="text" name="author" required style="width: 100%;">
        </div>
        
        <div style="margin-bottom: 10px;">
            <label>Tahun Terbit:</label><br>
            <input type="number" name="year" required style="width: 100%;">
        </div>
        
        <div style="margin-bottom: 20px;">
            <label>Stok:</label><br>
            <input type="number" name="stock" required style="width: 100%;">
        </div>
        
        <button type="submit" style="padding: 5px 15px; background-color: #4CAF50; color: white; border: none; cursor: pointer;">
            Simpan Buku
        </button>
        <a href="{{ route('books.index') }}" style="margin-left: 10px; text-decoration: none;">Batal</a>
    </form>
@endsection