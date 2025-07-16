<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BukuTamu extends Model
{
    use HasFactory;

    protected $table = 'buku_tamu';
    
    protected $fillable = [
        'nama_lengkap',
        'alamat',
        'no_telepon',
        'email',
        'jenis_kelamin',
        'gereja_asal',
        'jenis_ibadah',
        'keterangan'
    ];

    protected $dates = ['created_at', 'updated_at'];

    // Scope untuk pencarian
    public function scopeSearch($query, $term)
    {
        return $query->where('nama_lengkap', 'like', "%{$term}%")
                    ->orWhere('alamat', 'like', "%{$term}%")
                    ->orWhere('no_telepon', 'like', "%{$term}%")
                    ->orWhere('email', 'like', "%{$term}%")
                    ->orWhere('gereja_asal', 'like', "%{$term}%");
    }
}