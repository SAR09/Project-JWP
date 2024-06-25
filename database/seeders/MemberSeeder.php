<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Member;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Buat data dummy untuk tabel member
        Member::create([
            'nama' => 'John Doe',
            'telp' => '123456789',
            'tglmulai' => '2024-01-01',
            'tglakhir' => '2024-12-31',
            'fotokartu' => 'john_doe.jpg',
        ]);

    
        // Tambahkan data lainnya sesuai kebutuhan Anda
    }
}
