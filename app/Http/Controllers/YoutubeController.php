<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Vender\CallYoutubeApi;

class YoutubeController extends Controller
{
    public function index(Request $request)
    {
        $t = new CallYoutubeApi();
        $searchList = $t->searchList("The Be");

        foreach ($searchList as $result) {
            // \Log::channel('daily')->info((array)$result);

            $videosList = $t->videosList($result->id->videoId);
            // dd($videosList);

            $url = "https://www.youtube.com/watch?v=" . $videosList[0]['id'];
            $youtube[] = array($url, $videosList[0]['snippet'], $videosList[0]['statistics']);
        }

// dd($array);
        // \Log::channel('daily')->info($youtube);

        return view('youtube', compact('youtube'));
    }
}
