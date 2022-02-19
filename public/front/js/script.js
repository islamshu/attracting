$(document).ready(function() {

    $(window).scroll(function() {

        if ($(this).scrollTop() > $('.carousel').offset().top) {
            console.log('yas')
            $('nav').addClass('fixed-top')

        } else {
            $('nav').removeClass('fixed-top')

        }



        let num = 0;
        if ($(window).scrollTop() >= $('.statistic').offset().top - 200) {


            setInterval(function() {
                $('.statistic-item  h3').each(function() {

                    if ($(this).text() < $(this).data('scroll')) {
                        num++;
                        $(this).text(num);
                    } else {
                        $(this).text($(this).data('scroll'));
                    }


                });

            }, 20)
        }





    })

    $('.collapse .navbar-nav li ').click(function() {

        console.log($('#' + $(this).data("link")).offset().top + 1);

        $('html,body').animate({

            scrollTop: $('#' + $(this).data("link")).offset().top + 1

        }, 1000)


    })

    $('.collapse form').click(function() {
        location.href = 'filter.html'
    })


    new WOW().init();
    // $(window).on("load", function() {
    //     $('.wrapper-cover').fadeOut("slow")
    // })

});