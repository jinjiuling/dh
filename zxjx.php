<?php
include'gethtml.php';
$id=$_GET['id'];
$url="https://www.tingxiaoshuo.cc/web/index/getChapterUrl?bookId=1144&chapterId=".$id;
$html=gethtml($url);
$html=json_decode($html, true);
$realurl=str_replace("*","','",$html[src]);
$realurl1="<?php\n\$real=array('".$realurl."');";
file_put_contents("zxreal.php",$realurl1);
include'zxreal.php';
for ($i=0;$i<count($real);$i++) {
$realurl2.= chr($real[$i]);
}
header('Location:'.$realurl2);
