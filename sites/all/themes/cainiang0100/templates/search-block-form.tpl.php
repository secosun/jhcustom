<?php

/**
 * @file
 * Displays the search form block.
 *
 * Available variables:
 * - $search_form: The complete search form ready for print.
 * - $search: Associative array of search elements. Can be used to print each
 *   form element separately.
 *
 * Default elements within $search:
 * - $search['search_block_form']: Text input area wrapped in a div.
 * - $search['actions']: Rendered form buttons.
 * - $search['hidden']: Hidden form elements. Used to validate forms when
 *   submitted.
 *
 * Modules can add to the search form, so it is recommended to check for their
 * existence before printing. The default keys will always exist. To check for
 * a module-provided field, use code like this:
 * @code
 *   <?php if (isset($search['extra_field'])): ?>
 *     <div class="extra-field">
 *       <?php print $search['extra_field']; ?>
 *     </div>
 *   <?php endif; ?>
 * @endcode
 *
 * @see template_preprocess_search_block_form()
 */
?>
<style>
  .JHSearch{
     
     overflow:hidden;
  }
  
  .block-search{
	  float:right;
	  //position:absolute;
	  right:0;
	  top:0;
	  width:50%;
	  min-width:260px;
  }
  
  .block-block {
	  float:left;
  }
  .container-fluid{
	  min-width:300px;
	  width:100%;
  }
  .JHSearch input[type="text"]{
    color:black;
    width:100%;
  }
  .JHSearch input[type="submit"]{
    margin-left:-3px;
    background-color:rgb(255,102,0);
    color:white;
    width:100%;
    
  }

 .JHSearch input{
     vertical-align:middle;
     font-size:30px;
      border:2 solid rgb(255,102,0);
     height:60px;
   
 }
 .form-item-search-block-form{
	 width:70%;
 }
.JHSearch .form-actions{
	width:30%;
	min-width:80px;
	max-width:180px
	display:block;
	float:right;
}
</style>
<div class="JHSearch">
<div class="">
  <?php if (empty($variables['form']['#block']->subject)): ?>
    <h2 class="element-invisible"><?php print t('Search form'); ?></h2>
  <?php endif; ?>
  <?php print $search_form; ?>
</div>
</div>
