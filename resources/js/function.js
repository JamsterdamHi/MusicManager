// -- ドラッグ＆ドロップ --
$(function () {
    $("#sort").sortable({
        update: function () {
            var inOrder = [];
            var playlist_song_ids = [];
            var playlist_id = 0;
            $(".inOrder").each(function (i,element) {
                inOrder.push(element.value);
                playlist_id = $(this).data('playlist-id');
                playlist_song_ids.push($(this).data('playlist-song-id'));
            });
            console.log(inOrder);

        // -- 並び替えしたsong_idsとseqsデータをajax通信 --
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type: "post", //HTTP通信の種類
                url:"/playlist/"+playlist_id+"/replace", //通信したいURL
                dataType: 'json',
                data:{
                    playlist_song_ids : playlist_song_ids,
                    seqs : inOrder
                }
            })
            //通信が成功したとき
            .done((res)=>{
                console.log('成功')
            })
            //通信が失敗したとき
            .fail((error)=>{
                console.log(error.statusText)
            })
        }
    });
});

// -- 確認メッセージ --
function deletePost(e){
    'use strict'
    if (confirm('本当に削除しますか？')) {
        document.getElementById('delete_' + e.dataset.id).submit()
    }
}