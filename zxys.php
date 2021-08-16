<?php
include'gethtml.php';
$s=$_GET['s'];
if ($s==0) {$s=0;}
$e=$_GET['e'];
if ($e==0) {$e=500;}

$html=gethtml("https://tingxiaoshuo.cc/listen/api/chapter?bookId=1144&uid=0&sort=asc&size=20");
$html=str_replace("list","lis",$html);
file_put_contents("zxys.json",$html);
$html1=file_get_contents("zxys.json");
$html2=json_decode($html, true);
$header='<?xml version="1.0" encoding="utf-8"?><rss version="2.0"><channel><title>赘婿</title><image><url>http://fdfs.xmcdn.com/group20/M03/E2/EC/wKgJJ1fOJO3jH0VwAAI0dJM0ztI964_web_large.jpg</url></image><description><![CDATA[一个受够了勾心斗角、生死打拼的金融界巨头回到了古代，进入一商贾之家最没地位的赘婿身体后的休闲故事。家国天下事，本已不欲去碰的他，却又如何能避得过了。"有人曾站在金...]]></description>';
	$footer='</channel></rss>';

//print_r($html2);
for ($i=$s;$i<$e;$i++){
//echo $html2[data][lis][$i][chapterTitle];
//echo $html2[data][lis][$i][chapterId];
$time=date('D, d F Y h:i:s',strtotime("+".$i. "minute"));

$rss.="<item>\n\t<title><![CDATA[".$i.$html2[data][lis][$i][chapterTitle]."]]></title>\n\t<link><![CDATA[http://tb.jinjiuling.tk/tingchina/zxjx.php?id=".$html2[data][lis][$i][chapterId]."]]></link>\n\t<description><![CDATA[<img src=\"http://fdfs.xmcdn.com/group20/M03/E2/EC/wKgJJ1fOJO3jH0VwAAI0dJM0ztI964_web_large.jpg\">]]></description>\n\t<enclosure url=\"http://tb.jinjiuling.tk/tingchina/zxjx.php?id=".$html2[data][lis][$i][chapterId]."\" type=\"audio/mp3\" length=\"1\"/>\n\t<pubDate>$time GMT</pubDate>\n</item>\n";
}
file_put_contents('zx1.xml',$header.$rss.$footer);
