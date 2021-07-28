
<!--<input name="quantity" class="form-text" id="edit-quantity" type="text" size="5" maxlength="128" value="1">-->

 


<!-- Render any remaining elements, such as hidden inputs (token, form_id, etc). -->


<ul class="list-unstyled JHCount">
   <?php  if(isset($variables['form']['#attributes']['unit'])): ?>
   <li  class="text-right"> <div  class="JHQuantity">
	    	 <label for="quantityinp">
			    数量
             </label>
		 </div></li> 
	  <?php endif; ?>
  <li  ><div class="JHCompositeCount" >
    <div id="quantity" class="input-group input-group-option quantity-wrapper">
        <span  class="input-group-addon input-group-addon-remove quantity-remove btn JHNoBorder JHOperater">
            <span class="glyphicon glyphicon-minus"></span>
        </span>
       <input  name="quantity"  id="quantityinp" type="text" value="<?php print $variables['form']['#default_value']?>"  maxlength="5" class="form-control quantity-count form-text JHNoBorder" placeholder="1" oninput = "value=value.replace(/[^\d]/g,'')">
        <span class="input-group-addon input-group-addon-remove quantity-add btn JHNoBorder JHOperater">
            <span class="glyphicon glyphicon-plus"></span>
        </span>
    </div>
</div></li>
  <li  ><label  >
       <?php 
	       if(isset($variables['form']['#attributes']['unit']))
             print $variables['form']['#attributes']['unit'];
       ?>
   </label></li>
</ul>






