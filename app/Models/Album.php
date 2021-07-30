<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    protected $table = "album";

    protected $primaryKey = 'album_id';
    protected $fillable = ['album_name','album_artist_id'];

    public function artist()
    {
        return $this->belongsTo(Artist::class, 'album_artist_id');
    }

    public function track() 
    {
        return $this->hasMany(Track::class);
    }

}
