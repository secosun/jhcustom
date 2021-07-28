<?php

/**
 * @file
 * Default theme implementation to display a block.
 *
 * Available variables:
 * - $block->subject: Block title.
 * - $content: Block content.
 * - $block->module: Module that generated the block.
 * - $block->delta: An ID for the block, unique within each module.
 * - $block->region: The block region embedding the current block.
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. The default values can be one or more of the
 *   following:
 *   - block: The current template type, i.e., "theming hook".
 *   - block-[module]: The module generating the block. For example, the user
 *     module is responsible for handling the default user navigation block. In
 *     that case the class would be 'block-user'.
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 *
 * Helper variables:
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 * - $block_zebra: Outputs 'odd' and 'even' dependent on each block region.
 * - $zebra: Same output as $block_zebra but independent of any block region.
 * - $block_id: Counter dependent on each block region.
 * - $id: Same output as $block_id but independent of any block region.
 * - $is_front: Flags true when presented in the front page.
 * - $logged_in: Flags true when the current user is a logged-in member.
 * - $is_admin: Flags true when the current user is an administrator.
 * - $block_html_id: A valid HTML ID and guaranteed unique.
 *
 * @see template_preprocess()
 * @see template_preprocess_block()
 * @see template_process()
 *
 * @ingroup themeable
 */
?>
<?php drupal_add_js(drupal_get_path('theme', 'bartik_cainiang') . '/JS/ssxp.js',array( 'scope' => 'header', 'weight' => 121));?>
<div class="modal fade" id="JHAddressEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">收货地址</h4>
            </div>
            <div class="modal-body">
			
<div>
<div id="customer-profile-billing-ajax-wrapper">
   
      <div class="fieldset-wrapper">
	      <div class="field-type-text field-name-field-receievername field-widget-text-textfield form-wrapper" id="edit-customer-profile-billing-field-receievername">
		     <div id="customer-profile-billing-field-receievername-add-more-wrapper">
			     <div class="form-item form-type-textfield form-item-customer-profile-billing-field-receievername-und-0-value">
                     <label for="edit-customer-profile-billing-field-receievername-und-0-value">收货人 <span title="此项必填。" class="form-required">*</span></label>
                     <input name="customer_profile_billing[field_receievername][und][0][value]" class="text-full form-text form-control required" id="edit-customer-profile-billing-field-receievername-und-0-value" type="text" size="60" maxlength="255" value="孙西可">
                 </div>
             </div>
		  </div>
		  <div class="field-type-text field-name-field-customerphone field-widget-text-textfield form-wrapper" id="edit-customer-profile-billing-field-customerphone">
		      <div id="customer-profile-billing-field-customerphone-add-more-wrapper">
			       <div class="form-item form-type-textfield form-item-customer-profile-billing-field-customerphone-und-0-value">
                       <label for="edit-customer-profile-billing-field-customerphone-und-0-value">手机 <span title="此项必填。" class="form-required">*</span></label>
                       <input name="customer_profile_billing[field_customerphone][und][0][value]" class="text-full form-text form-control required" id="edit-customer-profile-billing-field-customerphone-und-0-value" type="text" size="60" maxlength="255" value="15019414588">
                   </div>
              </div>
		</div>
	   <label for="edit-customer-profile-billing-field-jingheaddress-und-0">收货地址 <span title="此项必填。" class="form-required">*</span></label>	
<div class="panel panel-default">
    <div class="panel-body">
       <fieldset class="customer_profile_billing form-wrapper" id="edit-customer-profile-billing--2">
		
		<div class="field-type-jingheaddressfield field-name-field-jingheaddress field-widget-jingheaddressfield-standard form-wrapper" id="edit-customer-profile-billing-field-jingheaddress">
		    <div id="customer-profile-billing-field-jingheaddress-add-more-wrapper">
			     <div class="form-item form-type-jingheaddressfield-container">
                    <div class="store">
			           <p id="shop_1"></p>
			           <p><span id="txt1"></span><span id="shop_address"></span></p>
		             </div>
	                <div class="form-group  form-inline">
                        <label for="province">所在市</label>
                        <select name="province" class="form-control" id="province">
	                      <option>请选择</option>
                        </select>
                        <label for="city">所在区</label>
                        <select name="city" class="form-control" id="city">
	                      <option>请选择</option>
                        </select>
	                    <label for="shop">所在社区</label>
                        <select name="shop" class="form-control" id="shop">
	                      <option>请选择</option>
                        </select>
                    </div>
                   <div class="form-item form-type-textfield  form-group" >
                       <label for="edit-field-detail-und-0-value">详细地址 <span title="此项必填。" class="form-required">*</span></label>
                       <input name="field_detail[und][0][value]" class="text-full form-text form-control required" id="edit-field-detail-und-0-value" type="text" size="60" maxlength="255" value="">
                   </div>
                   <div>
                     <input name="field_detail2[und][0][value]" class="hidden" id="edit-field-detail2-und-0-value" type="text" size="60" maxlength="255" value="">
                   </div>

                 </div>
              </div>
			</div>
		 </fieldset>
    </div>
</div>
		
    </div>

</div>
</div>
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                <button type="button" id="address-edit-submit" class="btn btn-primary">提交更改</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>


<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel">
        <div class="modal-dialog" role="document">
		<div class="modal-content"> 
		<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
		<h4 class="modal-title" id="deleteModalLabel">确认框</h4>
		</div>
		<div class="modal-body">
		<form>
		<div class="form-group">
		<label  class="control-label">确定要删除吗？</label>
		</div>
		</form> 
		</div> 
		<div class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal">返回</button>
		<button type="button" id="address-delete-submit" class="btn btn-primary">确认</button>
		</div>
		</div>
        </div>
</div>
