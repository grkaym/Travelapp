$(function()
{
    // タイムラインの無限スクロール
    // 一番下の投稿が画面の下部に出現したくらいで更に２０件を読み込み、表示

    // 非同期通信が終了するまで次の処理をしない
    let loadFlag = false;
    $(window).on('scroll', function() {
        const targetTop = $('.js-post').last().offset().top;  //一番下の要素
        const scroll = $(window).scrollTop();   //スクロールした幅
        const windowHeight = $(window).height();//Windowの幅
        if(scroll + windowHeight > targetTop) {
            ajaxAddContent();
        }
    });

    function ajaxAddContent() {
        // 処理中なら中止
        if(!loadFlag) {
            loadFlag = true;
        }else {
            return;
        }
        // 表示中の投稿数を監視
        let count = $('#count').val();
        $.ajax({
            headers: {
                // csrf対策
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/ajax/addContent',
            type: 'POST',
            data: {count: count} ,
            success: function(data) {
                loadFlag = false;
                // 取得した投稿数を加算してセット
                count = parseInt(count) + 20;
                $('#count').val(count);

                // 受け取った投稿を表示する            
                $('.js-post').last().append(data);

                console.log(count);
                console.log(data);
                console.log('ajax succeeded!');
            },
            error: function() {
                console.log('ajax failed.');
            }
        })
    }
});