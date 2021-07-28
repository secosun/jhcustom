<?php
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


function GetXian($default_shi){
  //向数据库中查询术语信息，
  $query_xian = db_select('taxonomy_term_data','ttd')
   ->fields('ttd', array('tid', 'name'));
   
   //将其父术语限定在前面的市的具体值上
  $query_xian->leftJoin('taxonomy_term_hierarchy', 'tth', 'ttd.tid = tth.tid' );
  //AND tth.parent = :parent', array(':parent' => $default_shi));
   $query_xian->condition('tth.parent', $default_shi,'='); 
    $query_xian->condition('ttd.vid', 14,'='); 
   //按照tid排序，并执行
  $result_xian = $query_xian->orderBy('tid')->execute()->fetchAll();
  return $result_xian;
}
function GetShi($default_sheng){
  $query_shi = db_select('taxonomy_term_data','ttd')
   ->fields('ttd', array('tid', 'name'));
   //将其父术语限定在前面的省份的具体值上
  $query_shi->leftJoin('taxonomy_term_hierarchy', 'tth', 'ttd.tid = tth.tid ');
   $query_shi->condition('tth.parent', $default_sheng,'='); 
      $query_shi->condition('ttd.vid', 14,'='); 
   //按照tid排序，并执行
  $result_shi = $query_shi->orderBy('tid')->execute()->fetchAll();
  return $result_shi;
}
function GetSheng(){
 //向数据库中查询省份信息，
 $query_sheng = db_select('taxonomy_term_data','ttd')
  ->fields('ttd', array('tid', 'name'));
  
  //因为省份是第一级术语，分类术语的父亲为0
  $query_sheng->leftJoin('taxonomy_term_hierarchy', 'tth', 'ttd.tid = tth.tid ');
  $query_sheng->condition('tth.parent', 0,'=');
  
  //需要确定术语所在的词汇表，就是我们在前面创建的地区
 $query_sheng->leftJoin('taxonomy_vocabulary', 'tv', 'ttd.vid = tv.vid ');
  $query_sheng->condition('tv.machine_name', 'UserArea');
  
  //按照tid排序，并执行
 $result_sheng = $query_sheng->orderBy('tid')->execute()->fetchAll();
 return  $result_sheng;
}

function GernateJson(){
  //module_load_include('inc', 'jingheaddressfield', 'ssx');
 $province = array(); 
 $city = array();  
 $city2 = array();
 $shop = array();  
 $shop2 = array();
 $res = new Result(); 
 //将返回的结果，进行迭代，为$sheng_options赋值。
 $i=0;
 $j=0;
 foreach (GetSheng() as $record1) {
    $province[$i++] = $record1->name;
	 //将返回的结果，进行迭代，为$shi_options赋值。
    foreach (GetShi($record1->tid) as $record2) {
      $city2[$j++] = $record2->name;
	  //将返回的结果，进行迭代，为$xian_options赋值。
      foreach (GetXian($record2->tid) as $record3) {
         $xian_options[$record3->tid] = $record3->name;
		 $shop2[$record3->tid] =new Shop();
         $shop2[$record3->tid]->setname($record3->name);  
         $shop2[$record3->tid]->setaddress($record1->name." ".$record2->name); 
		 
      }
	  $shop[$record2->name]=$shop2;
	  unset($shop2);
	  //unset($i);
    }
	$city[$record1->name]=$city2;
	unset($city2);
	$j=0;
  }
 $res->setprovince($province);  
 $res->setcity($city);
 $res->setshop($shop); 
 $objJSon = json_encode($res);  
 return $objJSon;  
}

?>