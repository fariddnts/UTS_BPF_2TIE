<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biodata1065 extends Model
{
    use HasFactory;

    // Menentukan nama tabel sesuai ketentuan NIM
    protected $table = 'biodata_1065';

    // Primary key default adalah id
    protected $primaryKey = 'id';

    // Kolom-kolom yang dapat diisi secara mass-assignment
    protected $fillable = [
        'nama',
        'nim',
        'jurusan',
        'tanggal_lahir',
        'gender',
        'email',
        'alamat',
        'foto_profil',
    ];
}
