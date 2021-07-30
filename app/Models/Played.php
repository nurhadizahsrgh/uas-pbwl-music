<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Played extends Model
{
    use HasFactory;

    protected $table = "played";

    protected $primaryKey = 'played';

    protected $fillable = ['artist_id', 'album_id', 'track_id'];

    public function artist()
    {
        return $this->belongsTo(Artist::class, 'artist_id');
    }

    public function album()
    {
    	return $this->belongsTo(Album::class, 'album_id');
    }

    public function track()
    {
    	return $this->belongsTo(Track::class, 'track_id');
    }
}
