<?php 
$id=$_GET['id'];
include'gethtml.php';
$html=gethtml($id);
$rss =  @simplexml_load_string($html);
$title=$rss->channel->title;
if ($rss == true) {
preg_match_all ("/:\/\/(.*?)\//", $id, $n);
$x=str_replace($n[0][0],"",$id);
$re=str_replace("/","",$x);
$er=str_replace("http","",$re);
$ter=$n[1][0].$er;
$ters=str_replace(".","",$ter);
//print_r($n);
//echo $ters;
$file=$ters.".txt";
if(file_exists($file)){
$d=file_get_contents($file);}
else{echo "RSS已收录，再次请求开始计数";}

for ($i=0;$i<count($rss->channel->item);$i++){
	$k.= strtotime($rss->channel->item[$i]->pubDate);
               $h=str_split($k,10);
}
$newArr = array();
foreach($h as $vo){
if($vo>$d)$newArr[] =$vo;	
}
//print_r($newArr);
//echo $d;
$l.=count($newArr);


$data=array(data=>array(num=>$l));
echo json_encode($data);
$last= strtotime($rss->channel->item->pubDate);
file_put_contents($ters.".txt",$last);
} else {
echo json_encode(array(data=>array(num=>-1)));
//echo "-1";
}
?>
