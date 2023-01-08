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
            $table->string('name', 50)->index()->comment('曲名');
            $table->string('artist_name', 50)->comment('アーティスト名');
            $table->string('youtube_url')->nullable()->comment('試聴用URL');
            $table->foreignId('genre_id')->constrained('genres');
            $table->foreignId('mood_id')->constrained('moods');
            $table->foreignId('user_id')->constrained('users');
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
