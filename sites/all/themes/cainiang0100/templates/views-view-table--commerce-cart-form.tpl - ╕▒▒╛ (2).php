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

<div id="JHCart">
	<lines-Item> </lines-Item>  
	 <table class="table table-hover JHCart" >
   <thead>
      <tr>
         <th style="width:30%" >蔬果名称</th>
         <th style="width:20%">单价</th>
		 <th style="width:20%">数量</th>
         <th style="width:20%">金额</th>
		 <th style="width:10%">操作</th>
      </tr>
   </thead>
   <tbody> 
	   <?php foreach ($rows as $row_count => $row): ?>
	   <tr ><td><?php   print $row["line_item_title"]; ?></td> <td><?php   print $row["commerce_unit_price"]; ?></td>
	   <td><?php   print $row["edit_quantity"]; ?></td> <td><?php   print $row["commerce_total"]; ?></td> <td><?php   print $row["edit_delete"]; ?></td></tr>
	   <?php endforeach; ?>
   </tbody>
</table>
</div>


<script type="x-template" id="quantityCom"> 
	 <ul class="list-unstyled JHCount">
	  <template v-if="show !='false'">
         <li  class="text-right"> 
		    <div  class="JHQuantity">
	    	    <label for="quantityinp">数量</label>
		    </div>
		 </li> 
      </template>
     <li>
	   <div class="JHCompositeCount" >
       <div id="quantity" class="input-group input-group-option quantity-wrapper">
            <span  class="input-group-addon input-group-addon-remove  btn JHNoBorder JHOperater" v-on:click="decrementHandler">
              <span v-if="quantity > 1" class="glyphicon glyphicon-minus"></span>
            </span>
            <input v-model="quantity"   name="quantity"   id="quantityinp" type="text" value="{{ quantity }}"  maxlength="5" class="form-control quantity-count form-text JHNoBorder" placeholder="1" oninput = "value=value.replace(/[^\d]/g,'')">
            <span class="input-group-addon input-group-addon-remove  btn JHNoBorder JHOperater" v-on:click="incrementHandler">
            <span class="glyphicon glyphicon-plus" ></span>
            </span>
       </div>
       </div>
	 </li>
	  <template v-if="unit != ''">
        <li>
		<label>
		  {{unit}}
        </label>
        </li>
      </template>
</ul>
</script> 

<script type="x-template" id="lineItem"> 
	  <tr>
	   <td>{{title}}</td>
	   <td>{{price}}元/{{unit}}</td> 
	   <td>
	   
	     <quantity-Com  :quantity="quantity" :unit="unit" show="false" v-on:increment="incrementTotal" ></quantity-Com>
	   </td> 
	   <td>{{total}}元</td> 
	   <td><a onclick="jQuery(this).next().mousedown()" href="#"><span class="glyphicon glyphicon-trash ajax-processed"></span></a> <input :name="'delete-line-item-'+id" class="delete-line-item form-submit ajax-processed" :id="'edit-edit-delete-'+id" style="display: none;" type="submit" value="删除"></td>
	  </tr>
</script> 

<script type="x-template" id="myCart"> 
 <table class="table table-hover JHCart" >
   <thead>
      <tr>
         <th style="width:30%" >蔬果名称</th>
         <th style="width:20%">单价</th>
		 <th style="width:20%">数量</th>
         <th style="width:20%">金额</th>
		 <th style="width:10%">操作</th>
      </tr>
   </thead>
   <tbody>
       <template v-for="item in myItems">
		 <lineItem :title=item.title :total=item.total  :price=item.price :quantity=item.quantity  :unit=item.unit :id=item.id ></lineItem>
       </template>
   </tbody>
</table>
</script> 
<script>
Vue.component('lineItem', {
	props:['total','price','title','quantity','unit','id'],
    template: "#lineItem",
	methods: {
       incrementTotal: function (amount) {
		this.quantity=amount;
        this.total=(amount*this.price).toFixed(2);
     }
    }
})

Vue.component('linesItem', {
    template: "#myCart",
	data(){
		 return {
		    myItems: [
             { total: '60.00',price: '20.00', title: 'Taobao1',quantity:1,unit:'箱',id:0},
             { total: '60.00',price: '20.00', title: 'Taobao2',quantity:1,unit:'箱' ,id:1},
             { total: '60.00',price: '20.00', title: 'Taobao3',quantity:2,unit:'箱' ,id:2}
            ] 
		 }
		 
	}
})

Vue.component('quantityCom', {
	props:['quantity','unit','show'],
    template: '#quantityCom',
	methods: {
      incrementHandler: function () {
		this.quantity+=1;
        this.$emit('increment',this.quantity);
       },
	  decrementHandler: function () {
		if(this.quantity>1){
			this.quantity-=1;
            this.$emit('increment',this.quantity);
		}	
       }
	   
    },
})


Vue.component('quantityCom2', {
	props:['quantity'],
    template: '<input v-model="quantity"  name="quantity"   type="text"  maxlength="5" class="form-control quantity-count form-text JHNoBorder" placeholder="1" oninput = "value=value.replace(/[^\d]/g,\'\')">'
})
new Vue({
  el: '#JHCart',
  
})

</script>
