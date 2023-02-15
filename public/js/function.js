/*
 * ATTENTION: An "eval-source-map" devtool has been used.
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file with attached SourceMaps in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/function.js":
/*!**********************************!*\
  !*** ./resources/js/function.js ***!
\**********************************/
/***/ (() => {

                eval("//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbXSwibmFtZXMiOltdLCJtYXBwaW5ncyI6IiIsInNvdXJjZXNDb250ZW50IjpbIiJdLCJmaWxlIjoiLi9yZXNvdXJjZXMvanMvZnVuY3Rpb24uanMuanMiLCJzb3VyY2VSb290IjoiIn0=\n//# sourceURL=webpack-internal:///./resources/js/function.js\n");

                /***/
})

        /******/
});
/************************************************************************/
/******/
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/js/function.js"]();
    /******/
    /******/
})()
    ;

// -- ドラッグ＆ドロップ --
$(function () {
    $("#sort").sortable({
        update: function () {
            var inOrder = [];
            var playlist_song_ids = [];
            var playlist_id = 0;
            $(".inOrder").each(function (i, element) {
                inOrder.push(element.value);
                playlist_id = $(this).data('playlist-id');
                playlist_song_ids.push($(this).data('playlist-song-id'));
            });
            console.log(inOrder);

            // -- 並び替えしたsong_idsとseqsデータをajax通信 --
            $.ajax({
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                type: "post", //HTTP通信の種類
                url: "/playlist/" + playlist_id + "/replace", //通信したいURL
                dataType: 'json',
                data: {
                    playlist_song_ids: playlist_song_ids,
                    seqs: inOrder
                }
            })
                //通信が成功したとき
                .done((res) => {
                    console.log('成功')
                })
                //通信が失敗したとき
                .fail((error) => {
                    console.log(error.statusText)
                })
        }
    });
});

/*!
 * jQuery UI Touch Punch 0.2.3
 *
 * Copyright 2011–2014, Dave Furfero
 * Dual licensed under the MIT or GPL Version 2 licenses.
 *
 * Depends:
 *  jquery.ui.widget.js
 *  jquery.ui.mouse.js
 */
!function (a) { function f(a, b) { if (!(a.originalEvent.touches.length > 1)) { a.preventDefault(); var c = a.originalEvent.changedTouches[0], d = document.createEvent("MouseEvents"); d.initMouseEvent(b, !0, !0, window, 1, c.screenX, c.screenY, c.clientX, c.clientY, !1, !1, !1, !1, 0, null), a.target.dispatchEvent(d) } } if (a.support.touch = "ontouchend" in document, a.support.touch) { var e, b = a.ui.mouse.prototype, c = b._mouseInit, d = b._mouseDestroy; b._touchStart = function (a) { var b = this; !e && b._mouseCapture(a.originalEvent.changedTouches[0]) && (e = !0, b._touchMoved = !1, f(a, "mouseover"), f(a, "mousemove"), f(a, "mousedown")) }, b._touchMove = function (a) { e && (this._touchMoved = !0, f(a, "mousemove")) }, b._touchEnd = function (a) { e && (f(a, "mouseup"), f(a, "mouseout"), this._touchMoved || f(a, "click"), e = !1) }, b._mouseInit = function () { var b = this; b.element.bind({ touchstart: a.proxy(b, "_touchStart"), touchmove: a.proxy(b, "_touchMove"), touchend: a.proxy(b, "_touchEnd") }), c.call(b) }, b._mouseDestroy = function () { var b = this; b.element.unbind({ touchstart: a.proxy(b, "_touchStart"), touchmove: a.proxy(b, "_touchMove"), touchend: a.proxy(b, "_touchEnd") }), d.call(b) } } }(jQuery);

// -- 確認メッセージ --
function deletePost(e) {
    'use strict'
    if (confirm('本当に削除しますか？')) {
        document.getElementById('delete_' + e.dataset.id).submit()
    }
}
