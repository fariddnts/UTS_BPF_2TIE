<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portofolio extends Model
{
    protected $table = 'Portofolio_1065';

    protected $fillable = [
        'nama', 'tempat_tanggal_lahir', 'jenis_kelamin', 'alamat',
        'telepon', 'email', 'instagram', 'github', 'foto',
        'tentang', 'kemampuan', 'pendidikan', 'pengalaman', 'proyek',
    ];

    // Ubah teks "satu baris = satu data" (format: teks | keterangan) menjadi array
    public function daftar(string $field): array
    {
        $hasil = [];
        foreach (preg_split('/\r\n|\r|\n/', (string) $this->$field) as $baris) {
            $baris = trim($baris);
            if ($baris === '') {
                continue;
            }
            $bagian = array_map('trim', explode('|', $baris, 2));
            $hasil[] = ['teks' => $bagian[0], 'ket' => $bagian[1] ?? ''];
        }
        return $hasil;
    }
}
