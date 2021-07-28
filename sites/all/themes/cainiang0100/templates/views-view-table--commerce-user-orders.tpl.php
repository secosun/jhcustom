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


    <?php foreach ($rows as $row_count => $row): ?>
	<table class="table jhorder">
      <tbody>
        <tr <?php if ($row_classes[$row_count]) { print 'class="' . implode(' ', $row_classes[$row_count]) .'"';  } ?>>
        <?php foreach ($row as $field => $content): ?>
		 <?php if ($field=='created'): ?>
          <td <?php if ($field_classes[$field][$row_count]) { print 'class="'. $field_classes[$field][$row_count] . '" '; } ?><?php print drupal_attributes($field_attributes[$field][$row_count]); ?>>
           <b> <?php   print $content; ?></b>
          </td>
		  <?php endif; ?>
        <?php endforeach; ?>
		 <?php foreach ($row as $field => $content): ?>
		 <?php if ($field=='order_number'): ?>
          <td <?php if ($field_classes[$field][$row_count]) { print 'class="'. $field_classes[$field][$row_count] . '" '; } ?><?php print drupal_attributes($field_attributes[$field][$row_count]); ?>>
            订单号：<?php   print $content; ?>
          </td>
		  <?php endif; ?>
        <?php endforeach; ?>
		<td class="views-field" colspan="20">
		   <a href="#">
          <span class="glyphicon glyphicon-trash"></span>
        </a>
		</td>
        </tr>
	  </tbody>
	  </table>
	 <?php  
          $order_number=  simplexml_load_string($row['order_number'],'SimpleXMLElement', LIBXML_NOCDATA);
		  $jsonStr = json_encode($order_number);
          $jsonArray = json_decode($jsonStr,true);
	      print $order_details[$jsonArray[0]];
		
		  ?>
	  	
    <?php endforeach; ?>



