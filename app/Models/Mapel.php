<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    use HasFactory;
    protected $table = 'mapel';
    protected $fillable = ['nama_mapel'];

    public function materi()
    {
        return $this->hasMany(Materi::class, 'id_mapel', 'id');
    }

    public function tugas()
    {
        return $this->hasMany(Tugas::class, 'id_mapel', 'id');
    }
}
