<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tingkat extends Model
{
    use HasFactory;
    protected $table = 'tingkat';
    protected $fillable = ['tingkat'];

    public function materi()
    {
        return $this->hasMany(Materi::class, 'id_mapel', 'id');
    }

    public function tugas()
    {
        return $this->hasMany(Tugas::class, 'id_tingkat', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_tingkat', 'id');
    }
}
