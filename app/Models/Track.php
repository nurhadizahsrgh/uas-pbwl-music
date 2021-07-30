<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    use HasFactory;

    protected $table = "track";

    protected $primaryKey = 'track_id';
    protected $fillable = ['track_name','artist_id', 'album_id', 'file'];

    public function artist()
    {
        return $this->belongsTo(Artist::class, 'artist_id');
    }

    public function album()
    {
        return $this->belongsTo(Album::class, 'album_id');
    }

    public function played() 
    {
        return $this->hasMany(Played::class);
    }
}
