<?php

/**
 * @file
 * This template is used to print a single field in a view.
 *
 * It is not actually used in default Views, as this is registered as a theme
 * function which has better performance. For single overrides, the template is
 * perfectly okay.
 *
 * Variables available:
 * - $view: The view object
 * - $field: The field handler object that can process the input
 * - $row: The raw SQL result that can be used
 * - $output: The processed output that will normally be used.
 *
 * When fetching output from the $row, this construct should be used:
 * $data = $row->{$field->field_alias}
 *
 * The above will guarantee that you'll always get the correct data,
 * regardless of any changes in the aliasing that might happen if
 * the view is modified.
 */
?>
<?php 
//print $output;
//dsm($view);
// $...->result[0]->_field_data['commerce_line_item_field_data_commerce_line_items_line_item_']['entity']->commerce_product['und'][0]['product_id']
//$...->result[0]->field_commerce_total[0]['rendered']['#markup']
//$p = commerce_product_load($row->_field_data['commerce_line_item_field_data_commerce_line_items_line_item_']['entity']->commerce_product['und'][0]['product_id']);
//dsm($p);
//$...->field_price_unit['und'][0]['value']
//dsm($field);
//dsm($row);
//...->_field_data['commerce_line_item_field_data_commerce_line_items_line_item_']['entity']->commerce_product['und'][0]['product_id']
//print substr($output,2)."元/".$p->field_price_unit['und'][0]['value']; 
if($view->base_table =='commerce_order'){
	print substr($output,2)."元/".$row->_field_data['commerce_line_item_field_data_commerce_line_items_line_item_']['entity']->field_pricetype['und'][0]['safe_value'];
}
else{
	print substr($output,2)."元/".$row->_field_data['line_item_id']['entity']->field_pricetype['und'][0]['safe_value'];
}

//print substr($output,2)."元/".$row->_field_data['line_item_id']['entity']->field_pricetype['und'][0]['safe_value']; ?>
