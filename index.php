<?php

$title_find[0]=$link_find[0]=$des_find[0]='#/[\x00-\x08\x0b-\x0c\x0e-\x1f]/s#';
$title_replace[0]=$link_replace[0]=$des_replace[0]='';
$footer='</channel></rss>';
//以上为一些初始工作，不用管。
$header='<?xml version="1.0" encoding="utf-8"?><?xml-stylesheet type="text/xsl" href="fu.xsl"?><rss version="2.0"><channel><title>斗罗大陆</title>';//修改RSS名称
$html=gethtml('https://v.qq.com/detail/m/m441e3rjq9kwpsc.html');//要操作的网页。
$html=strpos($html,'charset=gb')===false?$html:iconv('GB2312','UTF-8//IGNORE',$html);//古董网页专用:(
$regex_item = '#<div class="mod_episode" r-show="{!showMore}">.+?<span class="item item_all" _stat="series:expand">#s';//正则规则在井号中间，s代表可匹配多行，否则只匹配单行，具体要看网页源代码。
$regex_item2 = '#.*?<a href="(?<link>.+?)".+?<span itemprop="episodeNumber">(?<title>.+?)</span>.*?#s';
if(preg_match_all($regex_item, $html, $items)){//在已经抓下来的网页中匹配"代码块"，每一"块"的原则是结构高度统一且必须包含链接、标题。概要可无，因为可以用标题替代。
	//print_r($items[0]);//调试用，如需调试，把最前面的双斜杠去掉。
	foreach($items[0] as $item){
		if(preg_match($regex_item2,$item)){
			$rss.=preg_replace_callback(
				$regex_item2,//对"块"分组捕获链接、标题、摘要并命名。
				function ($matches) {
					global $title_find,$title_replace,$link_find,$link_replace,$des_find,$des_replace;
					//以下可对title进行替换操作，酌情增减。
					$title_find[1]='#字数:#';
					$title_replace[1]=' ';
					$title_find[2]='#">#';
					$title_replace[2]=' ';
					//以下对link进行替换操作，酌情增减。此例增加网站域名，否则链接无效。
					$link_find[1]='#https://#';
					$link_replace[1]='https://vip.parwix.com:4433/player/?url=https://';
					//以下可对description进行替换操作，酌情增减。此例并无任何操作。
					$des_find[1]='#//#';
					$des_replace[1]='<img class="img-responsive" src="https://';
					$des_find[2]='#jpg#';
					$des_replace[2]='jpg"/>';
					$title=preg_replace($title_find,$title_replace,$matches['title']);//根据上面规则替换后输出title。$matches['title']为上面分组捕获的内容。
					$link=preg_replace($link_find,$link_replace,$matches['link']);//根据上面规则替换后输出link。
					$des=preg_replace($des_find,$des_replace,$matches['des']);//根据上面规则替换后输出description。
					//以下就是一条最基本的RSS内容了。\n和\t只是格式化了代码，并无大用，方便查错。
					return "<item>\n\t<title><![CDATA[".$title."]]></title>\n\t<link><![CDATA[".$link."]]></link>\n\t<description><![CDATA[<img class=\"figure_pic\" src=\"//puui.qpic.cn/vcover_vt_pic/0/m441e3rjq9kwpsc1607693898908/0\"/>]]></description>\n</item>\n";
				},
				$item
			);
		}
	}
	//echo  $rss;//调试用
	//大功告成，输出收工。

	$f=$header.$rss.$footer;
	$f=str_replace('<span class="item item_all" _stat="series:expand">','',$f);
	$f=str_replace('</a></span>','',$f);
	echo $f;
}
?>
