<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US" xml:lang="en" xmlns:v="urn:schemas-microsoft-com:vml">
<head>
    <meta name="google-site-verification" content="LgblCrocw4d4ccdOkob0kzt3Ing7mMy1dKTtLoUb-2s" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="keywords" content="how crop images, how zoom images, crop image,CropZooom, rotate image, zoom image, jquery plugin, crop plugin, zoom plugin, rotation, croppping, zooming" />
	<meta name="description" content="CropZoom is a plugin that let you select, rotate and zoom an image to make a crop. This is free and ready to use." />  
    <title>CropZoom another Jquery Plugin</title>

   
    <script type="text/javascript" src="js/script.js"></script>
    <link href="css/jquery-ui-1.10.3.custom.min.css" rel="Stylesheet" type="text/css" /> 
    <link href="css/jquery.cropzoom.css" rel="Stylesheet" type="text/css" /> 
    <script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui-1.10.3.custom.min.js"></script>
    <script type="text/javascript" src="js/jquery.cropzoom.js"></script>
    <!--<script type="text/javascript" src="http://cropzoom.googlecode.com/svn/trunk/plugin/jquery.cropzoom.js"></script>-->
    <link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />
    <!--[if IE 6]><link rel="stylesheet" href="css/style.ie6.css" type="text/css" media="screen" /><![endif]-->
    <!--[if IE 7]><link rel="stylesheet" href="css/style.ie7.css" type="text/css" media="screen" /><![endif]-->
    <style type="text/css">
        #zoom,#rot{
            width:360px;
            margin:auto;
            height:25px;
        }
    </style>
    <script type="text/javascript">
	function GetQueryString(name)
    {
       var reg = new RegExp("(^|&)"+ name +"=([^&]*)(&|$)");
       var r = window.location.search.substr(1).match(reg);
       if(r!=null)return  unescape(r[2]); return null;
    }

    $(document).ready(function(){
	   //var p = 'chicas1024.jpg';
	   var p = '/sites/default/files/pictures/' + GetQueryString("p");
       var cropzoom = $('#crop_container').cropzoom({
            width:400,
            height:300,
            bgColor: '#CCC',
            enableRotation:false,
            enableZoom:false,
			enableResize: false,       //允许改变裁剪框的大小（自定义参数，下面有改动说明）
            zoomSteps:10,
            rotationSteps:10,
            selector:{
              w: 100,
              h: 100,
              maxHeight: 100,
              maxWidth: 100,	//4ge yi yang buke		  
              centered:true,
              startWithOverlay: true,
              borderColor:'blue',
              borderColorHover:'red'
            },
            image:{
                //source:'chicas1024.jpg',
				source: p ,
                width:1024,
                height:768,
                minZoom:10,
                maxZoom:150
            }
        });
        cropzoom.setSelector(45,45,100,100,false);
        $('#crop').click(function(){ 
            cropzoom.send('/uploadimages/1/2/3','POST',{},function(rta){
			     if(rta == "请先登录"){
				    window.location.href="/user/login"
				 }
                //$('.result').find('img').remove();
                //var img = $('<img />').attr('src',rta);
                //$('.result').find('.txt').hide().end().append(img);
				alert(rta);
            });
        });
        $('#restore').click(function(){
            $('.result').find('img').remove();
            $('.result').find('.txt').show()
            cropzoom.restore();
        })
    })
</script>
<style type="text/css">
	#img_to_crop{
		-webkit-user-drag: element;
		-webkit-user-select: none;
	}
</style>
</head>
<body>
<div id="page-background-simple-gradient">
    </div>
    <div id="page-background-glare">
        <div id="page-background-glare-image"></div>
    </div>
    <div id="main">
        <div class="Sheet">
            <div class="Sheet-tl"></div>
            <div class="Sheet-tr"></div>
            <div class="Sheet-bl"></div>
            <div class="Sheet-br"></div>
            <div class="Sheet-tc"></div>
            <div class="Sheet-bc"></div>
            <div class="Sheet-cl"></div>
            <div class="Sheet-cr"></div>
            <div class="Sheet-cc"></div>
            <div class="Sheet-body">
                <div class="nav">
                	<div class="l"></div>
                	<div class="r"></div>
                	<ul class="menu">
                		<li>
                			<a href="index.html" class=" active"><span class="l"></span><span class="r"></span><span class="t">首页</span></a>
                		</li>
                	</ul>
                </div>
                
                <div class="contentLayout">
                    <div class="content">
                        <div class="Post">
                            <div class="Post-body">
                                <div class="Post-inner">
                                        <div class="PostMetadataHeader">
                                            <h2 class="PostHeader">
                                                使用说明
                                            </h2>
                                        </div>
                                        <div class="PostContent">
                                            <p>请选择较小尺寸的图片，最小（100*100），最大（500*500）
                                             </p>
                                            
                                        </div>
                                        <div class="cleared"></div>
                                </div>
                                <div class="cleared"></div>
                            </div>
                        </div>
                              
                       
                        <div class="Post">
                            <div class="Post-body">
                                 <div class="Post-inner">
                                        <div class="PostMetadataHeader">
                                            <h2 class="PostHeader">
                                                头像剪切
                                            </h2>
                                        </div>
                                        <div class="PostContent">
                                              <div class="boxes">
                                                  <div id="crop_container"></div>
                                                  <div class="result">
                                                    <div class="txt">Here you will see the cropped image</div>
                                                  </div> 
                                                  <div class="cleared"></div> 
                                              </div>  
                                              <br />
                                              <span class="button-wrapper" id="crop">
                                                    <span class="l"> </span>
                                                    <span class="r"> </span>
                                                    <a class="button" href="javascript:void(0)">剪切</a>
                                              </span>
                                              &nbsp;
                                              <span class="button-wrapper" id="restore">
                                                    <span class="l"> </span>
                                                    <span class="r"> </span>
                                                    <a class="button" href="javascript:void(0)">再做一次</a>
                                              </span>
                                        </div>
                                        <div class="cleared"></div>
                                 </div>
                                 <div class="cleared"></div>
                            </div>
                        </div>
                     
				    </div>
			   
            
                <div class="cleared"></div><div class="Footer">
                    <div class="Footer-inner">
                        <div class="Footer-text">
                            <p><a href="mailto:gastonrobledo@gmail.com">Contact</a>
                                Copyright &copy; 2016 井河菜网. All Rights Reserved.</p>
                        </div>                                                                                     
                    </div>
                    <div class="Footer-background"></div>
                </div>
        		<div class="cleared"></div>
            </div>
          </div>
		    </div>
        <div class="cleared"></div>
    </div>

</body>
</html>
