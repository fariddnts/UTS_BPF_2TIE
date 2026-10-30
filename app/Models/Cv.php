<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cv extends Model
{
    protected $fillable = [
        'nama', 'email', 'telepon', 'alamat',
        'tentang', 'pendidikan', 'pengalaman', 'skill',
    ];
}
