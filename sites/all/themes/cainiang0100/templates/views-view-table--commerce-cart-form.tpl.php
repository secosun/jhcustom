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
<div>
	<lines-Item ref="lines" > </lines-Item> 
</div>
<div class="line-item-summary">
    <div class="line-item-total">
    <span class="line-item-total-label">总计:</span> <span class="line-item-total-raw">{{totalAmount.toFixed(2)+"元"}}</span>
  </div>
</div>
<div class="form-actions commerce-line-item-actions form-wrapper" id="edit-actions">
<input name="op" class="btn btn-jhvege btn-lg form-submit" id="edit-checkout" type="submit" value="去结算" @click.stop.prevent="submit" :disabled="!totalAmount" ref='button'></div>
</div>

<div class="modal fade" id="myModal">
	  <div class="modal-dialog modal-sm">
	     <img alt="" src="data:image/gif;base64,R0lGODlhGQAZAJECAK7PTQBjpv///wAAACH/C05FVFNDQVBFMi4wAwEAAAAh/wtYTVAgRGF0YVhNUDw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuNS1jMDE0IDc5LjE1MTQ4MSwgMjAxMy8wMy8xMy0xMjowOToxNSAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0UmVmPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VSZWYjIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtcE1NOk9yaWdpbmFsRG9jdW1lbnRJRD0ieG1wLmRpZDo5OTYyNTQ4Ni02ZGVkLTI2NDUtODEwMy1kN2M4ODE4OWMxMTQiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6RUNGNUFGRUFGREFCMTFFM0FCNzVDRjQ1QzI4QjFBNjgiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6RUNGNUFGRTlGREFCMTFFM0FCNzVDRjQ1QzI4QjFBNjgiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENDIChXaW5kb3dzKSI+IDx4bXBNTTpEZXJpdmVkRnJvbSBzdFJlZjppbnN0YW5jZUlEPSJ4bXAuaWlkOjk5NjI1NDg2LTZkZWQtMjY0NS04MTAzLWQ3Yzg4MTg5YzExNCIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDo5OTYyNTQ4Ni02ZGVkLTI2NDUtODEwMy1kN2M4ODE4OWMxMTQiLz4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz4B//79/Pv6+fj39vX08/Lx8O/u7ezr6uno5+bl5OPi4eDf3t3c29rZ2NfW1dTT0tHQz87NzMvKycjHxsXEw8LBwL++vby7urm4t7a1tLOysbCvrq2sq6qpqKempaSjoqGgn56dnJuamZiXlpWUk5KRkI+OjYyLiomIh4aFhIOCgYB/fn18e3p5eHd2dXRzcnFwb25tbGtqaWhnZmVkY2JhYF9eXVxbWllYV1ZVVFNSUVBPTk1MS0pJSEdGRURDQkFAPz49PDs6OTg3NjU0MzIxMC8uLSwrKikoJyYlJCMiISAfHh0cGxoZGBcWFRQTEhEQDw4NDAsKCQgHBgUEAwIBAAAh+QQFCgACACwAAAAAGQAZAAACTpSPqcu9AKMUodqLpAb0+rxFnWeBIUdixwmNqRm6JLzJ38raqsGiaUXT6EqO4uIHRAYQyiHw0GxCkc7l9FdlUqWGKPX64mbFXqzxjDYWAAAh+QQFCgACACwCAAIAFQAKAAACHYyPAsuNH1SbME1ajbwra854Edh5GyeeV0oCLFkAACH5BAUKAAIALA0AAgAKABUAAAIUjI+py+0PYxO0WoCz3rz7D4bi+BUAIfkEBQoAAgAsAgANABUACgAAAh2EjxLLjQ9UmzBNWo28K2vOeBHYeRsnnldKBixZAAA7" />
	  </div><!-- /.modal-dialog -->	
</div><!-- /.modal -->

<script>
	
	function hideModal(){
		jQuery('#myModal').modal('hide');
	}
	
	function showModal(){
		jQuery('#myModal').modal({backdrop:'static',keyboard:false});
	}
</script>

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
	   <td>
               <input type="checkbox" v-model="todo.checked" @click="checkedChange" >
	   </td>
	   <td v-html="todo.title2" ></td>
	   <td>{{todo.price}}元/{{todo.unit}}</td> 
	   <td>
	   
	     <quantity-Com  :quantity="todo.quantity" :unit="todo.unit" show="false" v-on:increment="incrementTotal" ></quantity-Com>
	   </td> 
	   <td>{{todo.total}}元</td> 
	   <td><a onclick="jQuery(this).next().mousedown()" href="#"><span class="glyphicon glyphicon-trash ajax-processed"></span></a> <input :name="'delete-line-item-'+todo.id" class="delete-line-item form-submit ajax-processed" :id="'edit-edit-delete-'+todo.id" style="display: none;" type="submit" value="删除"></td>
	  </tr>
</script> 

<script type="x-template" id="myCart"> 
 <table class="table table-hover JHCart" >
   <thead>
      <tr>
	     <th style="width:5%;padding:0"> 
               <input type="checkbox"  v-model="checked"  title="全选">
		 </th>
         <th style="width:25%;padding:0" >蔬果名称</th>
         <th style="width:20%;padding:0">单价</th>
		 <th style="width:20%;padding:0">数量</th>
         <th style="width:20%;padding:0">金额</th>
		 <th style="width:10%;padding:0">操作</th>
      </tr>
   </thead>
   <tbody>
       <template v-for="item in myItems">
		 <!--<lineItem :title="item.title" :total="item.total"  :price="item.price" :quantity="item.quantity"  :unit="item.unit" :id="item.id" :pid="item.pid" ></lineItem>-->
		 
       </template>
	   <lineItem v-for="item in myItems" :todo="item | urlize" @checkedChange="onCheckedChange" ></lineItem>
   </tbody>
</table>
</script> 
<script>
Vue.component('lineItem', {
	//props:['total','price','title','quantity','unit','id','pid'],
	props:['todo'],
    template: "#lineItem",
	methods: {
       incrementTotal: function (amount) {
		this.todo.quantity=amount;
        this.todo.total=(amount*this.todo.price).toFixed(2);
		this.checkedChange();
       },
	   checkedChange: function(){
		   this.$emit('checkedChange',this.todo.checked,this.todo.id);
	   }
	 
    }
})

Vue.component('linesItem', {
    template: "#myCart",
	data(){
		 
		 return {myItems: [
			 <?php foreach ($result as $row_count => $row): ?>   
             { total: '<?php   print number_format($row->field_commerce_total[0]['raw']['amount']/100,2); ?>',price: '<?php   print number_format($row->field_commerce_unit_price[0]['raw']['amount']/100,2); ?>', title: '<?php   print $rows[$row_count]['line_item_title']; ?>',quantity:<?php   print $row->commerce_line_item_field_data_commerce_line_items_quantity; ?>,unit:'<?php print $row->_field_data['commerce_line_item_field_data_commerce_line_items_line_item_']['entity']->field_pricetype['und'][0]['value']; ?>',line_id:'<?php print $row->commerce_line_item_field_data_commerce_line_items_line_item_; ?>',id:<?php   print $row_count; ?>,pid:'<?php print $row->_field_data['commerce_line_item_field_data_commerce_line_items_line_item_']['entity']->commerce_product['und'][0]['product_id']; ?>',checked:false}, 
	   <?php endforeach; ?>
		   ],
          checked:'',
          totalAmount:0		  
		   }
		/* return {
		    myItems: [
             { total: '60.00',price: '20.00', title: 'Taobao1',quantity:1,unit:'箱',id:0,checked:true},
             { total: '60.00',price: '20.00', title: 'Taobao2',quantity:1,unit:'箱' ,id:1,checked:true},
             { total: '60.00',price: '20.00', title: 'Taobao3',quantity:2,unit:'箱' ,id:2,checked:true}
            ] 
		 }*/
		 
	},
	methods: {
		 onCheckedChange: function(checkedValue,id){
			 allChecked=true;
			 allNoChecked=true;
			 this.myItems.forEach(v=>{  
			    if(v.id==id){
					 v.checked=checkedValue;  
				}
				if(!v.checked){
					allChecked=false;
				}
                if(v.checked){
					allNoChecked=false;
				}   				
               });
			 if(allChecked){
				 this.checked=true;
			 }
			 if(allNoChecked){
				 this.checked=false;
			 }
			 if(!allNoChecked&&!allChecked){
				  this.noupdate=true;
				  this.checked=false;
			 }
			
			 totalAmount=0;
			 this.myItems.forEach(v=>{
				 if(v.checked){
					 totalAmount += parseFloat(v.total);
				 }
			 }); 
			 this.totalAmount=totalAmount;
			  
			 
	   }
	},
	watch:{
		totalAmount:function(val){
		  this.$parent.totalAmount=val;	
		},
        checked:function(val) {
			//alert('checked');
			if( this.noupdate!=true){
				this.myItems.forEach(v=>{  
                v.checked=val;  
              });
			}
			else{
				this.noupdate=false;
			}
			
			 totalAmount=0;
			 this.myItems.forEach(v=>{
				 if(v.checked){
					 totalAmount += parseFloat(v.total);
				 }
			 }); 
			 this.totalAmount=totalAmount;
        }
      },
    filters: {
      urlize: function (value) {
		  
        if (!value) return '';
        title = value.title.toString();
		value.title2=title.slice(0,title.indexOf(">")-1)+"?pid=" + value.pid +title.slice(title.indexOf(">")-1);
        return value;
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



new Vue({
  el: '#JHCart',
  data: {
    totalAmount: 0
  },
  methods: {
	

      submit: function () {
		  this.$refs.button.disabled = true;
		//alert("OK");
		jQuery.ajax({        
		    type: 'POST',        
			url: "/checkoutajax", 
			async:false,
		    data:this.$refs.lines.$data,
            beforeSend:function (){
					showModal();
					//alert('showModal');
			},			
			success: function (data) {  
                 hideModal();	
debugger;				 
                 window.location.href = '/checkout/'+data[0]; 		 
				}
			}
		)},
  }
})

</script>
