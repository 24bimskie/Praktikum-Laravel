@extends('layouts.app')

@section('title', 'Daftar Mahasiswa')

@push('styles')
<style>
    .alert { padding: 8px; margin: 10px 0; border: 1px solid; }
    .alert-bahaya { background: #f8d7da; color: #842029; }
</style>
@endpush

@section('content')
<h1>Daftar Mahasiswa</h1>

@if (collect($mahasiswa)->contains(fn ($m) => $m['ipk'] < 2.0))
    <x-alert tipe="bahaya">Peringatan: ada mahasiswa dengan IPK di bawah 2,0.</x-alert>
@endif

<table border="1">
    <tr><th>No</th><th>Nama</th><th>NIM</th><th>IPK</th><th>Keterangan</th><th>Aksi</th></tr>
    @forelse ($mahasiswa as $m)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $m['nama'] }}</td>
        <td>{{ $m['nim'] }}</td>
        <td>{{ $m['ipk'] }}</td>
        <td>
            @if ($m['ipk'] >= 3.5) Cum Laude
            @elseif ($m['ipk'] >= 3.0) Baik
            @else Perlu ditingkatkan
            @endif
        </td>
        <td><a href="{{ route('mahasiswa.detail', $m['nim']) }}">Detail</a></td>
    </tr>
    @empty
    <tr><td colspan="6">Belum ada data</td></tr>
    @endforelse
</table>
@endsection