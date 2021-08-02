<?php // Load and parse the XML document 

$rss =  @simplexml_load_file("http://rssmix.com/u/13072679/rss.xml");





$title =  $rss->channel->title;
$description =  $rss->channel->description;
?>
<html xml:lang="zh-cn" lang="zh-cn">

<head>
<?php if ($rss == false) { echo "<title>Web  RSS  Read</title>"; } ?>
    <title><?php echo $title; ?></title>
   <?php if ($rss == false) { echo " <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0,  minimum-scale=1.0, maximum-scale=1.0\"/>"; } ?>
    <script language="javascript">
        var t = null;

        t = setTimeout(time, 1000); //开始执行

        function time()

        {

            clearTimeout(t); //清除定时器

            dt = new Date();

            var y = dt.getYear() + 1900;

            var mm = dt.getMonth() + 1;

            var d = dt.getDate();

            var weekday = ["星期日", "星期一", "星期二", "星期三", "星期四", "星期五", "星期六"];

            var day = dt.getDay();

            var h = dt.getHours();

            var m = dt.getMinutes();

            var s = dt.getSeconds();

            if (h < 10) {
                h = "0" + h;
            }

            if (m < 10) {
                m = "0" + m;
            }

            if (s < 10) {
                s = "0" + s;
            }

            document.getElementById("timeShow").innerHTML = +y + "/" + mm + "/" + d + "/" + weekday[day] + " " + h + ":" + m + ":" + s + "";

            t = setTimeout(time, 1000); //设定定时器，循环执行           

        }
    </script>

</head>

<body>


    <script type="text/javascript" src="https://cdn.jsdelivr.net/gh/jinjiuling/webrss@2.4/jquery-1.8.2.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/jinjiuling/webrss@2.4/jquery.masonry.min.js"></script>
    <link href="https://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lxgw-wenkai-webfont@0.3.0/style.min.css" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/jinjiuling/webrss@2.3/dark.css" />
	<script src="about/js/Mouse.js"></script><!-- 点击烟花特效 -->
    <script type="text/javascript">
        function loadCSS() {
            if ((navigator.userAgent.match(/(phone|pad|pod|iPhone|iPod|ios|iPad|Android|wOSBrowser|BrowserNG|WebOS)/i))) {
                document.write('<link href="https://cdn.jsdelivr.net/gh/jinjiuling/webrss@2.1/waprss.css" rel="stylesheet" type="text/css" media="screen" />');
                //alert("shouji");
            } else {
                //alert("diannao");
                document.write('<link href="https://cdn.jsdelivr.net/gh/jinjiuling/webrss@2.1/pcrss.css" rel="stylesheet" type="text/css" media="screen" />');
            }
        }
        loadCSS();
function ClickMenu(diving) {
    //alert(diving);
    if (document.getElementById(diving).style.display == "none") {
        document.getElementById(diving).style.display = 'block';
    }
    else {
        document.getElementById(diving).style.display = 'none';
    }
}

	
        jQuery(function() {
            jQuery(window).load(function() {
                $(function() {
                    $('#container').masonry({
                        // options 设置选项
                        itemSelector: '.post', //class 选择器
                        columnWidth: 50, //一列的宽度 Integer
                        isAnimated: true, //使用jquery的布局变化  Boolean
                        animationOptions: {
                            //  Object { queue: false, duration: 500 }
                        },
                        gutterWidth: 0, //列的间隙 Integer
                        isFitWidth: true, // 适应宽度   Boolean
                        isResizableL: true, // 是否可调整大小 Boolean
                        isRTL: false, //使用从右到左的布局 Boolean
                    });
                });
                document.getElementById('foote').style.display = 'block'
            });
        });


    </script>

    
    <div class="scrollbar" id="style-1">
        <div id="title" style="font-family: LXGW WenKai;font-weight:600;height:auto;margin: 0 0 40px 0px;overflow: hidden;width: 100%;border-bottom:0px solid #009688; ">


            <div class="t" style="margin:10px;padding:0px 10px 0px 10px;">
                <h1 class="serif" style="font-weight:100;font-family: paopaozh,STliti,lisu,Georgia,Serif,sans-serif; color: #0366d6; width: 100%;text-align: center;font-size: 45;"><?php echo $title; ?></h1>
                <h1 id="ttt" class="serif" style="<?php if ($rss == true) { echo "display:none;"; } ?>font-weight:100;font-family: paopaozh;color:#0366d6 !important;width:100%;text-align: center;"> Web RSS Read</h1>
                <div class="des" style="color:#1a2a3a !important;width:100%;text-align: center;font size:16px;max-height:62px;"><?php echo $description; ?></div>

            </div>
            <div id="timeShow" class="time1" style="color:#1a2a3a;width:100%;float:left;text-align: center;"><p></div>
            <div class="proxy" style="color:#1a2a3a;width:100%;    margin: 0 0 0 0;text-align: center;"><?php echo "<a href=\"https://p.zzhsxy.workers.dev/\">"."🌏"."</a>"; ?> <?php echo "<a href=\"https://p.jinjiuling.tk/-----/\">"."代理"."</a>"; ?><a style="outline:none;" onclick="ClickMenu('hiden')">🌏</a></div>

        </div>
        <div id="add" style="<?php if ($rss == true) { echo "display:none;"; } ?>z-index:999999; text-align: center">
            <form style="align-content: center">

                <input type="text" onkeydown="this.onkeyup();" onkeyup="this.size=(this.value.length>4?this.value.length:4);" size="4" id="site" style="font-family: LXGW WenKai;cursor: url(https://cdn.jsdelivr.net/gh/mirai-mamori/web-img/img/Texto.cur), auto;min-width:300px;max-width:95%;padding-left: 65px;padding-right: 15px; border: none;outline:none;border-radius: 20px;height:40px; z-index:999999;border-color: #ffffff;background: #fff;font-size: 16px" placeholder="输入RSS链接..." />
<button type="button"onclick="jump()" style=" top: 5px; width: 52px; border-radius: 0 20px 20px 0;outline:none; height: 41px; right: 56px; border: none; color:#0366d6;font-family: FontAwesome;cursor:url(https://cdn.jsdelivr.net/gh/mirai-mamori/web-img/img/Ayu.cur), auto;position: relative;background: #fff;font-size:20px;"><svg t="1625977623397" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="3226" width="20" height="20"><path d="M431.944795 848.634071A424.251158 424.251158 0 1 1 841.439391 533.607823 36.100875 36.100875 0 0 1 771.082211 515.030365a352.181163 352.181163 0 1 0-637.299022 98.025734 352.312918 352.312918 0 0 0 527.678847 77.867215 36.100875 36.100875 0 1 1 47.168296 54.678333 424.119403 424.119403 0 0 1-276.685537 103.032424z" fill="#0060F7" p-id="3227"></path><path d="M980.967955 1024a36.100875 36.100875 0 0 1-23.979414-9.486361L767.12956 846.394236a36.100875 36.100875 0 0 1 47.958827-54.019558l189.858981 168.514668a36.100875 36.100875 0 0 1-23.979413 63.110654zM645.783189 466.808029a36.100875 36.100875 0 0 1-36.100875-36.100875 173.126094 173.126094 0 0 0-172.862584-172.862584 36.100875 36.100875 0 1 1 0-72.20175 245.327844 245.327844 0 0 1 245.064334 245.064334 36.100875 36.100875 0 0 1-36.100875 36.100875z" fill="#FF4B9D" p-id="3228"></path></svg></button>
                
            </form>
        </div>

        <script type="text/javascript">
            //敲回车键相当于确认键
            document.onkeydown = function(event) {
                var code = event.keyCode;
                if (code === 13) { //这是键盘的enter监听事件
                    $("#btn").focus();
                }
            };

            function jump() {
                var site = $("#site").val();
                if (site === '' || site === undefined || site == null) {
                    alert("没有输入链接！");
                    return;
                }
                window.location.href = "./?id=" + site;
            }
        </script>

        <div id="loading" class="load" style="<?php if ($rss == true) { echo "display:none;"; } ?>"><img class="mcj" src="https://api.ixiaowai.cn/mcapi/mcapi.php" />
        <div id="hiden" class="hi">
             <div style="padding: 5px 30px;margin-bottom: 10px;outline:none;">
             <span style="display:none;" id="hidden">
             <li><a style="font-family: 'Candyshop';color:#ff7600;" href="?id=https://rsshub.uneasy.win/dcard/sex">Dcard Sex</a></li>
<li><a style="font-family: 'Candyshop';color:#ff7600;" href="?id=https://rsshub.uneasy.win/2048/bbs/2048">2048</a></li>
             <li><a style="font-family: 'Candyshop';color:#ff7600;" href="?id=https://rsshub.uneasy.win/javbus/star/9pj">Xi Dao</a></li>
<li><a style="font-family: 'Candyshop';color:#ff7600;" href="?id=https://rsshub.uneasy.win/javbus/star/qfy">Xiang Ze</a></li>
<li><a style="font-family: 'Candyshop';color:#ff7600;" href="?id=https://rsshub.uneasy.win/javbus/star/vnf">Melody</a></li>
<li><a style="font-family: 'Candyshop';color:#ff7600;" href="?id=https://rsshub.uneasy.win/javbus/star/vfn">Qi Teng</a></li>
<li><a style="font-family: 'Candyshop';color:#ff7600;" href="?id=https://rsshub.uneasy.win/javbus/star/vbn">Mu Hei</a></li>
<li><a style="font-family: 'Candyshop';color:#ff7600;" href="?id=https://rsshub.uneasy.win/javbus/star/w4u">Xiao Ye</a></li>
<li><a style="font-family: 'Candyshop';color:#ff7600;" href="?id=https://rsshub.uneasy.win/javbus/star/pmv">Qiao Ben</a></li>
<li><a style="font-family: 'Candyshop';color:#ff7600;" href="?id=https://rsshub.uneasy.win/javbus/star/2m3">Da Gui</a></li>
<li><a style="font-family: 'Candyshop';color:#ff7600;" href="?id=https://rsshub.uneasy.win/javbus/star/vbt">Qing Kong</a></li>
<li><a style="font-family: 'Candyshop';color:#ff7600;" href="?id=http://tb.jinjiuling.tk/fpie.xml">Fpie</a></li>
             </span>
        </div>
        </div>
        </div>
        
        <div id="container" class="zong">
            <?php
// Here we'll put a loop to include each item's title and description
for ($i=0;$i<count($rss->channel->item);$i++){
        $k=$i+10;
        $n=$i+1;
        $time=strtotime($rss->channel->item[$i]->pubDate);
        date_default_timezone_set("GMT");
        $date = date("Y-m-d H:i:s", $time);
	$des=str_replace("width","",$rss->channel->item[$i]->description);
        $des1=str_replace("style=","",$des);
        $des2=str_replace("alt=","",$des1);
        $des3=str_replace("loading=\"lazy\"","",$des2);
        $content=str_replace("width","",$rss->channel->item[$i]->children('content', true)->encoded);
        $content1=str_replace("style=","",$content);
        $content2=str_replace("alt=","", $content1);
        $content3=str_replace("loading=\"lazy\"","",$content2);
        $title=str_replace("<a href","",$rss->channel->item[$i]->title);
  echo "<div class=\"posts\"><div id=\"root\" class=\"post\"onclick = \"document.getElementById('".$k."').style.display='block';document.getElementById('fade').style.display='block'\">";
  echo "<h3 style=\"color:#0366d6;height:30px;text-overflow:ellipsis;white-space:nowrap;overflow:hidden;\"><a>". $n .".". $title . "</a></h2>";
  echo "<h5><a>" . $rss->channel->item[$i]->author . "</a></h5>";
  echo "<h5><a>" . $rss->channel->item[$i]->children('dc', true)->creator . "</a></h5>";
  echo "<h5><a>" . $date . "</a></h5>";
  echo "<div onClick=\"event.cancelBubble = true\"><p>" . $des3 . "</p></div>";
  if (empty($des2)) {echo "<div onClick=\"event.cancelBubble = true\"><p>" . $content3 . "</p></div>";}
  echo "<p style=\"float: left;color:#0366d6;\" onClick=\"event.cancelBubble = true\"><a href='" . $rss->channel->item[$i]->link . "'>"."阅读原文"."</a></p>";
  echo "</div></div>";	
  
}
for ($i=0;$i<count($rss->channel->item);$i++){
        $k=$i+10;
	$des2=str_replace("src=\"http","src=\"http",$rss->channel->item[$i]->description);
        $content2=str_replace("width","",$rss->channel->item[$i]->children('content', true)->encoded);
        $content3=str_replace("style=","",$content2);

  echo "<div id=\"" .$k. "\" class=\"white_content\" onclick = \"document.getElementById('".$k."').style.display='none';document.getElementById('fade').style.display='none'\"><div style=\"margin:5px 15px 5px 15px;padding:0px 60px;\"><br>";
  echo "<h2 style=\"color:#0366d6;\">" . $rss->channel->item[$i]->title . "</h2>";
  echo "<h5><a>" . $rss->channel->item[$i]->author . "</a></h5>";
  echo "<h5><a>" . $rss->channel->item[$i]->pubDate . "</a></h5>";
  echo "<div onClick=\"event.cancelBubble = true\"><p>" . $des2 . "</p></div>";
   if (empty($des2)) { echo "<div onClick=\"event.cancelBubble = true\"><p>" . $content3 . "</p></div>";}
  echo "</div></div><div id=\"fade\" class=\"black_overlay\"></div>";
}
?>
        </div>
        <footer class="footer" id="foote" style="<?php if ($rss == true) { echo "display:none;position: inherit;margin-top: 100px;"; } else {echo "display:block;"; }?> ">
            <div class="footer-inner">
                <div class="copyright">
                    © 2020 –
                    <span itemprop="copyrightYear">2021</span>

                    <i class="fa fa-heart" onclick="ClickMenu('hidden')"></i>

                    <span class="author" itemprop="copyrightHolder" style="color:#1a2a3a">jinjiuling</span>
                    <span class="post-meta-divider">|</span>

                    <i class="fa fa-rss"></i>

                    <a style="color:#000;">浏览次数:</a>
                    <a title="页面浏览次数"><?php $count=file_get_contents("count.txt"); echo ++$count ; file_put_contents("count.txt",$count ); ?></a>
                    <span class="post-meta-divider">|</span>

                    <i class="fa fa-flag"></i>

                    <a style="color:#000;">item个数∶</a>
                    <span title="item个数"><?php echo count($rss->channel->item); ?></span>
                </div>
                <div class="powered-by" style="color:#000;">RSS源： <a style="color:#ff7600;" href="https://rsshub.uneasy.win/" class="theme-link" rel="noopener" target="_blank">RSShub</a>
                </div>
                <span class="post-meta-divider">|</span>
                <div class="theme-info" style="color:#000;">XSL – <a href="http://tb.jinjiuling.tk/fu.xsl" class="theme-link" style="color:#ff7600;" rel="noopener" target="_blank">fu.xsl</a>
                <span class="post-meta-divider">|</span>
                 <a href="/about" class="theme-link" style="color:#ff7600;" rel="noopener">About</a>
				</div>
            </div>
        </footer>
    </div>
</body>

</html>
