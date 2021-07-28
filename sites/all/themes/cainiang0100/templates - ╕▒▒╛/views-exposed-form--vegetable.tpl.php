<?php

/**
 * @file
 * This template handles the layout of the views exposed filter form.
 *
 * Variables available:
 * - $widgets: An array of exposed form widgets. Each widget contains:
 * - $widget->label: The visible label to print. May be optional.
 * - $widget->operator: The operator for the widget. May be optional.
 * - $widget->widget: The widget itself.
 * - $sort_by: The select box to sort the view using an exposed form.
 * - $sort_order: The select box with the ASC, DESC options to define order. May be optional.
 * - $items_per_page: The select box with the available items per page. May be optional.
 * - $offset: A textfield to define the offset of the view. May be optional.
 * - $reset_button: A button to reset the exposed filter applied. May be optional.
 * - $button: The submit button for the form.
 *
 * @ingroup views_templates
 */
?>
<?php if (!empty($q)): ?>
  <?php
    // This ensures that, if clean URLs are off, the 'q' is added first so that
    // it shows up first in the URL.
    print $q;
  ?>
<?php endif; ?>

<div class="views-exposed-form">
  <div class="container  views-exposed-widgets clearfix">
    <?php 
	   $index = 0;
	   foreach ($widgets as $id => $widget): 
	       if($index==0 ||$index==7)
		   {
			 print '<div class="row">'; 
		   }
		  
	   ?>
	
      <div id="<?php print $widget->id; ?>-wrapper" class="col-xs-12 
	  col-sm-6 col-md-4 col-lg-3 views-exposed-widget views-widget-<?php print $id; ?>">
	  <div class="JHRadioCenter">
        <?php if (!empty($widget->label)): ?>
          <label for="<?php print $widget->id; ?>">
            <?php print $widget->label; ?>
          </label>
        <?php endif; ?>
        <?php if (!empty($widget->operator)): ?>
          <div class="views-operator">
            <?php print $widget->operator; ?>
          </div>
        <?php endif; ?>
        <div class="views-widget RadioStyle">
          <?php 
		  //dsm($widget);
		  print $widget->widget; ?>
        </div>
        <?php if (!empty($widget->description)): ?>
          <div class="description">
            <?php print $widget->description; ?>
          </div>
        <?php endif; ?>
		<div class="JHClear"></div>
		</div>
		
      </div>
	  
    <?php 
	        if($index==3 ||$index==11)
			{
			    print '<div class="clearfix visible-lg"></div>';
			}
			else if($index==2 || $index==10)
			{
				print '<div class="clearfix visible-md"></div>';	
			}
			else if($index==1 || $index==9)
			{
				print '<div class="clearfix  visible-sm"></div>';	
			}
			else if($index==0 || $index==8)
			{
				print '<div class="clearfix  visible-xs"></div>';	
			}

	       if($index==7 || $index == sizeof($widgets) -1 )
		   {
			 print '</div>'; 
		   }
		    $index++;
	      endforeach; ?>
    <?php if (!empty($sort_by)): ?>
      <div class="views-exposed-widget views-widget-sort-by">
        <?php print $sort_by; ?>
      </div>
      <div class="views-exposed-widget views-widget-sort-order">
        <?php print $sort_order; ?>
      </div>
    <?php endif; ?>
    <?php if (!empty($items_per_page)): ?>
      <div class="views-exposed-widget views-widget-per-page">
        <?php print $items_per_page; ?>
      </div>
    <?php endif; ?>
    <?php if (!empty($offset)): ?>
      <div class="views-exposed-widget views-widget-offset">
        <?php print $offset; ?>
      </div>
    <?php endif; ?>
	<div class="row">
    <div class="views-exposed-widget views-submit-button">
     <!-- <?php print str_replace("form-submit","form-submit btn btn-default",$button); ?>
	 <input class="form-submit btn btn-default" id="edit-submit-fruit" type="submit" value="搜索">-->
	 <button class="form-submit btn btn-default" id="edit-submit-fruit" type="submit" value="搜索">
          <span class="glyphicon glyphicon-search"></span> 搜蔬菜
     </button>
    </div>
    <?php if (!empty($reset_button)): ?>
      <div class="views-exposed-widget views-reset-button">
       <!--  <?php print str_replace("form-submit","form-submit btn btn-default",$reset_button); ?>
		<input name="op" class="form-submit btn btn-default" id="edit-reset" type="submit" value="重置">-->
		 <button name="op" class="form-submit btn btn-default" id="edit-reset" type="submit" value="重置">
          <span class="glyphicon glyphicon-repeat"></span> 重置
        </button>
      </div>
    <?php endif; ?>
	   
  </div>
  </div>
</div>
