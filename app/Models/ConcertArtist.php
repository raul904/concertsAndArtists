<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConcertArtist extends Model
{
    protected $table = 'concert_artists';
    protected $primaryKey = null;
    public $incrementing = false;
    public $timestamps = true;

    protected $fillable = [
        'concert_id',
        'artist_id',
    ];

    public function concerts()
    {
        return $this->belongsTo(Concert::class, 'concert_id');
    }

    public function artists()
    {
        return $this->belongsTo(Artist::class, 'artist_id');
    }

}
