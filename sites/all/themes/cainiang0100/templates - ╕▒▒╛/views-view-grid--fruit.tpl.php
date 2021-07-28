<?php

/**
 * @file
 * Default simple view template to display a rows in a grid.
 *
 * - $rows contains a nested array of rows. Each row contains an array of
 *   columns.
 *
 * @ingroup views_templates
 */
?>

<div class="container">
 <?php foreach ($rows as $row_number => $columns): ?>
      <div class="row">
        <?php 
		$index = 0;
		foreach ($columns as $column_number => $item): ?>
         <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3" ><?php print $item; ?>
		 </div>
		   <?php 
            if($index==2 || $index==5 || $index==8  )
			{
				print '<div class="clearfix visible-md"></div>';	
			}
			else if($index==1 || $index==3 || $index==5 || $index==7 || $index==9 )
			{
				print '<div class="clearfix  visible-sm"></div>';	
			}
			if($index！=11)
			{
				print '<div class="clearfix  visible-xs"></div>';	
			}
			
			$index++;
			?>
        <?php endforeach; ?>
      </div>
  <?php endforeach; ?>
</div>