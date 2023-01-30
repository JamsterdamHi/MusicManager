<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlaylistSongTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('playlist_song', function (Blueprint $table) {
            $table->id();
            $table->integer('seq')->comment('曲順');
            $table->string('note')->nullable()->comment('コメント');
            $table->foreignId('song_id')->constrained('songs')->onDelete('cascade')->comment('曲ID');
            $table->foreignId('playlist_id')->constrained('playlists')->onDelete('cascade')->comment('プレイリストID');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('playlist_song');
    }
}
