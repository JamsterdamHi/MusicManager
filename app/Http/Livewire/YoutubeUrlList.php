<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Http\Vender\CallYoutubeApi;

class YoutubeUrlList extends Component
{
    public function getYoutubeUrl(){
        // YOUTUBEのURLを取得
        $t = new CallYoutubeApi();
        $searchList = $t->searchList("The Be");

        foreach ($searchList as $result) {
            // \Log::channel('daily')->info((array)$result);

            $videosList = $t->videosList($result->id->videoId);
            // dd($videosList);

            $url = "https://www.youtube.com/watch?v=" . $videosList[0]['id'];
            $youtube[] = array($url, $videosList[0]['snippet'], $videosList[0]['statistics']);

            // dd($youtube);

        }
    }

    public function render()
    {
        return view('livewire.youtube-url-list', compact('youtube'));
    }
}
