@extends('layouts.app')
@section('title', 'Daftar Buku')

@section('content')
    <h2>Daftar Buku</h2>

    <!-- Daftar Buku menggunakan List -->
    <ul>
        @foreach ($books as $book)
            <li style="margin-bottom: 15px;">
                <!-- Menampilkan Data Buku -->
                <strong>{{ $book->title }}</strong> — {{ $book->author }} ({{ $book->year }}) — Stok: {{ $book->stock }}
                <br>
                <!-- Menampilkan Kategori dengan pemanggilan relasi -->
                <span style="color: #d35400; font-weight: bold;">
                    Kategori: {{ $book->category?->name ?? 'Belum ada kategori' }}
                </span>

                <!-- Tombol Aksi untuk masing-masing buku -->
                <div style="margin-top: 5px;">
                    <a href="{{ route('books.show', $book->id) }}">Detail</a> | 
                    <a href="{{ route('books.edit', $book->id) }}" style="color: orange;">Edit</a> | 
                    
                    <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Yakin ingin menghapus buku ini?')" style="background: none; border: none; color: red; text-decoration: underline; cursor: pointer; padding: 0;">
                            Hapus
                        </button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>

    <!-- Tombol Tambah Buku Baru -->
    <a href="{{ route('books.create') }}" style="text-decoration: none;">
        <button style="padding: 8px 15px; background-color: #001f3f; color: white; border: none; cursor: pointer; margin-top: 10px;">
            + Tambah Buku Baru
        </button>
    </a>
@endsection