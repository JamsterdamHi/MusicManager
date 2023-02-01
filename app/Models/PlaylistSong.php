<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class PlaylistSong extends Pivot
{
    protected $fillable = [
        'seq',
        'note',
        'song_id',
        'playlist_id',
    ];
}
