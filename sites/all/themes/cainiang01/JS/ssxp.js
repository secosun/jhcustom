//数据传进来之前就给省框option赋值
	(function($){
	   window.addressProcess=function(){
			var Pro1 = '<option>请选择</option>';
			for( var i=0; i<data.province.length; i++){
				var Pro = '<option >'+ data.province[i] +'</option>';
				Pro1 += Pro;
			}
			$('#province').empty().append(Pro1);
			
			
			

		//监听省的变化，然后显示相应的市区
			$('#province').on('change',function(){
				//var oCity = document.getElementById('city');
				//oCity.innerHTML = '<option>请选择</option>';
				var City1 = '<option>请选择</option>';
				var City2 = $('#province').children('option:selected').text();//获取到被选中的option省份值
				for( var city_1 in data.city ){//city_1代表了city里面的所有属性名即省份名称
					if( City2 == city_1 ){//如果上方循环道德属性名和获取到被选中的省份名一样就进入这个省份下的城市列表去去全部值出来
						for( var i=0; i<data.city[city_1].length; i++){//这边一定要使用索引了，如果还是用键值是实现不了的
							var City3 = '<option >'+ data.city[city_1][i] +'</option>';
							City1 += City3;
						}
						$('#city').empty().append(City1);
					}
				}
			});	

		//监听市的变化，然后显示相应的门店				
		$('#city').on('change',function(){
			//var oShop = document.getElementById('shop');
			//oShop.innerHTML = '<option>请选择</option>';
			var Shop = '<option>请选择</option>';
			var Shop2 = $('#city').children('option:selected').text();
			for( var shop_1 in data.shop ){//shop_1代表了shop里面的所有属性名即城市名称
				if( Shop2 == shop_1 ){
					
					for( var m in data.shop[shop_1]){//m代表了城市里面的所有属性名即'101'这些,下方取值也是用索引
						var Shop1 = '<option >'+ data.shop[shop_1][m].name +'</option>';
						Shop += Shop1;
					}
					$('#shop').empty().append(Shop);
				}
			}
		});

		//监听门店的变化，然后下方显示相应的内容				
		$('#shop').on('change',function(){
			var Shop = '';
			var Shop2 = $('#city').children('option:selected').text();
			var Shop3 = $('#shop').children('option:selected').text();
			//$('#txt1').text('门店地址:');
			//$('#txt2').text('赶快来参加活动吧！');
			for( var shop_1 in data.shop ){
				if( Shop2 == shop_1 ){
					for( var m in data.shop[shop_1]){
						if( Shop3 == data.shop[shop_1][m].name ){//当被选中的门店名称和循环到的门店相等的时候赋值
							//$('#shop_1').text(Shop3);
							$('#shop_address').text("已选择：" + data.shop[shop_1][m].address +" " + Shop3);
							$('#edit-field-addressprofile-und-0-value').val(data.shop[shop_1][m].address +" " + Shop3);
						}
					}
					//$('#shop').empty().append(Shop);
				}
			}
		});
	}
	
	var html1='<div class="modal fade" style="top:10%;" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">'+
    '<div class="modal-dialog">'+
        '<div class="modal-content">'+
            '<div class="modal-header">'+
                '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>'+
                '<h4 class="modal-title" id="myModalLabel">必填项目</h4>'+
            '</div>'+
            '<div class="modal-body">';
			
   var html2='</div>'+
            '<div class="modal-footer">'+
                '<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>'+
                '<button type="button" class="btn btn-primary">提交更改</button>'+
            '</div>'+
        '</div>'+
    '</div>'+
'</div>';
  function htmlmap(id,receievername,customerphone,addressprofile){
  return '<a class="list-group-item  " href="#" data="'+id+'">'+
				   '<div class="field field-name-field-receievername field-type-text field-label-inline clearfix">'+
                       '<div class="field-label">收货人</div>'+
                       '<div class="field-items">'+
                         '<div class="field-item even"> '+receievername+'</div>'	+					 
					   '</div>'+		   
                  '</div>'+
				  '<div class="field field-name-field-customerphone field-type-text field-label-inline clearfix">'+
                     '<div class="field-label">手机</div>'+
                     '<div class="field-items">'+
                         '<div class="field-item even">'+customerphone+'</div>'+
                     '</div>'+
                  '</div>'+
				  '<div class="field field-name-field-addressprofile field-type-text field-label-inline clearfix">'+
                     '<div class="field-label">收货地址</div>'+
                     '<div class="field-items">'+
                     '<div class="field-item even">'+addressprofile+'</div>'+
                     '</div>'+
                  '</div>'+			  
				'</a>';
  }
  
	function isNull( str ){
     if(str == "")
	    return true;
       var regu = "^[ ]+$";
       var re = new RegExp(regu);
       return re.test(str);
     }
	//校验
	window.addressCheck=function(add,id,pid){
	   
	   //编辑状态下，省份选择默认
	   //var add = $('#edit-field-addressprofile-und-0-value').val();
	   var create=true;
	   if(!isNull(add)){
	            create=false;
			    add = add.split(" ");
			    $('#province').val(add[0]);
			    $('#province').change();
				$("#city").val(add[1]);
				$('#city').change();
				$("#shop").val(add[2]);
				$('input[id=edit-field-detail-und-0-value]').val(add.splice(3,add.length-3).join(' '));
			}
			
	  $('#JHAddressEdit').on('hide.bs.modal', function () {
         $('#edit-customer-profile-billing-field-receievername-und-0-value').css("border-color","#ccc");
		 $('#edit-customer-profile-billing-field-customerphone-und-0-value').css("border-color","#ccc");
		 $('#city').css("border-color","#ccc");
		 $('#shop').css("border-color","#ccc");
	     $('input[id=edit-field-detail-und-0-value]').css("border-color","#ccc");
       });
	   
	   $('#address-edit-submit').one("click",function(){
	     var result='';
	     if(isNull($('#edit-customer-profile-billing-field-receievername-und-0-value').val())){
		     $('#edit-customer-profile-billing-field-receievername-und-0-value').css("border-color","red");
		     result+='<p class="text-danger">收货人姓名必填</p>';
		 }
		  if(isNull($('#edit-customer-profile-billing-field-customerphone-und-0-value').val())){
		     $('#edit-customer-profile-billing-field-customerphone-und-0-value').css("border-color","red");
		     result+='<p class="text-danger">收货人手机号必填</p>';
		 }
		  if($('#province').val()=="请选择"){
		     result+='<p class="text-danger">收货人省份必选</p>';
		  }
		   if($('#city').val()=="请选择"){
		     $('#city').css("border-color","red");
		     result+='<p class="text-danger">收货人市区必选</p>';
		 }
		  if($('#shop').val()=="请选择"){
		    $('#shop').css("border-color","red");
		    result+='<p class="text-danger">收货人社区必选</p>';
		 }
	
		  if(isNull( $('input[id=edit-field-detail-und-0-value]').val())){
		   $('input[id=edit-field-detail-und-0-value]').css("border-color","red");
		   result+='<p class="text-danger">收货人住址必填</p>';
		 }
	
	   
		 if(isNull(result)){
		     //var add = $('#edit-field-addressprofile-und-0-value').val().split(" ");
		     $('#edit-field-detail2-und-0-value').val($('#province').val() +" "  + $('#city').val()  +" " + $('#shop').val() +" " + $('input[id=edit-field-detail-und-0-value]').val());
			 //alert($('#edit-field-detail2-und-0-value').val());
			 //http://192.168.1.200/user/66/addressbook/billing/editajax/39
			 //http://192.168.1.200/user/66/addressbook/billing/create
			 //请求参数
        var list = {
		    'receievername':$('#edit-customer-profile-billing-field-receievername-und-0-value').val(),
			'customerphone':$('#edit-customer-profile-billing-field-customerphone-und-0-value').val(),
			'province':$('#province').val(),
			'city':$('#city').val(),
			'shop':$('#shop').val(),
			'detail':$('input[id=edit-field-detail-und-0-value]').val(),
			'detail2':$('#edit-field-detail2-und-0-value').val(),
			
		};
		
		var itemid=pid==""?$(".list-group-horizontal .active").attr("data"):pid;
		
        //
        $.ajax({
            //请求方式
            type : "POST",
            //请求的媒体类型
            contentType: "application/json;charset=UTF-8",
            //请求地址
            url : !create?"/user/"+jhuser.sub+"/addressbook/billing/editajax/"+itemid:"/user/"+jhuser.sub+"/addressbook/billing/createajax",
            //数据，json字符串
            data : JSON.stringify(list),
			dataType:"json",
            //请求成功
            success : function(result) {
			    if(result.status=='OK'){
				   $('#JHAddressEdit').modal('hide');	
				}
				if(create){
				   //http://api.map.baidu.com/geocoder/v2/?mcode=sha1:包名&address=中国成都人才市场&output=json&ak=你的ak
				    if(pid==""){
				   maps[result.profile_id]={"field_addressprofile":list.detail2,"field_receievername":list.receievername,"field_customerphone":list.customerphone,"default":0,"coor":[result.lon,result.lat]};
				   $(".customer_profile_billing .list-group").prepend(htmlmap(result.profile_id,list.receievername,list.customerphone,list.detail2));
				   $(".list-group-horizontal a").unbind("click",window.active);
				   $(".list-group-horizontal a").bind("click",window.active);
				   }
				   else{
				      window.location.reload();
				   }
				}
				else{
				   //$(".customer_profile_billing .list-group").prepend(htmlmap(result.profile_id,list.receievername,list.customerphone,list.detail2));
				   if(pid==""){
				     $(".customer_profile_billing .list-group a[data='"+id+"'] .field-name-field-receievername .field-item").text(list.receievername);
				     $(".customer_profile_billing .list-group a[data='"+id+"'] .field-name-field-customerphone .field-item").text(list.customerphone);
				     $(".customer_profile_billing .list-group a[data='"+id+"'] .field-name-field-addressprofile .field-item").text(list.detail2);
				   }
				   else{
				   
					 $(".field-name-field-addressprofile .field-item",$(".addressbook-links a[pid='"+pid+"']").parent().parent()).text(list.detail2);
					 $(".field-name-field-receievername .field-item",$(".addressbook-links a[pid='"+pid+"']").parent().parent()).text(list.receievername);
					 $(".field-name-field-customerphone .field-item",$(".addressbook-links a[pid='"+pid+"']").parent().parent()).text(list.customerphone);
				   }
				  
				}
				//{"field_addressprofile":"\u4e0a\u6d77 \u95f5\u884c\u533a \u5c0f\u6c34\u5934\u793e\u533a \u76db\u4e16\u5bb6\u56ed21\u53f7405","field_receievername":"\u5b59\u51ef","field_customerphone":"13234567434","default":0,"coor":["121.455269888200","31.262586764916"]}
                //console.log(result);
            },
            //请求失败，包含具体的错误信息
            error : function(e){
                console.log(e.status);
                console.log(e.responseText);
            },
			beforeSend:function(){
			    $('#address-edit-submit').attr({disabled:"disabled"});
			},
			
			complete:function(){
			    $('#address-edit-submit').removeAttr("disabled");
			}
			});
		    return true;
		}
		else{
		   //$(html1+result+html2).modal('show');
		   return false;
		}
	});
	}
	
	})(jQuery);