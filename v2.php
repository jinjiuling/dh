<?php

$source=$_GET['source'];
$source=str_replace("vmess://","",$source);
if ($_GET['source']==false){$source="ew0KICAidiI6ICIyIiwNCiAgInBzIjogImdpdGh1Yi5jb20vZnJlZWZxIC0g576O5Zu9Q2xvdWRGbGFyZeiKgueCuSA0MiIsDQogICJhZGQiOiAiMTcyLjY3LjY5LjM2IiwNCiAgInBvcnQiOiAiNDQzIiwNCiAgImlkIjogImUyNmU4ZTU2LTZhZjYtZmUyMi1kMWVkLTkyNjY1MGI4OWM3NiIsDQogICJhaWQiOiAiMCIsDQogICJuZXQiOiAid3MiLA0KICAidHlwZSI6ICJub25lIiwNCiAgImhvc3QiOiAibnNhd3NyYi5tb29uY2xvdWQuYmlrZSIsDQogICJwYXRoIjogIi9mb2tmdndzIiwNCiAgInRscyI6ICJ0bHMiDQp9";echo "已使用默认配置";}
else{echo "已使用输入配置";}
include'v2ip.php';
//echo $source;
$source=base64_decode($source);
$json=json_decode($source, true);
for ($i=0;$i<count($ip);$i++){
$json[ps]="cf-".$i;
$json[add]=$ip[$i];
$unjson=json_encode($json);
$base=base64_encode($unjson);
$link.="vmess://".$base.PHP_EOL;
$link1.=base64_encode($link);
}
$link1.PHP_EOL;
file_put_contents("1v2",$link);
$link2=base64_encode(file_get_contents('1v2'));
file_put_contents("v2",$link2);
echo $link2;
