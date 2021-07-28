<?php

/**
 * Returns HTML for a set of filter tips.
 */
function listing_sql_alter_views_query_alter(&$view, &$query){
 if(($view->name == "fruit" || $view->name == "vegetable") && $view->current_display == "page"){
   //$query->distinct = true;
   //$query->has_aggregate = true;
   //$query->add_field('commerce_product_field_data_field_product_reference','product_id','product_id',array('function'=>'max'));
   //$query->add_field(null,'MAX(commerce_product_field_data_field_product_reference.product_id)','product_id');
   $query->add_field('field_data_commerce_price','commerce_price_amount','commerce_price_amount',array('function'=>'max'));
   $query->groupBy=array('node_created','nid');
    $query->add_groupby('nid');
	$query->add_groupby('node_created');
	 //create the join
    $join = new views_join();
    $join->table = 'field_data_commerce_price';
    $join->field = 'entity_id';
    $join->left_table = 'commerce_product_field_data_field_product_reference';
    $join->left_field = 'product_id';
    $join->type = 'LEFT';
    //add the join the the view query
    $query->add_relationship('field_data_commerce_price',$join,'commerce_product_field_data_field_product_reference');
  // dpm($query);
 }  
}?>