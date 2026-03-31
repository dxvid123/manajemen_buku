<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('admin123'),
            'role' => 'admin',
        ]);

        User::factory()->create([
            'name' => 'Pengunjung',
            'email' => 'pengunjung@example.com',
            'password' => bcrypt('pengunjung123'),
            'role' => 'pengunjung',
        ]);

        // sample kategori & buku
        $kategori = \App\Models\Category::create(['nama_kategori' => 'Fiksi']);

        \App\Models\Book::create([
            'category_id' => $kategori->id,
            'judul' => 'Laskar Pelangi',
            'penulis' => 'Andrea Hirata',
            'tahun_terbit' => 2005,
            'stok' => 10,
            'sinopsis' => 'Kisah inspiratif anak-anak di Belitung',
        ]);

        \App\Models\Book::create([
            'category_id' => $kategori->id,
            'judul' => 'Bumi Manusia',
            'penulis' => 'Pramoedya Ananta Toer',
            'tahun_terbit' => 1980,
            'stok' => 8,
            'sinopsis' => 'Bagian pertama tetralogi Buru',
        ]);

        \App\Models\Book::create(['category_id' => $kategori->id, 'judul' => 'Sang Pemimpi', 'penulis' => 'Andrea Hirata', 'tahun_terbit' => 2006, 'stok' => 12, 'sinopsis' => 'Lanjutan perjalanan persahabatan di Belitung']);
        \App\Models\Book::create(['category_id' => $kategori->id, 'judul' => 'Ayat-Ayat Cinta', 'penulis' => 'Habiburrahman El Shirazy', 'tahun_terbit' => 2004, 'stok' => 6, 'sinopsis' => 'Romansa dan spiritual di Mesir']);
        \App\Models\Book::create(['category_id' => $kategori->id, 'judul' => 'Negeri 5 Menara', 'penulis' => 'A. Fuadi', 'tahun_terbit' => 2009, 'stok' => 9, 'sinopsis' => 'Semangat persahabatan di pesantren']);
        \App\Models\Book::create(['category_id' => $kategori->id, 'judul' => 'Lelaki Harimau', 'penulis' => 'Eka Kurniawan', 'tahun_terbit' => 2004, 'stok' => 5, 'sinopsis' => 'Magical realism dan konflik keluarga']);
        \App\Models\Book::create(['category_id' => $kategori->id, 'judul' => 'Supernova: Kesatria, Puteri dan Bintang Jatuh', 'penulis' => 'Dewi Lestari', 'tahun_terbit' => 2001, 'stok' => 7, 'sinopsis' => 'Fiksi ilmiah dan hubungan takdir']);
        \App\Models\Book::create(['category_id' => $kategori->id, 'judul' => 'Milea: Suara dari Dilan', 'penulis' => 'Pidi Baiq', 'tahun_terbit' => 2016, 'stok' => 13, 'sinopsis' => 'Cinta remaja era 90-an']);
        \App\Models\Book::create(['category_id' => $kategori->id, 'judul' => 'Tenggelamnya Kapal Van Der Wijck', 'penulis' => 'Hamka', 'tahun_terbit' => 1938, 'stok' => 4, 'sinopsis' => 'Tragedi cinta dan budaya Minang']);
        \App\Models\Book::create(['category_id' => $kategori->id, 'judul' => 'Laut Bercerita', 'penulis' => 'Leila S. Chudori', 'tahun_terbit' => 2019, 'stok' => 11, 'sinopsis' => 'Perjuangan politik dan keluarga di Indonesia']);
    }
}
