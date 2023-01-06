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

        console.log(day.val());

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
        $('.file-name').text(file.name);

        //同時に送信ボタンを出現させる
        $('.place__button--send').removeClass('invisible');
    });

    //+--------------------+
    //| create 文字数カウント
    //+--------------------+
    var title_form = $('.forms__table--title');
    var description_form = $('.forms__table--description');

    $('.title-count').text(title_form.val().length + "/30");
    $('.description-count').text(description_form.val().length + "/500");

    $('.forms').on('keyup', function() {
        $('.title-count').text(title_form.val().length + "/30");
        $('.description-count').text(description_form.val().length + "/500");
    });

});