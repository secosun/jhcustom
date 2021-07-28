<?php 
header("Content-type: text/html; charset=utf-8");
 

print_r(date("Y-m-d H:i:s ",time()));
$weekarray=array("日","一","二","三","四","五","六"); 
echo "星期".$weekarray[date("w",time())];
//echo phpinfo();
class Result {  
  
public $province;  
  
public $city;  

public $shop; 
  
public function setprovince($province) {  
  
$this->province = $province;  
  
}  
  
public function getprovince() {  
  
return $this->province;  
  
}  
  
   
  
public function setcity($city) {  
  
$this->city = $city;  
  
}  
  
   
  
public function getcity() {  
  
return $this->city;  
  
}  

public function setshop($shop) {  
  
$this->shop = $shop;  
  
}  
  
   
  
public function getshop() {  
  
return $this->shop;  
  
}  
  
}  

class Shop{
public $name;  
  
public $address; 


public function setname($name) {  
  
$this->name = $name;  
  
}   

public function getname() {  
  
return $this->name;  
  
}  
  
   
  
public function setaddress($address) {  
  
$this->address = $address;  
  
}  
 


public function getaddress() {  
  
return $this->address;  
  
}  
  
   
  
}
$province = array();  
  
$province[0] = "上海";  
  
$province[1] = "深圳";  
  
$res = new Result();  
  
$res->setprovince($province);  


$city = array();  
$city2 = array();
$city2[0]="闵行";
$city2[1]="松江";
$city['上海']=$city2;
$city['上海']=$city2;
$city['深圳']=$city2;
$res->setcity($city); 

 
$shop = array();  
$shop2 = array();
$shop2[0] =new Shop();
$shop2[0]->setname("松坪山社区1");  
  
$shop2[0]->setaddress("上海 闵行"); 
$shop["闵行"]["101"]=$shop2[0];
$shop["闵行"]["102"]=$shop2[0];
$shop["松江"]["103"]=$shop2[0];
$shop["松江"]["104"]=$shop2[0];
$res->setshop($shop); 

$objJSon = json_encode($res);  
  
echo $objJSon;  


?>