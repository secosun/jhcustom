(function($){
$(function() {
	$('#sdt_menu > li').bind('mouseenter',function(){
		
		var $elem = $(this);
		$elem.find('a').css('z-index','9999');
		$elem.find('img').stop(true).animate({
				'width':'100%',
				'height':'65px',
				'left':'0px'
			 },400,'easeOutBack').andSelf().find('.sdt_wrap').stop(true).animate({'top':'65px'},500,'easeOutBack').andSelf().find('.sdt_active').stop(true).animate({'height':'65px'},300,function(){
				$elem.find('.sdt_link').css("color","white");
				$elem.find('.sdt_descr').css("color","white");
				var $sub_menu = $elem.find('.sdt_box');
				if($sub_menu.length){
					var left = '65px';
					if($elem.parent().children().length == $elem.index()+1)
						left = '-65px';
					$sub_menu.show().animate({'left':left},200);
				}	
		});
		
	}).bind('mouseleave',function(){
		var $elem = $(this);
		$elem.find('.sdt_link').css("color","");
		$elem.find('.sdt_descr').css("color","");
		$elem.find('a').css('z-index','12');
		var $sub_menu = $elem.find('.sdt_box');
		
		if($sub_menu.length)
			
			$sub_menu.hide().css('left','0px');
			
			$elem.find('.sdt_active').stop(true).animate({'height':'0px'},300).andSelf().find('img').stop(true).animate({
				'width':'0px',
				'height':'0px',
				'left':'65px'},400).andSelf().find('.sdt_wrap').stop(true).animate({'top':'0px'},500);
	});
	
});
})(jQuery);