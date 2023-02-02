// -- ドラッグ＆ドロップ --
    $(function () {
        $("#sort").sortable({
            update: function () {
                $("#log").text($('#sort').sortable("toArray"));
                var i = 1;
                $(".in_order").each(function () {
                    var seq = $(this).val(i);
                    i++;
                });
            }
        });
    });

// -- 並び替えしたseqデータをajax通信で保存 --
    $(function(){
        $.ajax({
            type: "get", //HTTP通信の種類
            url:'/home', //通信したいURL
            dataType: 'json'
        })
        //通信が成功したとき
        .done((res)=>{
            console.log(res.message)
        })
        //通信が失敗したとき
        .fail((error)=>{
            console.log(error.statusText)
        })
    });

// -- 確認メッセージ --
    function deletePost(e){
        'use strict'
        if (confirm('本当に削除しますか？')) {
            document.getElementById('delete_' + e.dataset.id).submit()
        }
    }

