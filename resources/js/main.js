$(function()
{
    //+--------------------------------+
    //| place 日付切り替え
    //+--------------------------------+
    const selected  = 'day__button--selected';
    var button      = $('.js_day');
    var place       = $('.place')

    //ロード時は１日目をselected
    button.first().addClass(selected);

    // selectedな日以外を非表示
    place.map(function() {
        if($(this).data('day') !== 1) {
            $(this).addClass('invisible');
        }
    });

    //クリックで日付を切り替え
    button.on('click', function() {
        var day = $('#selectedDay');
        day.val($(this).find('.today').val());

        //ボタンの見た目を変える
        button.removeClass(selected);
        $(this).addClass(selected);

        //表示する場所を切り替え
        place.each(function() {
            if($(this).data('day') != day.val()) {
                $(this).addClass('invisible');
            }else {
                $(this).removeClass('invisible');
            }
        }); 
    });
    
    //+---------------------------------------------+
    //| edit ファイルアップロードのときのファイル名出す
    //+---------------------------------------------+
    $('.place__button--select').on('change', function() {
        var file = $(this).prop('files')[0];
        $(this).parents('.place__image').find('.file-name').text(file.name);

        //同時に送信ボタンを出現させる
        $(this).parents('.place__image').find('.place__button--send').removeClass('invisible');
    });

    //+--------------------+
    //| create 文字数カウント
    //+--------------------+
    var title_form = $('.forms__table--title');
    var description_form = $('.forms__table--description');
    var address_form = $('.forms__table--address');

    $('.forms').on('keyup', function() {
        $('.title-count').text(title_form.val().length + "/30");
        $('.description-count').text(description_form.val().length + "/500");
        $('.address-count').text(address_form.val().length + "/80");
    });

    //+------------------------------+
    //| edit 日数追加時のconfirm
    //+------------------------------+
    $('.day__button--add').on('click', function(e) {
        if(!confirm('日数を追加しますか？')) {
            e.preventDefault();
        }
    });

    $('.day__button--remove').on('click', function(e) {
        if(!confirm('日数を減らしますか？')) {
            e.preventDefault();
        }
    });

    //+------------------------------+
    //| search　空欄の時無効
    //+------------------------------+
    var search_form     = $('.header__search-text');
    var search_button   = $('.header__search-button');

    search_button.on('click', function(e) {
        if(search_form.val() === "") {
            e.preventDefault();
        }
    });
});