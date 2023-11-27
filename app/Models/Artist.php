<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'genre',
        'description',
        'band',
    ];


    public function concerts()
    {
        return $this->belongsToMany(Concert::class, 'concert_artists');
    }
}
