(function($){
          $('#myCart').on('show.bs.modal', function () {
               
             });
          $("#myCart .close").click(function(){
		    if($("#productContentSide").hasClass("hidden-xs")==false){
			   $("#productContentSide").addClass("hidden-xs");
			}
			var cart = $("#product_content_side").clone();
			$("#product_content_side").remove();
            $("#productContentSide").append(cart);	
		  });
		 
          $("#cart").click(function(){
		    if($("#productContentSide").hasClass("hidden-xs")){
			   $("#productContentSide").removeClass("hidden-xs");
			}
			$("#myCart .modal-content #cartContent").empty();
			var cart = $("#product_content_side").clone();
			$("#product_content_side").remove();
            $("#myCart #cartContent").append(cart);	
			
            			
		  });
		  
		  
          $('[href="#collapseOne"]').click(function(){
		         if($("span",$(this)).hasClass("glyphicon-chevron-down")){
				     $("span",$(this)).removeClass("glyphicon-chevron-down");
		             $("span",$(this)).addClass("glyphicon-chevron-up");
					 //$("span",$(this)).text("折叠");
				 }
				 else{
				     $("span",$(this)).removeClass("glyphicon-chevron-up");
		             $("span",$(this)).addClass("glyphicon-chevron-down");
					 //$("span",$(this)).text("展开");
				 }
		            
	      });  
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
                 $('.JingHeNav').html(' <ul class="JHUser nav nav-tabs"><li class="userinfo"><span>您好:<a href="/user/' + id + '">' + name + '</a></span> </li> <li class="userlogout"> <span><a id="jhlogout" href="#">退出</a></span></li></ul>');				 
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



(function($){
  $(document).ready(function(){
	if($("#container").muslider!=undefined){
		$("#container").muslider({
					"animation_type": "horizontal",
					"animation_duration": 600,
					"animation_start": "manual",
					"responsive": "yes",
					"ratio":3/4,
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
			 
var compile = function (functionObject) {
    return function (it) {
	    /*return functionObject.toString().match(/\/\*([\s\S]*?)\*\//)[1].replace(/\$\{\w.+?\}/g, function (variable) { alert(variable);return ''});*/
        return functionObject.toString().match(/\/\*([\s\S]*?)\*\//)[1].replace(/\$\{\w.+?\}/g, function (variable) {
		//alert(variable);
		var value = it;
        variable = variable.replace('${', '').replace('}', '');
        variable.split('.').forEach(function (section) {
           value = value[section];
         });
        return value;
        });
    }
};
var toHtml = compile(function () {/*<div class="row" jhcommentid="${data.jhcommentid}"> 
  <div class="col-xs-2 col-md-1">
  
  <div class="attribution center-block">

      <div class="user-picture">
    <a title="查看用户资料" href="/user/${data.user.id}"><img width="50" height="50" title="${data.user.name}" alt="${data.user.name}" src="${data.user.picture}"></a>  </div>

    <div class="submitted">
      <p class="commenter-name">
        ${data.user.name}      </p>
      <p class="comment-time"><h5><small>${data.created}</small></h5></p>
    </div>
  </div>
  </div>
  <div class="col-xs-10 col-md-11"><div class="comment-text">
    <div class="comment-arrow"></div>

    	
    <div class="content">
      <div class="jh-text-ellipsis-domain  field field-name-comment-body field-type-text-long field-label-hidden">
    <div class="jh-text-ellipsis-container field-items">
          <div class="field-item even">
	  <p class="text-left">
	  ${data.comment}	  </p>    
	  </div>
      </div>
</div>
          </div> 
    <div class="act"><a class="JHCommentAct1" href="javascript:void(0);" attrid="comment/replyajax/${data.nid}/${data.cid}">
          <div class="glyphicon glyphicon-comment jhcommentoperator center-block" data-toggle="modal" data-target="#myComment" data-backdrop="static"></div>
</a>
 <a class="jhHeart JHCommentAct2" href="javascript:void(0);"  attrid="${data.cid}">
          <div class="glyphicon glyphicon-heart center-block pull-left"></div>  <div class="glyphicon small center-block pull-left JHCommentLabel">0</div>
 </a>
</div>   
  </div> </div>
</div>
*/
});	 
var test = {
    data: {
        title: 'title string 3',
        content: 'content string 3'
    }
};
//comentHtml(test);
function comentHtml(commentObj){
 return toHtml({data:commentObj});
}



function checkComment(){
				var commentContent=$('#edit-comment-body-und-0-value').val();
				var datetime = new Date();
				var jhcommentid =Date.now();
				var commentObj ={"jhcommentid":jhcommentid,"code":"","redirect":"","page":"","nid":"","cid":"","created":datetime.getHours()+":"+datetime.getMinutes(),"comment":commentContent,"user":{"id":jhuser.sub,"name":jhuser.username,"picture":jhuser.picture}};
				$(".JHComment").prepend(comentHtml(commentObj));
                var comments = new Array();
	            if($.cookie('TempComment')!=undefined && $.cookie('TempComment')!='null'){
		              comments = JSON.parse($.cookie('TempComment')); 
	            }	
                comments.push(commentObj);	
				$.ajax({
             type: "POST",
             dataType: "json",
             url: $('#comment-form').attr("action"),
             data: $('#comment-form').serialize()+"&jhcommentid="+jhcommentid,
             success: function (data) {
                 if(data.code ==200){
					try{
					 comments.forEach(function(item, index){
					    if(item.jhcommentid==data.jhcommentid){	
                          data.comment=comments[index].comment;						
						  comments.splice(index,1,data);
						  throw new Error("breakForEach");
						}
						
					   });
					}catch (e) {
                     if (e.message!="breakForEach") throw e;
                    }
					   $("[jhcommentid="+data.jhcommentid+"]").remove();
					   data.user.picture=jhuser.picture;
					   data.created=data.created.split(" ")[1];
					   $(".JHComment").prepend(comentHtml(data));
					   timeHeart2($("[jhcommentid="+data.jhcommentid+"]"));
					   $(".jhcommentoperator",$("[jhcommentid="+data.jhcommentid+"]")).click(function(){
		                   commentForm();     
		               });
					  
					   $.cookie('TempComment', JSON.stringify(comments), { expires: 7, path: '/' });
					   
					   
					   
                 }else{
                       console.log(data);;
                 }
             },
             error : function(data) {
                 console.log(data);
             }
            });
			$("#myComment .close").click();
		}
		



				
				var lastClick;
				function alignText(){
				      if($('.JHComment').length==0)
					       return;
				      var comments= $('.JHComment:last .field-item');
					  
					  function recoverInfo(eleClick){				                
					                var domain=$(eleClick).closest('.act').prev().find('.jh-text-ellipsis-domain')[0];
					                //$(domain).children()[0].classList.add( 'jh-text-ellipsis-container');
					                $(domain).children().css({"height": "60px"});
									$(domain).children().children()[0].classList.add( 'jh-text-ellipsis' );
									$(domain).removeAttr("style");
									$(domain).parent().removeAttr("style");
									$(eleClick).closest('.act').removeAttr("style");
									$(domain).closest(".row").removeAttr("style");
									//$(eleClick).text("更多...");
									eleClick.classList.add( 'glyphicon-resize-full' ); 
									eleClick.classList.remove( 'glyphicon-resize-small' ); 
					  }
					  if(lastClick!=undefined){
						 recoverInfo(lastClick);
					  }
					  for(var i=0, length=comments.length;i<length;i++){
					       var xmpl= comments[i];
						   var elementP = $(xmpl).closest(".jh-text-ellipsis-container");
						   var elementS = $(xmpl).closest(".jh-text-ellipsis-container").children(".field-item");
                           if (elementS.height() > elementP.height()) {
                                //xmpl.classList.add( 'jh-text-ellipsis' ); 
                                if($(xmpl).closest(".content").next(".act").children("a.readmorecomment").length==0)	{				
                                  $(xmpl).closest(".content").next(".act").append( '<a class="readmorecomment glyphicon glyphicon-resize-full" style="font-size: 25px;" href="#"></a>' );								
                                }
						   }
						   else{
						        xmpl.classList.remove( 'jh-text-ellipsis' );
								$(xmpl).closest(".content").next(".act").children("a.readmorecomment").remove();
							}
							
							
					      $(xmpl).closest('.content').next(".act").children("a.readmorecomment").unbind("click");
                          $(xmpl).closest('.content').next(".act").children("a.readmorecomment").click(function( evnt ){
						        evnt.preventDefault();
						        var domain=$(evnt.target).closest('.act').prev().find('.jh-text-ellipsis-domain')[0];
								var container=domain.querySelector( '.jh-text-ellipsis-container' );
			                    if (container) {
								    
									if(lastClick!=undefined && lastClick==evnt.target){
									    recoverInfo(lastClick);
									    lastClick=undefined; 
									    return;
									}
									else if(lastClick!=undefined){
										recoverInfo(lastClick);
									}
								    lastClick=evnt.target;  
								
					                container.querySelector( '.jh-text-ellipsis' ).classList.remove( 'jh-text-ellipsis' );
								   // container.classList.remove( 'jh-text-ellipsis-container');
									//$(domain).css({"background-color":"white","position":"absolute","width":$(container).width().toString(),"z-index":"999"});
									$(domain).closest(".row").css({"padding-bottom": "40px"});
									$(container).css({"height": "auto"});
									//$(domain).parent().css({"height":$(container).height().toString()});
									//$(evnt.target).closest('.act').css({"position":"absolute","z-index":"999","width":$(container).width().toString()});
									//$(evnt.target).text("返回");
									evnt.target.classList.add( 'glyphicon-resize-small' );
									evnt.target.classList.remove( 'glyphicon-resize-full' ); 	
					             }	
				                 else{
								    recoverInfo(evnt.target);
								    if(lastClick==evnt.target){
									    lastClick=undefined; 
									}
				                  }
						});
					  }
					 
				}
				
				
				function appendTempComent(){
				        var comments = new Array();
					    if($.cookie('TempComment')!=undefined && $.cookie('TempComment')!='null'){
				            comments = JSON.parse($.cookie('TempComment')); 
							var commentsclone=comments.slice(0);
	                        //for(let v of commentsclone){
							 for(let i=0;i<commentsclone.length;i++) {
							   var printvalue = true;
							   if($(".JHComment .row[cid='"+commentsclone[i].cid+"']").length){
							      printvalue=false;
								  comments.splice(comments.indexOf(commentsclone[i]),1);
							   }
							   if(printvalue){
								   $(".JHComment").prepend(comentHtml(commentsclone[i]));
							   }
							}
							$.cookie('TempComment', JSON.stringify(comments), { expires: 7, path: '/' });
							
				        }
						
				}
				
				function pictureAndName(htmlobj){
				  $('.user-picture',$(htmlobj)).each(function(){
					 //alert($(this).closest(".indented").attr('class'));
					 if($(this).closest(".indented").length){
					    //console.log($(this).closest(".indented").attr('class'));
						if($(this).closest(".indented").attr('class').split(" ")[1]==1){
						   $(this).find('img').attr('width',40);
						   $(this).find('img').attr('height',40);
						}
						else{
						   $(this).find('img').attr('width',30);
						   $(this).find('img').attr('height',30);
						}
					 }
					 });
					 
					 $(".indented .2",$(htmlobj)).each(function(){
					    if(this.children.length>1){
						   let pid = $(this).prev().attr('cid');
						   $(this).children().each(function(){
						      let currentpid = $(this).attr('pid');
							  if(currentpid!=pid){
							    let commentname=$(this).parent().find("[cid='"+currentpid+"'] .commenter-name").text();
								$(this).find(".content p").prepend("<a>@"+commentname+"</a>");
							  }
						   });
						} 
					 });
				}
				
				 var counter = 1;
				 function feachComment(e){
				       if(typeof(jhuser)=='undefined'){
					       return;
					   }
					   href='/commentcache?page='+ $(".JHComment").length +'&node='+$(".node-full").attr("id").split('-')[1] +'&areaid='+jhuser.boss_info.area_id;
				       $.ajax({url:href,async:true,
					   beforeSend: function (xhr) {
                         //console.log('beforeSend'+counter)
						 if(counter == 0){
						    return false;
						 }
						 else{
						    counter = 0;
                            var _LoadingHtml = '<div id="loadingDiv" style="position:fixed;left:50%;width:100px;height:35px;top:0;opacity:1;filter:alpha(opacity=80);z-index:10000;"><div style="position: absolute;left: 0px; top:0px; width: 35px; height: 35px; line-height: 35px;  background:  url(sites/all/themes/cainiang01/images/loading.gif) no-repeat scroll 0px 0px/35px 35px; border: 0px solid #95B8E7; color: #696969; font-family:\'Microsoft YaHei\';"></div></div>';
                            $(".comment-wrapper").append(_LoadingHtml);
						 }
                       },
                       success: function (htmlobj) {
                         //console.log('success');
						 
						 $('#product_content_footer .comment-wrapper').append($('.comment-wrapper .JHComment',$(htmlobj)));
						 pictureAndName($('.comment-wrapper .JHComment:last'));
					     appendTempComent();
					     alignText();
						 timeHeart();
						 heartLight($('.comment-wrapper .JHComment:last'));
						 $(".JHComment:last .jhcommentoperator").click(function(){
		                   commentForm();     
		                  });
                       },
                       error: function (xhr) {
                         console.log('error')
                       },
                       complete: function (xhr) {
					     counter=1;						 
                         //console.log('complete'+counter);			
                         var loadingMask = document.getElementById('loadingDiv');
                         loadingMask.parentNode.removeChild(loadingMask);

                       }
					   });
					   
				      
					  
					 
				}
				
				function commentForm(){
				    window.oldcommentid=$('#comment-form').attr("action");
					  if($(this).parent().attr("attrid")!==undefined){
					     $('#comment-form').attr("action",$(this).parent().attr("attrid"));
					  }
					  if($(".JHCommentForm form").length==0){
					     return;
					  }
			         $("#myComment .modal-content #commentContent").empty();
			         var comment = $(".JHCommentForm form").clone();
			         $(".JHCommentForm form").remove();
                     $("#myComment #commentContent").append(comment);
				}
				
				function initComment(){
				         $('#myComment').on('hide.bs.modal',
                            function() {
                              $('#comment-form').attr("action",window.oldcommentid);
                         });				 
					  
		               $("#comment,#jhcomment,.JHComment:last .jhcommentoperator").click(function(){
		                   commentForm();     
            		
		               });
					

                      $("#myComment .close").click(function(){
                          $("#myComment").modal("hide"); 
			              var comment = $("#commentContent form").clone();
			              $("#commentContent form").remove();
                          $(".JHCommentForm").append(comment);		
		              });
					
					  $(window).resize(function(){
					     setTimeout(alignText, 0);
					  });
					  alignText();
				}
				
				function timeHeart2(scope){
				  
				      $(".jhHeart",scope).click(function(){
					     if($(this).css("color")!="rgb(255, 0, 0)"){
					       $(this).css("color","red");
						   $(this).children().eq(1).text(parseInt($(this).children().eq(1).text())+1);
						   href='/commentlike/'+$(this).attr('attrid');
						   $.ajax({url:href,async:true});
						 }
						 else{
						   $(this).css("color","grey");
						   $(this).children().eq(1).text(parseInt($(this).children().eq(1).text())-1);
						   href='/commentdislike/'+$(this).attr('attrid');
						   $.ajax({url:href,async:true});
						 }
					  });
                 $('.comment-time',scope).each(function(){
				   var datetime = new Date();
				   var year = datetime.getFullYear();
                   var month = datetime.getMonth() + 1 < 10 ? "0" + (datetime.getMonth() + 1) : datetime.getMonth() + 1;
                   var date = datetime.getDate() < 10 ? "0" + datetime.getDate() : datetime.getDate();
				   var today=month+'-'+date;
				   var cmp=$(this).text().trim().split(" ");
				   if(cmp[0]==today){      
				       $(this).html("<h5><small>"+cmp[1]+"</small></h5>");
				   }
				   else{
				       $(this).html("<h5><small>"+cmp[0]+"</small></h5>");
				   }
				  
				 });
				}
				
				function findHeartIndex(data,id,isnode){
				  if (isnode === undefined) {
					  isnode=false;
				  }
				  if(isnode){
					    var needUpdate = data.filter((t) => {
                                   return t.nodeid == $(".node-full").attr("id").split('-')[1];
                           });
					}
					else{
					    var needUpdate = data.filter((t) => {
                                   return t.commentid == id;
                           });
					}
					var index = data.indexOf(needUpdate[0]);
					return index;
				}
				
				function deleteingHeart(id,isnode){
				   if (isnode === undefined) {
						isnode=false;
				   }
				   var json=window.localStorage.getItem(jhuser.boss_info.area_id+"myLike");
				   if(json ==null){
				       return;
				   }
				   var data=JSON.parse(json);
				   var index = findHeartIndex(data,id,isnode);
				   data[index].deleteing=true;
				   var d=JSON.stringify(data);
				   window.localStorage.setItem(jhuser.boss_info.area_id+"myLike",d);
				}
				
				function updateHeart(id,isnode){
					 if (isnode === undefined) {
						  isnode=false;
					  }
				   var json=window.localStorage.getItem(jhuser.boss_info.area_id+"myLike");
				   if(json ==null){
				       return;
				   }
				   var data=JSON.parse(json);
				   var index = findHeartIndex(data,id,isnode);
				   data[index].like=true;
				   var d=JSON.stringify(data);
				   window.localStorage.setItem(jhuser.boss_info.area_id+"myLike",d);
				}
				
				function delHeart(id,isnode){
					 if (isnode === undefined) {
						  isnode=false;
					  }
				   var storage=window.localStorage;
				   var json=storage.getItem(jhuser.boss_info.area_id+"myLike");
				   if(json ==null){
				       return;
				   }
				   var data=JSON.parse(json);
				   if(isnode){
					    var needDeleted = data.filter((t) => {
                                   return t.nodeid == $(".node-full").attr("id").split('-')[1];
                           });
					}
					else{
					    var needDeleted = data.filter((t) => {
                                   return t.commentid == id;
                           });
					}
					var index = data.indexOf(needDeleted[0]);
					data.splice(index, 1);
					var d=JSON.stringify(data);
					storage.setItem(jhuser.boss_info.area_id+"myLike",d);
				}
				
				function addHeart(id,isnode){
					 if (isnode === undefined) {
						  isnode=false;
					  }
				    var storage=window.localStorage;
					var json=storage.getItem(jhuser.boss_info.area_id+"myLike");
					if(json ==null){
					  var data=[];					  
					}
					else{
					  var data=JSON.parse(json);
					}

				    if(isnode){
					   data.push({nodeid:id,commentid:'',like:false});
					}
					else{
					   data.push({nodeid:'',commentid:id,like:false});
					}
					var d=JSON.stringify(data);
					storage.setItem(jhuser.boss_info.area_id+"myLike",d);
				}
				
		
				function heartLighthelp(jsonObj,scope){
					 if (scope === undefined) {
						 scope=-1;
					  }
					jsonObj.forEach(function(item, index){
					   if(item.like==false && typeof(jhuser)!='undefined' && item.deleteing==undefined && scope==-1){
                          if(item.nodeid!='' && $(".node-full").attr("id").split('-')[1]==item.nodeid){
						    nodeLike();
						  }
						  else{
						    commentLike(item.commentid);
						  }
					   }
					   if(typeof(jhuser)!='undefined' && item.deleteing!=undefined && scope==-1){
					      if(item.nodeid!='' && $(".node-full").attr("id").split('-')[1]==item.nodeid){
						    nodeDisLike();
						  }
						  else{
						    commentDisLike(item.commentid);
						  }
						  
					   }
					   if(typeof(jhuser)!='undefined' && item.deleteing==undefined){
					      if(item.nodeid!=''){ 
						     if($(".node-full").attr("id")!=undefined&&$(".node-full").attr("id").split('-')[1]==item.nodeid){
							   if(scope==-1){
							     $(".jhcomm.glyphicon.glyphicon-heart.jhHeart.center-block").css("color","red");
							   }   
							 }   
						  }
						  else{
						   if(scope==-1){
						       $(".JHCommentAct2[attrid="+item.commentid+"]").css("color","red");
							 }
							 else{
							   $(".JHCommentAct2[attrid="+item.commentid+"]",scope).css("color","red");
							 }
						  }
					   }
					});
				}
				function heartLight(scope){
					 if (scope === undefined) {
						 scope=-1;
					  }
				  if(!window.localStorage){
                    alert("您的浏览器太旧，请升级新版浏览器");
                  }
				  else if(typeof(jhuser)!='undefined'){
					var json=window.localStorage.getItem(jhuser.boss_info.area_id+"myLike");
					if(json ==null){
					   $.ajax({url:'/getmylike',async:true,
					   success:function(json){
					      heartLighthelp(json,-1);
						  window.localStorage.setItem(jhuser.boss_info.area_id+"myLike",JSON.stringify(json));
					   }
					   });
					   return;
					}
					heartLighthelp(JSON.parse(json),scope);
				 }
				}
				
				function clearNode(commentid,comment){
					 if (commentid === undefined) {
						 commentid=-1;
					  }
					 if (comment === undefined) {
						 comment=false;
					  }
				      if(comment){
					       var lastTimer = timerArr.filter((t) => {
                                   return t.commentid == commentid;
                           });
					  }
					  else{
					      var lastTimer = timerArr.filter((t) => {
                                   return t.nodeid == $(".node-full").attr("id").split('-')[1] && t.areaid==jhuser.boss_info.area_id;
                           });
					  }
				       
					  var index = timerArr.indexOf(lastTimer[0]);
					  timerArr.splice(index, 1);
				}
				
				var timerArr=[]; 
				function commentLike(commentId){
				   
                   href='/commentlike/'+commentId;
			       $.ajax({url:href,async:true,
				            success:function(result) {
							   if(result.resultCode=='ok'){
							      updateHeart(result.commentid); 
							   }
							}
						});
                   clearNode(commentId,true);				   
                }
				function _commentLike(_commentId){ 
                   return function(){ 
                   commentLike(_commentId); 
                   }
                }				
                function commentDisLike(commentId){
				   
                   href='/commentdislike/'+commentId;
			       $.ajax({url:href,async:true,success:function(result) {
				               if(result.resultCode=='ok'){						      
								  delHeart(result.commentid);
							   }
							}
						});
                   clearNode(commentId,true);				   
                }	
                function _commentDisLike(_commentId){ 
                   return function(){ 
                   commentDisLike(_commentId); 
                   }
                }					
		        function nodeLike(){
				     href='/commentnodelike/'+$(".node-full").attr("id").split('-')[1] +'/'+jhuser.boss_info.area_id;
				     $.ajax({url:href,async:true,
					         success:function(result) {
							   if(result.resultCode=='ok'){
							      updateHeart(result.nodeid,true); 
							   }
							}
					 });
					 clearNode();
				}
				
				function nodeDisLike(){
                     href='/commentnodedislike/'+$(".node-full").attr("id").split('-')[1] +'/'+jhuser.boss_info.area_id;
					 $.ajax({url:href,
					        async:true,
							success:function(result) {
							   if(result.resultCode=='ok'){						      
								  delHeart(result.nodeid,true);
							   }
							}
						});
					 clearNode();
				}
				function timeHeart(first){
				      var heart;
					  heart=$(".JHComment:last .jhHeart");
				      if(first==0){
					      heart2=$(".jhcomm.jhHeart.glyphicon-heart");
						  heart2.click(function(){
						  
						  var lastTimer = timerArr.filter((t) => {
                                   return t.nodeid == $(".node-full").attr("id").split('-')[1] && t.areaid==jhuser.boss_info.area_id;
                           });
						  
					     if($(this).css("color")!="rgb(255, 0, 0)"){
					       $(this).css("color","red");
						   addHeart($(".node-full").attr("id").split('-')[1],true);
						   $(this).parent().children().eq(1).text(parseInt($(this).parent().children().eq(1).text())+1);
						   if(lastTimer.length){
						      var index = timerArr.indexOf(lastTimer[0]);
							  if(index > -1 && Date.now()-lastTimer[0].timeStamp<10000){
							     clearTimeout(lastTimer[0].timer);
							     timerArr.splice(index, 1);	 
							  }
						   }
						   else{                            						   
						      var timer0 = setTimeout(nodeLike,10000); 
						      timerArr.push({nodeid: $(".node-full").attr("id").split('-')[1], areaid: jhuser.boss_info.area_id,timeStamp:Date.now(),timer:timer0});
						   }  
						 }
						 else{
						   $(this).css("color","grey");
						   deleteingHeart($(".node-full").attr("id").split('-')[1],true);
						   $(this).parent().children().eq(1).text(parseInt($(this).parent().children().eq(1).text())-1);
  
						   if(lastTimer.length){
						      var index = timerArr.indexOf(lastTimer[0]);
							  if(index > -1 && Date.now()-lastTimer[0].timeStamp<10000){
							     clearTimeout(lastTimer[0].timer);
							     timerArr.splice(index, 1); 
							  }
						   }
						   else{						      
						      var timer0 = setTimeout(nodeDisLike,10000); 
						      timerArr.push({nodeid: $(".node-full").attr("id").split('-')[1], areaid: jhuser.boss_info.area_id,timeStamp:Date.now(),timer:timer0});
						   }
						 }
					  });
					  }
				      $(".JHComment:last .jhHeart").click(function(){
					     var lastTimer = timerArr.filter((t) => {
                                   return t.commentid == $(this).attr('attrid');
                           });
					     if($(this).css("color")!="rgb(255, 0, 0)"){
					       $(this).css("color","red");
						   addHeart($(this).attr('attrid'));
						   $(this).children().eq(1).text(parseInt($(this).children().eq(1).text())+1);
						   //href='/commentlike/'+$(this).attr('attrid');
						   //$.ajax({url:href,async:true});
						    if(lastTimer.length){
						      var index = timerArr.indexOf(lastTimer[0]);
							  if(index > -1 && Date.now()-lastTimer[0].timeStamp<10000){
							     clearTimeout(lastTimer[0].timer);
							     timerArr.splice(index, 1); 
							  }
						   }
						   else{						     
						      var timer0 = setTimeout(_commentLike($(this).attr('attrid')),10000); 
						      timerArr.push({commentid: $(this).attr('attrid'),timeStamp:Date.now(),timer:timer0});
						   }
						  
						 }
						 else{
						   $(this).css("color","grey");
						   deleteingHeart($(this).attr('attrid'));
						   $(this).children().eq(1).text(parseInt($(this).children().eq(1).text())-1);
						  
						   //href='/commentdislike/'+$(this).attr('attrid');
						   //$.ajax({url:href,async:true});
						   if(lastTimer.length){
						      var index = timerArr.indexOf(lastTimer[0]);
							  if(index > -1 && Date.now()-lastTimer[0].timeStamp<10000){
							     clearTimeout(lastTimer[0].timer);
							     timerArr.splice(index, 1);
								 
							  }
						   }
						   else{
						      var timer0 = setTimeout(_commentDisLike($(this).attr('attrid')),10000); 
						      timerArr.push({commentid: $(this).attr('attrid'),timeStamp:Date.now(),timer:timer0});
						   }
						   
						 }
					  });
                 $('.JHComment:last .comment-time').each(function(){
				   var datetime = new Date();
				   var year = datetime.getFullYear();
                   var month = datetime.getMonth() + 1 < 10 ? "0" + (datetime.getMonth() + 1) : datetime.getMonth() + 1;
                   var date = datetime.getDate() < 10 ? "0" + datetime.getDate() : datetime.getDate();
				   var today=month+'-'+date;
				   var cmp=$(this).text().trim().split(" ");
				   if(cmp[0]==today){      
				       $(this).html("<h5><small>"+cmp[1]+"</small></h5>");
				   }
				   else{
				       $(this).html("<h5><small>"+cmp[0]+"</small></h5>");
				   }
				  
				 });
				}
				
				function commentProcess(){
				     is_running = false;
					 is_first = true;
			         $(document).scroll(function() {
					      if(is_first){
						    $(document).scrollTop(0);
							is_first = false;
						  }
					     
					    
						 if($(document).scrollTop() >= $(document).height() - $(window).height()-4000 && $(document).scrollTop() <= $(document).height() - $(window).height() ){
                             if(is_running == false){							 
						       is_running = true;	
						       if($(".JHComment").length<=$(".pager").eq(0).find('.pager-item').length+1){        				   
						        feachComment();                    						 
						       } 
							 }
                            						   
						 }
						 else{
						   is_running = false;
						 }	
                     });
					 
					 pictureAndName($("body")[0]);
					 appendTempComent();
					 timeHeart(0);
					 initComment();
					 setTimeout(heartLight,1000);
				}
				
				$.extend({
                  commentProcess:commentProcess,
				  checkComment:checkComment,
                 });
				
		
             })(jQuery);
(function($){
               $(function(){ 
            	     if($(".node-full").attr("id")!=undefined){
            	    	 $.commentProcess();
            	     }
					else{
						$('.temphol').hover(
			                     function() {
			                          $(this).children('.front').stop().animate({ 'top' : '0','height':'0'}, 500);
			                            }, 
			                   function() {
			                          $(this).children('.front').stop().animate({ 'top' : '0','height':'100%'}, 300);
			                          }
			                 );
					}
					 
					 
					 

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
	
