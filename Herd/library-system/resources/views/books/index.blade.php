@extends('layouts.app')

@section('title', 'Daftar Buku')

@section('content')
    <h2>Daftar Buku</h2>
    <ul>
        @foreach($books as $book)
            <li>
                {{ $book->title }} — {{ $book->author }} ({{ $book->year }}) — Stok: {{ $book->stock }}
            </li>
        @endforeach
    </ul>

<div style="margin-bottom: 15px;">
        <a href="{{ route('books.create') }}" style="padding: 5px 10px; background-color: #001329; color: white; text-decoration: none;">+ Tambah Buku Baru</a>
    </div>

                    <!-- Tautan Detail & Edit sebelumnya -->
                    <a href="{{ route('books.show', $book) }}">Detail</a> |
                    <a href="{{ route('books.edit', $book) }}" style="color: #ff9800;">Edit</a> |

    <!-- Tombol Hapus dengan metode terisolasi -->
    <form action="{{ route('books.destroy', $book) }}" method="POST" style="display:inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus buku ini?');">
        @csrf
        @method('DELETE')
        <button type="submit" style="color: red; background: none; border: none; padding: 0; cursor: pointer; text-decoration: underline;">
            Hapus
        </button>
    </form>
</td>
    </div>

    
    <table border="1" cellpadding="10" cellspacing="0" style="width: 100%; text-align: left; border-collapse: collapse;"></table>
@endsection