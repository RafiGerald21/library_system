@extends('layouts.app')
@section('title', 'Login Sistem Perpustakaan')

@section('content')
    <div style="max-width: 350px; margin: 40px auto; padding: 20px; border: 1px solid #ccc; border-radius: 5px;">
        <h2>Login Sistem Perpustakaan</h2>

        <!-- Menampilkan Pesan Kesalahan Global -->
        @if ($errors->any())
            <div style="color: red; margin-bottom: 15px; font-size: 14px;">
                @foreach ($errors->all() as $error)
                    <p style="margin: 0;">{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form action="{{ route('login.submit') }}" method="POST">
            @csrf
            
            <div style="margin-bottom: 15px;">
                <label for="email">Email:</label><br>
                <input 
                    type="email" 
                    name="email" 
                    id="email" 
                    value="{{ old('email') }}" 
                    style="width: 100%; padding: 6px; box-sizing: border-box;" 
                    required
                >
            </div>

            <div style="margin-bottom: 15px;">
                <label for="password">Password:</label><br>
                <input 
                    type="password" 
                    name="password" 
                    id="password" 
                    style="width: 100%; padding: 6px; box-sizing: border-box;" 
                    required
                >
            </div>

            <button 
                type="submit" 
                style="width: 100%; padding: 8px; background-color: #001f3f; color: white; border: none; cursor: pointer;"
            >
                Login
            </button>
        </form>
    </div>
@endsection