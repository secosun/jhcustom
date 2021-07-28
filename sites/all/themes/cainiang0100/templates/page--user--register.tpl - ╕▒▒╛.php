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

<div id="page-wrapper" >
   <div id="page" >

   
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

  <div id="main-wrapper"  class="clearfix" >
      <div id="main" class="clearfix">
       <div id="content" class="column">
          <div class="section"> 
              <div class="passport-page signup-skin1">
			      <div class="yk-header">
				  <div class="yk-box">
				       <a href="//www.youku.com" class="yk-logo"><i></i></a>
			      </div>
			  </div>
			  <div class="yk-container">
			        <div class="right">
					     <div class="loginbox">
						      <div class="loginhead">
							      <div class="title">欢迎注册井河菜网</div>
								  <div class="extand"><a class="link-minor" href="javascript:;" id="J_BtnLogin"></a></div>
							  </div>
							  <div id="J_PageLogin">
							      <div class="formbox" id="signupArea"  data-page="signup">
								       <?php print render($page['content']); ?>  
							</div>
							<div class="entry save">
											<input widget="input" id="remember" name="remember" type="checkbox" checked="checked" disabled="true" tabindex="4">
											<label for="remember" style="display:inline">同意 </label>
											<a href="//www.youku.com/pub/youku/service/agreement.shtml" target="_blank">井河注册协议</a> 及 <a href="//www.youku.com/pub/youku/service/copyright.shtml" target="_blank">版权声明</a>
							</div>
							<div class="form-other">
								<span>已有账号  <a class="link-minor" href="/user/login?from=header&amp;user=signup">直接登录</a></span>
							</div>
							<div class="splitline-or" style="display:none"><span>或</span></div>
							<div class="thirdparties passport-inner" style="display:none" id="connectLoginArea">
							     <div class="main-links">
								     <ul class="clearfix">
									     <li>
										    <a connect="qzone" config=" 'cp': 1000208, 'cpp': 4001521, 'width': 710, 'height': 400, 'title': '腾讯QQ' " title="用QQ账号登录" charset="hz-4003757-1000494"><i class="ico-QQ"></i><em>QQ账号登录</em></a>
										</li>
										<li>
										    <a connect="taobao" config=" 'cp': 0, 'cpp': 0, 'width': 670, 'height': 620, 'title': '淘宝' " title="用淘宝账号登录" charset="hz-4003759-1000494"><i class="ico-taobao"></i><em>淘宝账号登录</em></a>
										</li>
										<li>
										    <a connect="wechat" config=" 'cp': 0, 'cpp': 0, 'width': 400, 'height': 570, 'title': '微信' " title="用微信扫码登录" charset="hz-4009931-1000494"><i class="ico-wechat"></i><em>微信扫码登录</em></a></li>
										<li>
										    <a connect="alipay" config=" 'cp': 1000208, 'cpp': 4002404, 'width': 950, 'height': 700, 'title': '支付宝' " title="用支付宝账号登录" charset="hz-4003759-1000494"><i class="ico-zfb"></i><em>支付宝账号登录</em></a>
										</li>
									</ul>
								</div>
						
         </div>
		 	
      </div> <!-- /.section, /#content -->   
 </div></div> <!-- /#main, /#main-wrapper -->

  <?php if ($page['triptych_first'] || $page['triptych_middle'] || $page['triptych_last']): ?>
    <div id="triptych-wrapper"><div id="triptych" class="clearfix">
      <?php print render($page['triptych_first']); ?>
      <?php print render($page['triptych_middle']); ?>
      <?php print render($page['triptych_last']); ?>
    </div></div> <!-- /#triptych, /#triptych-wrapper -->
  <?php endif; ?>

  
   <div style="clear:both"></div>	
</div>

</div> <!-- /#page, /#page-wrapper 1043e71.all123.net-->
