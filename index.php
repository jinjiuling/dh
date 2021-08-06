<?php
require __DIR__ . '/gethtml.php';
$rss=gethtml("https://rsshub.rssforever.com/dcard/sex");
$rss1=str_replace("src=\"http","src=\"https://imgpro.eu-gb.cf.appdomain.cloud/2/index.php?q=http",$rss);
echo $rss1;
