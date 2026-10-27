@extends('layouts.app')

@section('title', 'Daftar Produk')

@section('content')
<h1>Daftar Produk</h1>
<table border="1">
    <tr><th>No</th><th>Nama</th><th>Harga</th><th>Stok</th><th>Aksi</th></tr>
    @forelse ($produk as $p)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $p['nama'] }}</td>
        <td>Rp {{ number_format($p['harga'], 0, ',', '.') }}</td>
        <td>
            @if ($p['stok'] > 10) Aman
            @elseif ($p['stok'] > 0) Menipis
            @else Habis
            @endif
        </td>
        <td><a href="{{ route('produk.show', $p['id']) }}">Detail</a></td>
    </tr>
    @empty
    <tr><td colspan="5">Belum ada produk.</td></tr>
    @endforelse
</table>

<h2>Contoh Komponen Blade</h2>
<x-alert tipe="sukses">Data berhasil disimpan.</x-alert>
<x-harga-produk :nilai="$produk[0]['harga']" :diskon="true" />
<x-kartu>
    <x-slot:judul>Keyboard</x-slot:judul>
    Harga Rp 150.000
</x-kartu>
@endsection

@push('scripts')
<script>console.log('produk dimuat');</script>
@endpush