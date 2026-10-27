@extends('layouts.app')

@section('title', 'Detail Produk')

@section('content')
<h1>Detail Produk</h1>
<p>ID produk: {{ $id }}</p>
<a href="{{ route('produk.index') }}">Kembali</a>
@endsection