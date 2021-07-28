<?php
/**
 * @file
 * Default theme implementation to display the basic html structure of a single
 * Drupal page.
 *
 * Variables:
 * - $css: An array of CSS files for the current page.
 * - $language: (object) The language the site is being displayed in.
 *   $language->language contains its textual representation.
 *   $language->dir contains the language direction. It will either be 'ltr' or 'rtl'.
 * - $rdf_namespaces: All the RDF namespace prefixes used in the HTML document.
 * - $grddl_profile: A GRDDL profile allowing agents to extract the RDF data.
 * - $head_title: A modified version of the page title, for use in the TITLE
 *   tag.
 * - $head_title_array: (array) An associative array containing the string parts
 *   that were used to generate the $head_title variable, already prepared to be
 *   output as TITLE tag. The key/value pairs may contain one or more of the
 *   following, depending on conditions:
 *   - title: The title of the current page, if any.
 *   - name: The name of the site.
 *   - slogan: The slogan of the site, if any, and if there is no title.
 * - $head: Markup for the HEAD section (including meta tags, keyword tags, and
 *   so on).
 * - $styles: Style tags necessary to import all CSS files for the page.
 * - $scripts: Script tags necessary to load the JavaScript files and settings
 *   for the page.
 * - $page_top: Initial markup from any modules that have altered the
 *   page. This variable should always be output first, before all other dynamic
 *   content.
 * - $page: The rendered page content.
 * - $page_bottom: Final closing markup from any modules that have altered the
 *   page. This variable should always be output last, after all other dynamic
 *   content.
 * - $classes String of classes that can be used to style contextually through
 *   CSS.
 *
 * @see template_preprocess()
 * @see template_preprocess_html()
 * @see template_process()
 *
 * @ingroup themeable
 */
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language; ?>" version="XHTML+RDFa 1.0" dir="<?php print $language->dir; ?>"<?php print $rdf_namespaces; ?>>

<head profile="<?php print $grddl_profile; ?>">
   <?php print $head; ?>
   <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<!-- UC应用模式 -->

<!-- QQ应用模式 -->
<meta name="x5-page-mode" content="app">

<meta name="browsermode" content="application">
  <link href="/sites/all/themes/cainiang01/css/bootstrap.min.css" rel="stylesheet">
  <title><?php print $head_title; ?></title>
  <?php print $styles; ?>
  <?php print $scripts; ?>
  <style>
      .glyphicon{
		  top:2px;
	  }
	  .JHmenu-hd{
		  float:right;
		  height: 35px;
		  line-height: 35px;
		  margin-right:60px;
	  }
      .JingHeUserNav{
          width:100%;
          background-color:rgba(232,232,232,1);
          position:fixed;
          top:0;
          z-index:9998;
          
      }
      .JingHeNav{
         margin-left:20px;
         height:35px;
         line-height:35px;
		 float:left;
      }
     .JHUser a{
        color:rgba(108,108,108,1);
       }
    
     .JHLogin a{
        color:rgba(108,108,108,1);
        text-decoration:none;
      }
     .JHMenu{
            float:left;
      }
     .JHLogo{
            
            margin-right:20px;
            margin-left:40px;
      }
     .JHHeader{
        /* overflow:hidden;*/
        border-bottom: rgb(187,187,187) solid 1px;
      }
    
body{
	
	overflow:none;
}
  </style>
  <style>
@media (max-width: 768px) {
	.JHmenu-hd{
		margin-right:3px !important;
	}
	.dropdown{
		display:none;
	}
	#content .section,.sidebar .section {
        padding: 0;
    }
  .block-block 
  {
     float:none !important;
   } 
  .block-search
  {
	 width:100% !important; 
	 float:none !important;
  }
   .JHSearch
  {
	  
	  margin:0 25px;
  }
  .JHFilter > .view-filters   {
   margin:0 auto;
}
   .JHFilter > .view-content{
	  margin:0 auto;  
   }
   
   .container{
	   padding-left:0;
	   padding-right:0;
	   
   }
   .col-xs-1,.col-sm-1{
	   padding-left:0;
	   padding-right:0;
	   
   }
   
   #slider_wrapper{
	   margin-left:0;
	   margin-right:0;
	   width:100%;
   }
   .slider,.slider div,.slider img {
	    margin-left:0;
	   margin-right:0;
	   width:100% !important;
   }
   .slider img {
	   height:auto !important;
   }
}





@media (min-width: 768px) and (max-width: 992px) {
	
  .block-block 
  {
     float:none !important;
   } 
  .block-search
  {
	 width:100% !important; 
	 float:none !important;
  }
  .JHSearch
  {
	  
	  margin:0 100px;
  }
  
   #slider_wrapper{
	   margin-left:0;
	   margin-right:0;
	   width:100%;
   }
   .slider,.slider div,.slider img {
	    margin-left:0;
	   margin-right:0;
	   width:100% !important;
   }
   .slider img {
	   height:auto !important;
   }

  
}
@media (max-width: 1100px) {

  .block-search
  {
	 width:auto !important; 
  }

  
}

@media (min-width: 1100px) and (max-width: 1200px) {

  .block-search
  {
	 width:45% !important; 
  }

  
}


</style>
 
</head>
<body class="<?php print $classes; ?>" <?php print $attributes;?>>
  <div id="skip-link">
    <a href="#main-content" class="element-invisible element-focusable"><?php print t('Skip to main content'); ?></a>
  </div>
      <?php print $page_top; ?>
 
 <div id="JingHeUserNav" class="JingHeUserNav">
     <div class="JingHeNav">
        <!--Login Element-->
 
   <aside class="JHLogin">
      <?php print l("登录","user/login"); ?>
        |
       <?php print l("注册","user/register"); ?>
   </aside>

    
     </div>
	  
	  
	  <div class="JHmenu-hd" >
	          <a id="" href="/cart">
			     <span class="glyphicon glyphicon-shopping-cart"></span>
				 我的菜篮子
			  </a>
			 
      </div>
	  <div class="JHmenu-hd" style="margin-right:10px;">
	          <a id="JHOrder" href="/user/0/orders/">
			     <span class="glyphicon glyphicon-book"></span>
				 我的订单
			  </a>
			 
      </div>
	  <div class="JHmenu-hd dropdown" style="margin-right:10px;">
			  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
					我的账户
					<b class="caret"></b>
				</a>
				<ul class="dropdown-menu">
					<li><a href="/choosePicture">上传头像</a></li>
					<li><a href="#">EJB</a></li>
					<li><a href="#">Jasper Report</a></li>
					<li class="divider"></li>
					<li><a href="#">分离的链接</a></li>
					<li class="divider"></li>
					<li><a href="#">另一个分离的链接</a></li>
				</ul>
			 
      </div>
 </div>
<?php print $page; ?>
  <?php print $page_bottom; ?>
</body>
</html>