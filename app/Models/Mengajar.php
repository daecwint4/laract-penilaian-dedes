<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mengajar extends Model
{
    use HasFactory;

    protected $table = 'mengajars';
    protected $guarded = ['id'];
    protected $primaryKey ='id';

    public function guru()
    {
        return $this->belongsTo(Guru::class, 'guru_id', 'id');
    }
    public function mapel()
    {
        return $this->belongsTo(Mapel::class, 'mapel_id', 'id');
    }
    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id', 'id');
    }
}
