<?php

namespace App\Http\Controllers;

class MahasiswaController extends Controller
{
    private function dataMahasiswa(): array
    {
        return [
            ['nama' => 'Isaac', 'nim' => '2201001', 'ipk' => 3.75],
            ['nama' => 'Budi',  'nim' => '2201002', 'ipk' => 3.20],
            ['nama' => 'Citra', 'nim' => '2201003', 'ipk' => 3.55],
            ['nama' => 'Dewi',  'nim' => '2201004', 'ipk' => 2.80],
            ['nama' => 'Eko',   'nim' => '2201005', 'ipk' => 1.90],
        ];
    }

    // Latihan a
    public function profil()
    {
        return view('mahasiswa.profil', [
            'nama'  => 'Isaac',
            'nim'   => '2201001',
            'prodi' => 'Sistem Informasi',
        ]);
    }

    // Latihan b
    public function daftar()
    {
        $mahasiswa = $this->dataMahasiswa();

        return view('mahasiswa.daftar', compact('mahasiswa'));
    }

    // Latihan c
    public function detail($nim)
    {
        $m = collect($this->dataMahasiswa())->firstWhere('nim', $nim);

        abort_if(is_null($m), 404);

        return view('mahasiswa.detail', compact('m'));
    }
}