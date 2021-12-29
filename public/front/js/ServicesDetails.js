




  $(document).ready(function () {
      

        
      $('.thumbnials img').click(function () {

              $(this).addClass('selected').siblings().removeClass('selected');

              $('.img-mian img').hide().attr('src', $(this).attr('src')).fadeIn(500)

              })

              var numOfThumb = $('.thumbnials').children().length,

              MargenBitwenThumb = "1",
              TotalMargen = (numOfThumb - 1) * MargenBitwenThumb,
              ThumbWidth = (100 - TotalMargen) / numOfThumb;
              console.log(ThumbWidth)
              $('.thumbnials img').css({
              'width': ThumbWidth + "%",
              'margin-right': MargenBitwenThumb + "%"
              })


              $('.img-mian span:last-of-type').click(function () {

              if ($('.thumbnials .selected').is(":last-child")) {

                  $('.thumbnials img').eq(0).click()
              } else {
                  $('.thumbnials .selected').next().click()
              }
              })

              $('.img-mian span:first-of-type').click(function () {

              if ($('.thumbnials .selected').is(":first-child")) {
                  $('.thumbnials img:last').click()

              } else {

              $('.thumbnials .selected').prev().click()
              }
              })


              new WOW().init();




              $('.img-mian .save2').each(function(){
                $(this).click(function(e){
                    e.stopPropagation()
                    e.preventDefault()
                    $(this).children().toggleClass('far')
                    $(this).children().toggleClass('fas')
                    
                })
            })

            });