<?php

/**
 * @file
 * Bartik's theme implementation to display a node.
 *
 * Available variables:
 * - $title: the (sanitized) title of the node.
 * - $content: An array of node items. Use render($content) to print them all,
 *   or print a subset such as render($content['field_example']). Use
 *   hide($content['field_example']) to temporarily suppress the printing of a
 *   given element.
 * - $user_picture: The node author's picture from user-picture.tpl.php.
 * - $date: Formatted creation date. Preprocess functions can reformat it by
 *   calling format_date() with the desired parameters on the $created variable.
 * - $name: Themed username of node author output from theme_username().
 * - $node_url: Direct URL of the current node.
 * - $display_submitted: Whether submission information should be displayed.
 * - $submitted: Submission information created from $name and $date during
 *   template_preprocess_node().
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. The default values can be one or more of the
 *   following:
 *   - node: The current template type; for example, "theming hook".
 *   - node-[type]: The current node type. For example, if the node is a
 *     "Blog entry" it would result in "node-blog". Note that the machine
 *     name will often be in a short form of the human readable label.
 *   - node-teaser: Nodes in teaser form.
 *   - node-preview: Nodes in preview mode.
 *   The following are controlled through the node publishing options.
 *   - node-promoted: Nodes promoted to the front page.
 *   - node-sticky: Nodes ordered above other non-sticky nodes in teaser
 *     listings.
 *   - node-unpublished: Unpublished nodes visible only to administrators.
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 *
 * Other variables:
 * - $node: Full node object. Contains data that may not be safe.
 * - $type: Node type; for example, story, page, blog, etc.
 * - $comment_count: Number of comments attached to the node.
 * - $uid: User ID of the node author.
 * - $created: Time the node was published formatted in Unix timestamp.
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 * - $zebra: Outputs either "even" or "odd". Useful for zebra striping in
 *   teaser listings.
 * - $id: Position of the node. Increments each time it's output.
 *
 * Node status variables:
 * - $view_mode: View mode; for example, "full", "teaser".
 * - $teaser: Flag for the teaser state (shortcut for $view_mode == 'teaser').
 * - $page: Flag for the full page state.
 * - $promote: Flag for front page promotion state.
 * - $sticky: Flags for sticky post setting.
 * - $status: Flag for published status.
 * - $comment: State of comment settings for the node.
 * - $readmore: Flags true if the teaser content of the node cannot hold the
 *   main body content.
 * - $is_front: Flags true when presented in the front page.
 * - $logged_in: Flags true when the current user is a logged-in member.
 * - $is_admin: Flags true when the current user is an administrator.
 *
 * Field variables: for each field instance attached to the node a corresponding
 * variable is defined; for example, $node->body becomes $body. When needing to
 * access a field's raw values, developers/themers are strongly encouraged to
 * use these variables. Otherwise they will have to explicitly specify the
 * desired field language; for example, $node->body['en'], thus overriding any
 * language negotiation rule that was previously applied.
 *
 * @see template_preprocess()
 * @see template_preprocess_node()
 * @see template_process()
 */
?>

 <?php if (!$teaser): ?>
	<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>  

        
        <div id="product_content_header">??????</div> 
           <div class="container">	
               <div class="row">
		            <div class="col-sm-12 col-md-10 col-lg-10">
					  <div id="product_content">
               <div id="product_content_inner">  
			<div id="slider_wrapper">
				<div id="container" class="slider">
					<div class="slide">
						<img src="<?php print($variables['ajax-loader']); ?>" data-src="<?php 
               $uri=    $content['product:field_product_image']['#items'][0]['uri'];
               $url_image = url('sites/default/files/'.file_uri_target($uri), array('absolute'=>true));
              print $url_image;?>" alt="New York 2012 - Ben Fredricson" title="New York 2012 - Ben Fredricson" />
					</div>
                     <?php print($content['body']['#items'][0]['value']);?>
				</div>
				<div class="navslide">
					<p>
						<span class="prev glyphicon glyphicon-chevron-left"></span>
						<span class="start"><img src="<?php print url(drupal_get_path('theme', 'bartik_cainiang') . '/slider/images/start02.png', array('absolute'=>true) )?>" alt="start" title="start" /></span>
				<span class="stop"><img src="<?php print  url(drupal_get_path('theme','bartik_cainiang') . '/slider/images/pause02.png', array('absolute'=>true) )?>" alt="stop" title="stop" /></span>
						<span class="next glyphicon glyphicon-chevron-right"></span>	
					</p>
					<p>
					   <span class="jhcomm glyphicon glyphicon-comment jhcommentoperator" id="jhcomment" data-toggle="modal" data-backdrop="static" data-target="#myComment"></span>
					</p>
					<p>
                       <span attrid="-1" class="jhcomm glyphicon glyphicon-heart jhHeart center-block" style="color:grey"></span><span class="small center-block JHCommentLabel2 pull-right"><?php print $nodecommentlike; ?></span>
					</p>
					<p>
					   <span class="jhcomm glyphicon glyphicon-share-alt"></span>
					</p>
					
				</div>
			</div>
                </div>
	   </div>
					</div>
					<div class="clearfix  visible-xs"></div>
					
					<div class="col-sm-12 col-md-2 col-lg-2 hidden-xs" id="productContentSide">
					     <div  id="product_content_side">					  
                           <div class="product_name_for_sale">
                              <h1><?php print $title; ?></h1>
                           </div>
						   <?php
							  $amount['#title'] ='????????????';
							  hide($content['comments']);
							  hide($content['links']);
							  hide($content['body']);
							  hide($content['product:field_product_image']);
							  print render($content);
							?>		               
                       </div>  					  
                    </div> 
					
               </div>
			   
		   </div>    
            <div id="product_content_footer">
                    <?php   print render($content['comments']); ?>					
            </div> 
			
			  <div class="modal fade" id="myCart" aria-hidden="false" data-backdrop="false" role="dialog">
					   <div class="modal-dialog">
		                <div class="modal-content">
					     <div class="modal-header">
				            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			             </div>
						 <div id="cartContent"></div>
		                </div>
	                   </div>
              </div> 
			  <div class="modal fade" id="myComment" aria-hidden="false" data-backdrop="false" role="dialog">
					   <div class="modal-dialog">
		                <div class="modal-content">
					     
				            <button type="button" class="close" aria-hidden="true">&times;</button>
			            
						 <div id="commentContent"></div>
		                </div>
	                   </div>
              </div> 
			  
			
			<div id="product_content_footer_nav" style="height:25px;">
			  <nav class="navbar navbar-default navbar-fixed-bottom visible-xs" role="navigation" style="min-height:0;">
                <div class="container-fluid">
	               <div class="row" style="margin-bottom:0px;margin-top:0px;">
                     <div class="col-xs-6" style="margin-bottom:0px;margin-top:0px;">
	  	               <div class="btn-group-lg" style="margin-bottom:0px;margin-top:0px;">
		                   <button id="cart" type="button" class="btn btn-default navbar-btn btn-block"  style="margin-bottom:0px;margin-top:0px;" data-toggle="modal" data-target="#myCart" >
                              <span class="glyphicon glyphicon-shopping-cart"></span>????????????
                           </button>		
                       </div>
	                 </div>
                     <div class="col-xs-6">
	  	              <div class="btn-group-lg">
                         <button id="comment" type="button" class="btn btn-default navbar-btn btn-block" style="margin-bottom:0px;margin-top:0px;" data-toggle="modal" data-target="#myComment">
                            <span class="glyphicon glyphicon-pencil"></span>??????
                         </button>		
                     </div>
	                </div>      
                   </div>
                </div>
              </nav>
		    </div>
    </div>        
  <?php else: ?>
 	  <div class='temp'>
		<div class='temphol'>  
			 <!--  <img src="<?php print drupal_get_path('theme', 'bartik_cainiang') . '/images/thumb_screen_thumb.jpg'?>" class='stretch' alt='Your Blog' border='0'/> -->
	                <div class='product_info'>
                       
 	                 <table class="ownerTable">
	                     <tr class="subline">
                        <td class="alignright">
                           <label>????????????:</label>
                        </td>
                        <td>
                          <label>
						 
						  ????????????
						  </label>
                        </td>
                     </tr>
                     <tr class="subline">
                       <td class="alignright">
                           <label>????????????:</label>
                        </td>
                        <td>
                           <label>
						  
						   ??????????????????
						   </label>
                        </td>
                     </tr>
                       <tr class="subline">
                       <td class="alignright">
                           <label>????????????:</label>
                        </td>
                        <td>
                            <label>
							
							????????????
							</label>
                        </td>
                     </tr>
                     <tr class="subline">
                        <td class="alignright">
                           <label>????????????:</label>
                        </td>
                        <td>
                           <label>
						  
						    15019414588
						   </label>
                        </td>
                     </tr>
                     
                     
                     <tr class="subline">
                       <td class="alignright">
                           <label>?????????:</label>
                        </td>
                        <td>
                           <label>
						  
						     ??????????????????
						   </label>
                        </td>
                     </tr>
                  </table>
                 
                </div>
		<img src="<?php 
                                   $uri=    $content['product:field_product_image']['#items'][0]['uri'];
               $url_image = url('sites/default/files/'.file_uri_target($uri), array('absolute'=>true));
              print $url_image; ?>" class='front stretch' alt='color structure' border='0'/>
			  
		<div class='<?php 
			   $dateNow=time();
               $date=floor(($dateNow - $node->changed)/86400);
			   //print $date;
			   if($date < 10)
			   {
				 print 'new';  
			   }
			  //print date('Y-m-d H:i', $dateNow);
			  ?> bg_auto'>
		</div>
		<a href='<?php print render($node_url); ?>' class='thumb'></a> 
        </div>
	    <div class='tempde'>
		   <div class='tempname'><?php print render($title); ?></div>
		   <div class='tempprice bg_auto'>
              <?php print ($product_price); ?> ???/???
           </div>
		   
	    </div>
   </div>
<?php endif; ?>



