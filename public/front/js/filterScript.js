



$(document).ready(function(){


    $('select').niceSelect();

    new WOW().init();

    $('.ser').each(function(){

        $(this).click(function(e){
            e.stopPropagation()
        })
    
        })
    

})