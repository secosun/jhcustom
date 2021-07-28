
               function HoverProcess() {
              // alert('HoverProcess');
               // jQuery('div');
                 jQuery('.temphol').hover(
                     function() {
                         jQuery(this).children('.front').stop().animate({ 'top' : '5%','height':'0'}, 500);
                          //$(this).children('.front').attr('z-index','-1788888');
                 }, 
                   function() {
                          jQuery(this).children('.front').stop().animate({ 'top' : '5%','height':'95%'}, 300);
                 }
                 );
                } 