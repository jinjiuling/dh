<?php
$id=$_GET[id];
$url = "https://www.huya.com/".$id;
$ch = curl_init(); 
curl_setopt($ch, CURLOPT_URL, $url); 
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); 
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); 
$re = curl_exec($ch); 
$re = htmlspecialchars($re);
curl_close($ch);
preg_match('|stream&quot;: &quot;(.*?)&quot;        };|i',$re,$play);
$play = base64_decode($play[1]);
preg_match('|sStreamName":"(.*?)","|i',$play,$name);
preg_match('|m3u8","sHlsAntiCode":"(.*?)","|i',$play,$pam);
$pam = str_replace("&amp;","&",$pam[1]);
//$playurl = "http://121.12.115.15/txdirect.flv.huya.com/src/".$name[1].".m3u8";
//$playurl = "http://0d6e0ab7f6b628dc024bfbffd1dc637a.v.smtcdns.net/tx.hls.huya.com/src/".$name[1]."_4000.m3u8";
$playurl = "http://121.12.115.156/tx.hls.huya.com/src/".$name[1]."_4000.m3u8";

//header('Location:'.$playurl);
//echo $name[1]."_4000.m3u8".$pam;
echo $playurl;
?>
