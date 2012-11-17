(function($){
         $.fn.scrollMenu = function(){
                   if($(window).scrollTop() == "0"){
                            $(this).css('position','fixed');
                            $(this).fadeIn("fast");
                   }
                   var scrollDiv = $(this);
                   $(window).scroll(function(){
                            if($(window).scrollTop() == "0"){
                                      $(this).css('position','fixed');
                                      $(this).fadeIn("fast");
                            }else{
                                      $(scrollDiv).css('position','fixed');
                                      $(scrollDiv).fadeIn("fast");
                            }
                   });
         }
})(jQuery);

$("#wrapper2").scrollMenu();