(function($){
             
          $(function(){
              if($("#toolbar-menu").length){
                 $("#JingHeUserNav").css("top","30px");
               }
			  if($.cookie('JHVEGE')!=undefined && $.cookie('JHVEGE')!='null'){
			     var str = new Base64().decode(decodeURIComponent($.cookie('JHVEGE')).split('&')[5].split('=')[1].split('.')[1]);
				 var user =$.parseJSON(str.substr(0,str.lastIndexOf("}")+1));
				 window.jhuser=user;
				 var id=user.sub;
				 var name =user.username;
                 $('.JingHeNav').html(' <ul class="JHUser links inline clearfix"><li class="menu-2 first"><span>您好:<a href="/user/' + id + '">' + name + '</a></span> </li> <li class="menu-15 last"> <a id="jhlogout" href="#">退出</a></li></ul>');				 
			     $('#JHOrder').attr('href','/user/' + id + '/orders/');
			  
			    $(".ownerTable").each(function(){
					  $("label",$(this)).each(function(index){
						   if(index%2 !=0){
							  //console.log($(this).text());
							  switch(index){
							   case 1:
							       $(this).text(user.boss_info.manager_name);
								   break;
							   case 3:
								   $(this).text(user.boss_info.shop_adress);
								   break;
							   case 5:
							        $(this).text(user.boss_info.shop_name);
								   break;
							   case 7:
							      $(this).text(user.boss_info.manager_phone);
								   break;
							   case 9:
								   $(this).text(user.boss_info.deliever_name);
								   break;
							  }
						   }
						  
					  });
				  });
			  
			  }
			  $("#jhlogout").click(function(){
				  //$.cookie('JHVEGE', null); //$.cookie('the_cookie', '', { expires: -1 }); 
				  //$.cookie('DRUPAL_ADMIN', null); 
				  $.removeCookie('JHVEGE',{ path: '/' });
				  $('.JingHeNav').html('<aside class="JHLogin"><a href="/user/login">登录</a>|<a href="/user/register">注册</a></aside>');
				  $('#JHOrder').attr('href','/user/0/orders/');
			  });  
              			  
          });
		   function slideByUserUp(event, obj) {
			   alert(obj.description);
			   event.stopPropagation();  
               obj.originalEvent.stopPropagation(); 
			   
		   }
		    function slideByUserDown(event, obj) {
			    alert(obj.description);
			    event.stopPropagation();  
                obj.originalEvent.stopPropagation();    
		   }
		   
     })(jQuery);


 window.addEventListener("onorientationchange" in window ? "orientationchange" : "resize", function() {
			   jQuery("ul.loaded").removeAttr("style");
			   jQuery("ul.loaded li").removeAttr("style");
			   if(document.location.pathname=="/"){
			   new GridScrollFx( document.getElementById( 'grid' ), {	viewportFactor : 0.4} );  
			   }
        if (window.orientation === 180 || window.orientation === 0) { 
          
        } 
        if (window.orientation === 90 || window.orientation === -90 ){ 
           
        }  
    }, false); 

(function($){
  $(document).ready(function(){
	if($("#container").muslider!=undefined){
		$("#container").muslider({
					"animation_type": "horizontal",
					"animation_duration": 600,
					"animation_start": "manual",
					"responsive": "yes",
					//"ratio":"maximum",
	                //"max_width":1074,
					//"max_height": 607
		});
	}
				
    $(".quantity-add").click(function(e){
        var count = 1;
        //var elemID = $(this).parent().attr("id");
        //var countField = $("#"+elemID+'inp');
        //var count = $("#"+elemID+'inp').val();
		 var count =  $('input',$(this).parent()).val();
		 if(isNaN(parseInt(count))){
           newcount=2;   
        }
        else if(parseInt(count)<1000){
           newcount = parseInt(count) + 1;
        }
		else{
		   newcount = parseInt(count);
		}
        
        //$("#"+elemID+'inp').val(newcount);
		$('input',$(this).parent()).val(newcount);
    });

    $(".quantity-remove").click(function(e){
        var count = 1;    
        //var elemID = $(this).parent().attr("id");
        //var countField = $("#"+elemID+'inp');
        //count = $("#"+elemID+'inp').val();
		count = $('input',$(this).parent()).val();
		 if(isNaN(parseInt(count))){
           newcount=1;   
        }
        else if(parseInt(count)>1){
           newcount = parseInt(count) - 1;
        }
		else{
		   newcount = parseInt(count);
		}
        //$("#"+elemID+'inp').val(newcount);
		$('input',$(this).parent()).val(newcount);
        
    });			
 });
})(jQuery);

(function($){
               $(function() {
                   $('.temphol').hover(
                     function() {
                          $(this).children('.front').stop().animate({ 'top' : '0','height':'0'}, 500);
                            }, 
                   function() {
                          $(this).children('.front').stop().animate({ 'top' : '0','height':'100%'}, 300);
                          }
                 );
                } );
				
				var lastClick;
				function alignText(){
				      if(undefined==document.querySelector('.JHComment'))
					       return;
				      var comments= document.querySelector('.JHComment').querySelectorAll( '.field-item.even' );
					  
					  function recoverInfo(eleClick){				                
					                var domain=$(eleClick).closest('ul').prev().find('.jh-text-ellipsis-domain')[0];
					                $(domain).children()[0].classList.add( 'jh-text-ellipsis-container');
									$(domain).children().children()[0].classList.add( 'jh-text-ellipsis' );
									$(domain).removeAttr("style");
									$(domain).parent().removeAttr("style");
									$(eleClick).closest('ul').removeAttr("style");
									$(eleClick).text("更多...");
					  }
					  if(lastClick!=undefined){
						 recoverInfo(lastClick);
					  }
					  for(var i=0, length=comments.length;i<length;i++){
					       var xmpl= comments[i];
						   var elementP = $(xmpl).closest(".jh-text-ellipsis-container");
						   var elementS = $(xmpl).closest(".jh-text-ellipsis-container").children(".field-item");
                           if (elementS.height() > elementP.height()) {
                                xmpl.classList.add( 'jh-text-ellipsis' ); 
                                if($(xmpl).closest('.content').next().children("li.readmorecomment").length==0)	{				
                                  $(xmpl).closest('.content').next().append( '<li class="comment-reply first last readmorecomment"><a href="#">更多...</a></li>' );								
                                }
						   }
						   else{
						        xmpl.classList.remove( 'jh-text-ellipsis' );
								$(xmpl).closest('.content').next().children("li.readmorecomment").remove();
							}
							
							
					      $(xmpl).closest('.content').next().unbind("click");
                          $(xmpl).closest('.content').next().click(function( evnt ){
						        evnt.preventDefault();
						        var domain=$(evnt.target).closest('ul').prev().find('.jh-text-ellipsis-domain')[0];
								var container=domain.querySelector( '.jh-text-ellipsis-container' );
			                    if (container) {
								    
									if(lastClick!=undefined){
									    recoverInfo(lastClick);
									}
								    lastClick=evnt.target;  
								
					                container.querySelector( '.jh-text-ellipsis' ).classList.remove( 'jh-text-ellipsis' );
								    container.classList.remove( 'jh-text-ellipsis-container');
									$(domain).css({"background-color":"white","position":"absolute","padding-bottom": "30px","width":$(container).width().toString(),"z-index":"999"});
									$(domain).parent().css({"height":$(container).height().toString()});
									$(evnt.target).closest('ul').css({"position":"absolute","z-index":"999","width":$(container).width().toString()});
									$(evnt.target).text("返回");
					             }	
				                 else{
								    recoverInfo(evnt.target);
				                  }
						});
					  }
					 
				}
				
				
				function appendTempComent(){
				        var comments = new Array();
					    if($.cookie('TempComment')!=undefined && $.cookie('TempComment')!='null'){
				            comments = JSON.parse($.cookie('TempComment')); 
							for(var i in comments){
                               //alert("src:"+comments[i].comment+"value:"+comments[i].cid);
							   var printvalue = true;
							   $(".JHComment > a").each(function(){    
  							      if($(this).attr("id")=="comment-" + comments[i].cid)                      
                                     printvalue=false;
                                });
								if(printvalue){
								   $(".JHComment").prepend(comentHtml(comments[i]));
								}
							    
                            }
				        }
						
				}
				
				function feachComment(e){
				       if(typeof(jhuser)=='undefined'){
					       return;
					   }
					   
				     
				       if(e == null){
					      var url=$("link[rel=shortlink]").attr("href")
					      href='/commentcache?page=0&node='+url.substring(url.lastIndexOf('/')+1) +'&areaid='+jhuser.boss_info.area_id;
					   }
					   else{
					       href= $(e.target).attr('href2');
					   }
					   //alert(href)   ;
				       htmlobj=$.ajax({url:href,async:false});
					   
				       $('#product_content_footer').html($('.comment-wrapper',$(htmlobj.responseText)).html());
					   $('.pager-item a,.pager-next a,.pager-last a,.pager-first a,.pager-previous a').each(function(){      
						  $(this).unbind("click");
						  $(this).bind("click",feachComment);
						  $(this).attr('href2',$(this).attr('href'));
						  $(this).attr('href','javascript:void(0);');  
                       });
					   appendTempComent();
					   alignText();
					  
					 
				}
				
				$(function(){
				      var url=$("link[rel=shortlink]").attr("href")
				      if(typeof(url)!='undefined' && url.search("node") != -1)
				      feachComment(null);
					
					  $(window).resize(function(){
					     setTimeout(alignText, 0);
					  }
					  );
					  }
				);
             })(jQuery);
(function($){
               $(function(){
			       
			         $(".jhoperatordelete").click(function(){ 
					      window.deleteitemid=$(this).attr('pid');
						  $('#deleteModal').modal('show');
                          $('#address-delete-submit').one("click",function(){
									var list = {}; 
									$.ajax({
										//请求方式
										type : "POST",
										//请求的媒体类型
										contentType: "application/json;charset=UTF-8",
										//请求地址
										url : "/user/"+jhuser.sub+"/addressbook/billing/deleteajax/"+window.deleteitemid,
										//数据，json字符串
										data : JSON.stringify(list),
										dataType:"json",
										//请求成功
										success : function(result) {
											if(result.status=='OK'){
											   $('#deleteModal').modal('hide');	
											   $('a[pid="'+window.deleteitemid+'"]').eq(1).parents(".col-xs-12").remove();
											}
										},
										//请求失败，包含具体的错误信息
										error : function(e){
											console.log(e.status);
											console.log(e.responseText);
										},
										beforeSend:function(){
											$('#address-delete-submit').attr({disabled:"disabled"});
										},
										
										complete:function(){
											$('#address-delete-submit').removeAttr("disabled");
										}
										});
	                      });						  
					 });
			         $(".JHAddressEdit,.customer_profile_billing .list-group-item.last,.view-commerce-addressbook-defaults  .list-group-item,.jhoperatoredit").click(function(){ 	    
						//get address info
						if(window.data==undefined){
							$.ajax({        
		                            type: 'GET',        
			                        url: "/addressajax",
                                    dataType:"json", 								
			                        async:false,			
			                        success: function (data) {  								
                                       window.data=$.parseJSON(data);									   
				                    }
			                });
						}
						window.addressProcess();
						if($(this).hasClass("last")){
						   $("#edit-customer-profile-billing-field-receievername-und-0-value").val('');
						   $("#edit-customer-profile-billing-field-customerphone-und-0-value").val('');
						   window.addressCheck("","");
						}
						else{
						   if($(this).hasClass("jhoperatoredit")){
						       //alert($(this).attr('pid'));
							   $("#edit-customer-profile-billing-field-receievername-und-0-value").val($(".field-name-field-receievername .field-item",$(this).parent().parent()).text().replace(/\s/g,"").replace("默认",""));
							   $("#edit-customer-profile-billing-field-customerphone-und-0-value").val($(".field-name-field-customerphone .field-item",$(this).parent().parent()).text().replace(/\s/g,""));
                               window.addressCheck( $(".field-name-field-addressprofile .field-item",$(this).parent().parent()).text(),"",$(this).attr('pid'));							   
						   }
						   else{
						     $("#edit-customer-profile-billing-field-receievername-und-0-value").val($(".list-group .active .field-name-field-receievername .field-item").text().replace(/\s/g,"").replace("默认",""));
						     $("#edit-customer-profile-billing-field-customerphone-und-0-value").val($(".list-group .active .field-name-field-customerphone .field-item").text().replace(/\s/g,""));		
                             window.addressCheck( $(".list-group .active .field-name-field-addressprofile .field-item").text(),window.mapid,"");	
						   }
						   
						  
						}
										
						$('#JHAddressEdit').modal('show');		
					    
	
					    
						
					 });
			        window.active = function(){  
                   		 	 
						  if(!$(this).hasClass("last")){
						      $(".list-group-horizontal .active").each(function(){
                                 $(this).removeClass("active");
                              });
						      $(this).addClass("active");
							  changeMap( $(this).attr("data"));
							  window.mapid=$(this).attr("data");
						  }
					      
					 }
					 $(".list-group-horizontal a").bind("click",window.active);
					 
					
				});
				
				function changeMap(id){
					for (x in maps){
                      if(maps[x].default){
					     Drupal.settings.geofieldBaiduMap['baidu-map-geofield-entity-commerce-customer-profile-'+x+'-field-geofiledtest'].data.coordinates=maps[id]['coor'];
						 $('.geofieldBaiduMap').removeOnce('geofield-processed');
					     Drupal.behaviors.geofieldBaiduMap.attach(window.document,Drupal.settings);
					  };
                     }
				    
				}
			  

		})(jQuery);	 
			 
			 
function comentHtml(data){
return '<a id="comment-'+data.cid+'"></a>'+
'<div class="comment comment-by-viewerodd clearfix" typeof="sioc:Post sioct:Comment" about="/comment/'+data.cid+'#comment-'+data.cid+'">'+
  
  '<div class="attribution">'+

      '<div class="user-picture">'+
    '<a title="查看用户资料" href="/user/'+data.user.id+'"><img width="100" height="100" title="'+data.user.name+'的头像" alt="" src="" typeof="foaf:Image"></a>  </div>'+

    '<div class="submitted">'+
      '<p class="commenter-name">'+
        '<span rel="sioc:has_creator">'+data.user.name+'</span>      </p>'+
      '<p class="comment-time">'+
        '<span content="" datatype="xsd:dateTime" property="dc:date dc:created">'+data.created+'</span>      </p>'+
      '<p class="comment-permalink element-invisible">'+
        '<a class="permalink" href="/comment/'+data.cid+'#comment-'+data.cid+'" rel="bookmark">永久连接</a>      </p>'+
    '</div>'+
  '</div>'+

  '<div class="comment-text">'+
    '<div class="comment-arrow"></div>'+

    '<div class="content">'+
      '<span class="rdf-meta element-hidden" rel="sioc:reply_of" resource="/dangshansuli"></span>'+
'<div class="field field-name-comment-body field-type-text-long field-label-hidden">'+
    '<div class="field-items">'+
          '<div class="field-item even" property="content:encoded">'+
	  '<p class="text-left">'+
	  data.comment +' </p>  '+  
	 ' </div>'+
      '</div>'+
'</div>'+
          '</div> <!-- /.content -->'+
'</div> <!-- /.comment-text -->'+
'</div>'
}



function checkComment(){
				//alert(jQuery('#edit-comment-body-und-0-value').val());
				jQuery.ajax({
             type: "POST",
             dataType: "json",
             url: jQuery('#comment-form').attr("action"),
             data: jQuery('#comment-form').serialize(),
             success: function (data) {
                 //console.log(data);
                 if(data.code ==200){
                        //var username = data.cid +':'+data.created;
                       //alert(data);
					    var comments = new Array();
					    if(jQuery.cookie('TempComment')!=undefined && jQuery.cookie('TempComment')!='null'){
				            comments = JSON.parse(jQuery.cookie('TempComment')); 
				        }
					   comments.push(data);
					   jQuery.cookie('TempComment', JSON.stringify(comments), { expires: 7, path: '/' });
					   jQuery(".JHComment").prepend(comentHtml(data));
                 }else{
                       alert(data.msg);
                 }
             },
             error : function() {
                 alert("操作异常!");
             }
            });
		}
		
function initlize(id){
 jQuery('input[name=product_id]').val(id);
      for(var p in productJson[id]){
       if(p=="commerce_price"){
          value= productJson[id][p]["amount"];
		  priceval=jQuery(".field-name-"+p.replace(/_/g, "-") + " .field-item").text();
		  value+=priceval.slice(priceval.indexOf("元"),priceval.length);
		  jQuery(".field-name-"+p.replace(/_/g, "-") + " .field-item").text(value);
       }
       else if(productJson[id][p]["taxonomy_term"]!=undefined) {
          value= productJson[id][p]["taxonomy_term"]["name"];
		  jQuery(".field-name-"+p.replace(/_/g, "-") + " li").text(value);
       }
      }
}
		
function asycChangeValue(input){
  jQuery(".RadioStyle input:checked").removeAttr("checked");
  if(input!=undefined){
    jQuery(input).prop('checked','true');
    fieldname = jQuery(input).attr("name");
    fieldname = fieldname.slice(fieldname.indexOf("[")+1,fieldname.indexOf("]"));
    tid = jQuery(input).val();
  }
 
  
  var queries = {};
  if(document.location.search!=""){
     jQuery.each(document.location.search.substr(1).split('&'),function(c,q){
       var i = q.split('=');
       queries[i[0].toString()] = i[1].toString();
     });
  }

  for(var id in productJson){
   if( queries.pid!=undefined && input==undefined ){
    initlize(queries.pid);
	jQuery("#edit-attributes-field-quality-level-" + productJson[queries.pid].field_quality_level.tid).prop('checked','true');
   }
   
   if(input==undefined ){
     break;
   }
   if(productJson[id][fieldname]["tid"]==tid){
     initlize(id);
   }
  }
  
  
 
}
	
//window.productJson["dangshanli"]["commerce_price"]["amount"]
//window.productJson["dangshanli"]["field__recommended_index"]["taxonomy_term"]["name"]






	if(document.getElementById( 'grid' )!=null){
          new GridScrollFx( document.getElementById( 'grid' ), {
				viewportFactor : 0.4
			}); 
			}