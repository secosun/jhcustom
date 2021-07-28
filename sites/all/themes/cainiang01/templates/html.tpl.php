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
<html>
<head >
   <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
   <meta name="x5-page-mode" content="app"/>
   <meta name="browsermode" content="application"/>
   <link href="/sites/all/themes/cainiang01/css/bootstrap.min.css" rel="stylesheet"/>
   <link href="/sites/all/themes/cainiang01/css/Menu.css" rel="stylesheet"/>
   <link href="/sites/all/themes/cainiang01/css/style.css" rel="stylesheet"/>
   <link href="/sites/all/themes/cainiang01/css/custom.css" rel="stylesheet"/>
   <link href="/sites/all/themes/cainiang01/slider/css/muslider_demo.css" rel="stylesheet"/>
   <link href="/sites/all/themes/cainiang01/css/content.css" rel="stylesheet"/> 
   <title><?php print $head_title; ?></title>
</head>
<body class="<?php print $classes; ?> jhmodal-open" <?php print $attributes;?>>
     
 <div id="JingHeUserNav" class="JingHeUserNav">
     <div class="JingHeNav">
        <!--Login Element-->
 
   <aside class="JHLogin">
      <?php print l("登录","user/login"); ?>
        |
       <?php print l("注册","user/register"); ?>
   </aside>

    
     </div>
	  
	  <div class="JHmenu clearfix">
	  <div class="JHmenu-hd" >
	          <a id="" href="/cart">
			     <span class="glyphicon glyphicon-shopping-cart"></span>
				 我的篮子
			  </a>
			 
      </div>
	  <div class="JHmenu-hd">
	          <a id="JHOrder" href="/user/0/orders/">
			     <span class="glyphicon glyphicon-book"></span>
				 我的订单
			  </a>
			 
      </div>
	  <div class="JHmenu-hd dropdown">
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
 </div>

<?php print $page; ?>
  <script src="/sites/all/themes/cainiang01/JS/jquery-2.2.4.min.js?qaqqk5"></script>
  <script src="/sites/all/themes/cainiang01/JS/bootstrap.min.js?qaqqk5"></script>
  <script src="/sites/all/themes/cainiang01/JS/vue.min.js?qaqqk5"></script>
  <!--<script src="//lib.sinaapp.com/js/jquery/2.2.4/jquery-2.2.4.min.js"></script>
  <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.js"></script>
  <script src="//cdn.staticfile.org/vue/2.2.2/vue.min.js"></script>-->
  <script type="text/javascript" src="/sites/all/themes/cainiang01/JS/jQuery Easing.js"></script>
  <script type="text/javascript" src="/sites/all/themes/cainiang01/JS/Menu.js"></script>
  <?php print $page_bottom; ?>
  
</body>
</html>