<?php 
header("Content-type: text/html; charset=UTF-8");
$memcache = new Memcache; 
$memcache->connect('localhost', 11211) or die ("Could not connect"); 

$version = $memcache->getVersion(); 
echo "Memcache服务器版本: ".$version."<br/>\n"; 

$tmp_object = new stdClass; 
$tmp_object->str_attr = '缓存测试文本'; 
$tmp_object->int_attr = 123; 

$memcache->set('key', $tmp_object, false, 10) or die ("Failed to save data at the server"); 
echo "存入缓存数据 (设置10秒过期)<br/>\n"; 

$get_result = $memcache->get('key'); 
echo "从缓存取数据:<br/>\n"; 
var_dump($get_result); 
