<?php

namespace App\Http\Vender;

use Google_Client;
use Google_Service_YouTube;
use PSpell\Config;

class CallYoutubeApi
{
    private $key = config('youtube.youtube-api');
    private $client;
    private $youtube;

    public function __construct()
    {
        $this->client = new Google_Client();
        $this->client->setDeveloperKey($this->key);
        $this->youtube = new Google_Service_YouTube($this->client);
    }

    /**
     * /v3/searchを呼び出す
     *
     * @param string $searchWord
     * @return array
     */
    public function searchList(String $searchWord)
    {
        $r = $this->youtube->search->listSearch('id', array(
            'q' => $searchWord,
            'maxResults' => 10,
            'order' => 'viewCount',
        ));

        return $r->items;
    }

    /**
     * /v3/videosを呼び出す
     *
     * @param string $id
     * @return array
     */
    public function videosList(String $id)
    {
        $r = $this->youtube->videos->listVideos('statistics,snippet', array(
            'id' => $id,
        ));

        return $r->items;
    }
}
