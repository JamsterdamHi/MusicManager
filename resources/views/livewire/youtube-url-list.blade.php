<div class="form-group">
    <label for="demo">
        試聴用URL
    </label>


    <button wire:click="getYoutubeUrl" type="button">GET URL</button>

    <table>
        <tr>
            <th>曲名</th>
            <th>YouTube URL</th>
        </tr>

        @foreach ($youtube as $youtube)
        <tr>
            <td>
                <a href="">
                    {{$youtube[0]}}
                </a>
            </td>
            <td>{{ $youtube[1]['title'] }}</td>
        </tr>
        @endforeach

    </table>
    <button wire:click="load">もっと読み込む</button>


    <input type="text" class="form-control" id="youtube_url" name="youtube_url" value="{{ old('youtube_url') }}" placeholder="URL">
</div>
