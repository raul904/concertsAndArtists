<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Concert extends Model
{
    use HasFactory;

    public function artists()
    {
        return $this->belongsToMany(Artist::class, 'concert_artists');
    }

    public static function destroyWithoutWhere($id)
    {
        return static::query()->whereKey($id)->delete();
    }
}
