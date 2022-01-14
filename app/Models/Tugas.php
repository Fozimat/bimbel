<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    use HasFactory;
    protected $table = 'tugas';
    protected $guarded = '';
    protected $casts = [
        'batas_pengantaran' => 'datetime',
    ];

    public function mapel()
    {
        return $this->belongsTo(Mapel::class, 'id_mapel', 'id');
    }

    public function tingkat()
    {
        return $this->belongsTo(Tingkat::class, 'id_tingkat', 'id');
    }

    public function jawaban()
    {
        return $this->hasOne(Jawaban::class, 'id_tugas', 'id');
    }
}
