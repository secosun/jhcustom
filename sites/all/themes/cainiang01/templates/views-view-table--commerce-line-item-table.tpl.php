<?php

/**
 * @file
 * Template to display a view as a table.
 *
 * - $title : The title of this group of rows.  May be empty.
 * - $header: An array of header labels keyed by field id.
 * - $caption: The caption for this table. May be empty.
 * - $header_classes: An array of header classes keyed by field id.
 * - $fields: An array of CSS IDs to use for each field id.
 * - $classes: A class or classes to apply to the table, based on settings.
 * - $row_classes: An array of classes to apply to each row, indexed by row
 *   number. This matches the index in $rows.
 * - $rows: An array of row items. Each row is an array of content.
 *   $rows are keyed by row number, fields within rows are keyed by field ID.
 * - $field_classes: An array of classes to apply to each field, indexed by
 *   field id, then row number. This matches the index in $rows.
 * @ingroup views_templates
 */
?>
<table class="table table-hover">
     <tbody>
	       
	   <?php foreach ($rows as $row_count => $row): ?>
	       <?php if ($row_count==0) : ?> 
             <tr>
			   
				<td style="width:26%"> <?php   print $row['line_item_title']; ?></td>
				<td style="width:12%"><?php   print $row['commerce_unit_price']; ?></td>
				<td style="width:8%"><?php   print $row['quantity']; ?></td>
				<td rowspan="<?php   print count($rows ); ?>" style="width:15%;text-align:center;vertical-align:middle">向我投诉</td>
				<td style="width:10%"><b><?php   print $row['commerce_total']; ?></b></td>
				<td rowspan="<?php   print count($rows ); ?>" style="width:15%;text-align:center;vertical-align:middle"><?php   print $result[$row_count]->_field_data['status']; ?></td>
				<td rowspan="<?php   print count($rows ); ?>" style="width:24%;text-align:center;vertical-align:middle">取消订单</td>
			</tr>
			<?php else : ?>
			<tr>
				<td style="width:26%"><?php   print $row['line_item_title']; ?></td>
				<td style="width:12%"><?php   print $row['commerce_unit_price']; ?></td>
				<td style="width:8%"><?php   print $row['quantity']; ?></td>
				
				<td style="width:10%"><b><?php   print $row['commerce_total']; ?></b></td>
				
			</tr>
			<?php endif; ?>
       <?php endforeach; ?>
			<!--<tr>
				<td style="width:30%">砀山酥梨</td>
				<td style="width:8%">￥24</td>
				<td style="width:8%">1</td>
				<td rowspan="4" style="width:15%;text-align:center;vertical-align:middle">向我投诉</td>
				<td style="width:10%"><b>￥24</b></td>
				<td rowspan="4" style="width:15%;text-align:center;vertical-align:middle">待发货</td>
				<td rowspan="4" style="width:24%;text-align:center;vertical-align:middle">取消订单</td>
			</tr>
			<tr>
				<td style="width:30%">砀山酥梨</td>
				<td style="width:8%">￥24</td>
				<td style="width:8%">1</td>
				
				<td style="width:10%">￥24</td>
				
			</tr>
			<tr>
				<td style="width:30%">砀山酥梨</td>
				<td style="width:8%">￥24</td>
				<td style="width:8%">1</td>
				
				<td style="width:10%">￥24</td>
				
			</tr>
			<tr>
				<td style="width:30%">砀山酥梨</td>
				<td style="width:8%">￥24</td>
				<td style="width:8%">1</td>
				
				<td style="width:10%">￥24</td>
				
			</tr>-->
		</tbody>
</table>