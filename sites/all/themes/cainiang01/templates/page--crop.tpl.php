<?php

/**
 * @file
 * Bartik's theme implementation to display a single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template normally located in the
 * modules/system directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 * - $hide_site_name: TRUE if the site name has been toggled off on the theme
 *   settings page. If hidden, the "element-invisible" class is added to make
 *   the site name visually hidden, but still accessible.
 * - $hide_site_slogan: TRUE if the site slogan has been toggled off on the
 *   theme settings page. If hidden, the "element-invisible" class is added to
 *   make the site slogan visually hidden, but still accessible.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['header']: Items for the header region.
 * - $page['featured']: Items for the featured region.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['triptych_first']: Items for the first triptych.
 * - $page['triptych_middle']: Items for the middle triptych.
 * - $page['triptych_last']: Items for the last triptych.
 * - $page['footer_firstcolumn']: Items for the first footer column.
 * - $page['footer_secondcolumn']: Items for the second footer column.
 * - $page['footer_thirdcolumn']: Items for the third footer column.
 * - $page['footer_fourthcolumn']: Items for the fourth footer column.
 * - $page['footer']: Items for the footer region.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 * @see bartik_process_page()
 * @see html.tpl.php
 */
?>
 <link href="/sites/all/themes/cainiang01/css/crop/jquery-ui-1.10.3.custom.min.css" rel="Stylesheet" type="text/css" /> 

 <link href="/sites/all/themes/cainiang01/css/crop/jquery.cropzoom.css" rel="Stylesheet" type="text/css" /> 
 <link rel="stylesheet" href="/sites/all/themes/cainiang01/css/crop/style.css" type="text/css" media="screen" />
 <!--[if IE 6]><link rel="stylesheet" href="/sites/all/themes/cainiang01/css/crop/style.ie6.css" type="text/css" media="screen" /><![endif]-->
 <!--[if IE 7]><link rel="stylesheet" href="/sites/all/themes/cainiang01/css/crop/style.ie7.css" type="text/css" media="screen" /><![endif]-->
 <style type="text/css">
        #zoom,#rot{
            width:360px;
            margin:auto;
            height:25px;
        }
 </style>
 <style type="text/css">
	#img_to_crop{
		-webkit-user-drag: element;
		-webkit-user-select: none;
	}
</style>

<script type="text/javascript" src="/sites/all/themes/cainiang01/css/js/script.js"></script>
<script type="text/javascript" src="/sites/all/themes/cainiang01/css/js/jquery.min-1.10.2.js"></script>
<script type="text/javascript" src="/sites/all/themes/cainiang01/css/js/jquery-ui-1.10.4.min.js"></script>
<script type="text/javascript" src="/sites/all/themes/cainiang01/css/js/jquery.cropzoom.js"></script>
<script type="text/javascript">
	function GetQueryString(name)
    {
       var reg = new RegExp("(^|&)"+ name +"=([^&]*)(&|$)");
       //var r = window.location.search.substr(1).match(reg);
	   var r = decodeURIComponent(window.location.href).split("?")[1].match(reg);
       if(r!=null)return  unescape(r[2]); return null;
    }

    (function($){
		$(document).ready(function(){
	   //var p = 'chicas1024.jpg';
	   //alert(GetQueryString("w"));
	   //var p = '/sites/default/files/pictures/' + GetQueryString("p");
	   var p = '/sites/default/files/pictures/<?php print render($page['content']); ?>';
       var cropzoom = $('#crop_container').cropzoom({
            width:400,
            height:300,
            bgColor: '#CCC',
            enableRotation:false,
            enableZoom:true,
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
                width:GetQueryString("w"),
                height:GetQueryString("h"),
                minZoom:10,
                maxZoom:150
            }
        });
        cropzoom.setSelector(45,45,100,100,false);
        $('#crop').click(function(){
            
             cropzoom.send('/uploadimages/1/2/3','POST',{},function(rta){
			     if(rta == "请先登录"){
				    window.location.href="/user/login";
				 }
				 else{
					 window.location.href="/";
					 //alert(rta);
				 }
                //$('.result').find('img').remove();
                //var img = $('<img />').attr('src',rta);
                //$('.result').find('.txt').hide().end().append(img);
				//alert(rta);
            });			
            
        });
        $('#restore').click(function(){
            $('.result').find('img').remove();
            $('.result').find('.txt').show()
            cropzoom.restore();
        })
    })
	})(jQuery)
</script>

<div id="page-wrapper"><div id="page">

  <div id="header" class="<?php print $secondary_menu ? 'with-secondary-menu': 'without-secondary-menu'; ?>"><div class="section clearfix JHTop">



    <div class="JHHeader">
       <?php print render($page['header']); ?>
       <div style="clear:both;" >    </div>
  

    <?php if ($main_menu): ?>
      <div id="main-menu" class="navigation element-invisible">
        <?php print theme('links__system_main_menu', array(
          'links' => $main_menu,
          'attributes' => array(
            'id' => 'main-menu-links',
            'class' => array('links', 'clearfix'),
          ),
          'heading' => array(
            'text' => t('Main menu'),
            'level' => 'h2',
            'class' => array('element-invisible'),
          ),
        )); ?>
      </div> <!-- /#main-menu -->
    <?php endif; ?>

    <?php if ($secondary_menu): ?>
      <div id="secondary-menu" class="navigation element-invisible">
        <?php print theme('links__system_secondary_menu', array(
          'links' => $secondary_menu,
          'attributes' => array(
            'id' => 'secondary-menu-links',
            'class' => array('links', 'inline', 'clearfix'),
          ),
          'heading' => array(
            'text' => t('Secondary menu'),
            'level' => 'h2',
            'class' => array('element-invisible'),
          ),
        )); ?>
      </div> <!-- /#secondary-menu -->
    <?php endif; ?>

  </div></div> <!-- /.section, /#header -->

  <?php if ($messages): ?>
    <div id="messages"><div class="section clearfix">
      <?php print $messages; ?>
    </div></div> <!-- /.section, /#messages -->
  <?php endif; ?>

  <?php if ($page['featured']): ?>
    <div id="featured"><div class="section clearfix">
      <?php print render($page['featured']); ?>
    </div></div> <!-- /.section, /#featured -->
  <?php endif; ?>
</div>
  <div id="main-wrapper" class="clearfix"><div id="main" class="crop clearfix">
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
                                                  <div class="result" style="display:none;">
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
                                              <span class="button-wrapper" id="restore" style="display:none;" >
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
                   
                    <div class="Footer-background"></div>
                </div>
        		<div class="cleared"></div>
            </div>
          </div>
		    </div>
        <div class="cleared"></div>

  </div></div> <!-- /#main, /#main-wrapper -->


  <div id="footer-wrapper"><div class="section">

    <?php if ($page['footer_firstcolumn'] || $page['footer_secondcolumn'] || $page['footer_thirdcolumn'] || $page['footer_fourthcolumn']): ?>
      <div id="footer-columns" class="clearfix">
        <?php print render($page['footer_firstcolumn']); ?>
        <?php print render($page['footer_secondcolumn']); ?>
        <?php print render($page['footer_thirdcolumn']); ?>
        <?php print render($page['footer_fourthcolumn']); ?>
      </div> <!-- /#footer-columns -->
    <?php endif; ?>

    <?php if ($page['footer']): ?>
      <div id="footer" class="clearfix">
        <?php print render($page['footer']); ?>
      </div> <!-- /#footer -->
    <?php endif; ?>

  </div></div> <!-- /.section, /#footer-wrapper -->

</div></div> <!-- /#page, /#page-wrapper -->
