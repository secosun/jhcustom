var orderStatus = function($){
     $.post("/F2FPay/f2fpay/query.php",
              {out_trade_no: $("input[name=out_trade_no]").val()},
               function(data,status){			   
                   //window.console.log(data.alipay_trade_query_response.trade_status);  
                   if(data.alipay_trade_query_response.trade_status=='TRADE_SUCCESS')
                   {
                       location.href = "/"; 
                   }
                 },
              "json"
           );    
 }
 var int=self.setInterval('orderStatus(jQuery)',5000);   


