<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Playlist;
use App\Models\Genre;
use App\Models\Mood;
use App\Models\User;
use Kyslik\ColumnSortable\Sortable;

class Song extends Model
{
    use HasFactory;

    use Sortable;

    public function playlists()
    {
        return $this->belongsToMany(Playlist::class);
    }

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    public function mood()
    {
        return $this->belongsTo(Mood::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $fillable = [
        'name',
        'youtube_url',
        'artist_name',
        'genre_id',
        'mood_id',
        'user_id',
    ];

    /**
     * 検索機能 ローカルスコープ
     *
     * @param [type] $query
     * @param [type] $search
     * @return void
     */
    public function scopeSearch($query, $search)
    {
        if($search !== null){
            $searchConversion = mb_convert_kana($search, 's'); // 全角スペースを半角
            $wordArraySearched = preg_split('/[\s,]+/', $searchConversion, -1, PREG_SPLIT_NO_EMPTY); // 空白で区切る
            foreach( $wordArraySearched as $value){
                $query->where('name', 'like', '%' .$value. '%')->orWhere('artist_name', 'like', '%' .$value. '%');
            }
        }
        // dd($search);
        return $query;
    }


    public $sortable = [
        'name',
        'artist_name',
        'genre_id',
        'mood_id'
    ];

}
