<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('songs', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100)->index()->comment('曲名');
            $table->string('artist_name', 100)->comment('アーティスト名');
            $table->string('youtube_url')->nullable()->comment('試聴用URL');
            $table->foreignId('genre_id')->constrained('genres')->comment('ジャンル');
            $table->foreignId('mood_id')->constrained('moods')->comment('ムード');
            $table->foreignId('user_id')->constrained('users')->comment('ユーザーID');
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
        Schema::dropIfExists('songs');
    }
}
