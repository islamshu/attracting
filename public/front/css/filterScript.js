



$(document).ready(function(){


    $('select').niceSelect();

    new WOW().init();

    $('.ser').each(function(){

        $(this).click(function(e){
            e.stopPropagation()
        })
    
        })
    




    $('#slider-range').slider({
        range: true,
        min: 300,
        max: 1000,
        step: 1,
        values: [400, 700]
    });

    $('.ui-slider-range').append($('.range-wrapper'));

    $('.range').html('<span class="range-value"><sup>$</sup>' + $('#slider-range').slider("values", 0).toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") + '</span><span class="range-divider"></span><span class="range-value"><sup>$</sup>' + $("#slider-range").slider("values", 1).toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") + '</span>');



    $('#slider-range').slider({
        slide: function (event, ui) {


            $('.range').html('<span class="range-value"><sup>$</sup>' + ui.values[0].toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") + '</span><span class="range-divider"></span><span class="range-value"><sup>$</sup>' + ui.values[1].toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") + '</span>');

            var previousVal = parseInt($(this).data('value'));

            $(this).data({
                'value': parseInt(ui.value)
            });
        }
    });


    $('.range, .range-alert').on('mousedown', function (event) {
        event.stopPropagation();
    });

});

