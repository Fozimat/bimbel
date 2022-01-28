<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jawaban extends Model
{
    use HasFactory;
    protected $table = 'jawaban';
    protected $guarded = '';

    public function tugas()
    {
        return $this->belongsTo(Jawaban::class, 'id_tugas', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_siswa', 'id');
    }

    // public function mapel()
    // {
    //     return $this->hasManyThrough(Jawaban::class, Tugas::class, 'id_tugas', 'id_tugas');
    // }
}
