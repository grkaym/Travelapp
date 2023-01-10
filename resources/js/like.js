$(function()
{
    // クリックでlike
    $('.like').on('click', function() {
        ajaxSendLike();
    });

    function ajaxSendLike() {
        var post_id = $('.post_id').val();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/ajax/like/' + post_id,
            type: 'POST',
            processData: false,
            success: function() {
                $('.like').toggleClass('liked');
                console.log('ajax succeeded');
            },
            error: function() {
                console.log('ajax failed');
            }
        });
    } 
});