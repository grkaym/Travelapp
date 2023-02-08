import { each } from 'jquery';
import 'slick-carousel';
$(function()
{
    var slider = $('.js_slick');
    slider.slick({
        'arrows' : false,
        'dots' : true,
        'autoplay' : false,
        'infinite' : true,
    });

    var button = $('input[name="day_button"]');
    $(document).on("click", button, function() {
        slider.slick('setPosition');
    });
});