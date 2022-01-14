<?php 
$url=$_GET['url'];
include'gethtml.php';
 if (strpos($url, 'torrent')){$magnet1=$url;}else{
$html=gethtml($url);
preg_match('|href="magnet(.*?)"|i',$html,$magnet);
//print_r($magnet);


$magnet=str_replace('href="','',$magnet[0]);
$magnet=str_replace('"','',$magnet);
}

?>
<!doctype html>
<html>

<head>
    <title>Webtor Player</title>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta content="ie=edge" http-equiv="x-ua-compatible">
    <style>
        html, body {
            margin: 0;
            padding: 0;
            overflow: hidden;
            width: 100%;
            height: 100%;
        }
        #player {
            height: 100%;
        }
        #controls {
            padding: 1rem;
        }
        #controls i {
            padding-top: 0.3rem;
            display: block;
        }
        .control {
            padding-right: 1rem;
        }
        #files {
            padding: 0.5rem;
        }
        #files a {
            padding: 0.5rem;
        }
    </style>
</head>

<body>
    <div id="player"></div>
    <div id="files"></div> 
    <script>
        window.webtor = window.webtor || [];
        window.webtor.push({
            id: 'player',
            baseUrl: 'https://webtor.io',
            // baseUrl: 'http://192.168.0.100:4000',
            magnet: '<?php echo $magnet;?>',
            torrentUrl:'<?php echo $magnet1;?>',
            // magnet: 'magnet:?xt=urn:btih:ca540adb8d37eb222d75aeca6954486842f72765',
            width: '100%',
            height: '100%',
            features: {
                continue:    false,
                // title:       false,
                // p2pProgress: false,
                // subtitles:   false,
                // settings:    false,
                // fullscreen:  false,
                // playpause:   false,
                // currentTime: false,
                // timeline:    false,
                // duration:    false,
                // volume:      false,
                // chromecast:  false,
            },
            on: function(e) {
                if (e.name == window.webtor.TORRENT_FETCHED) {
                    console.log('Torrent fetched!', e.data.files);
                    var p = e.player;
                    var files = document.getElementById('files');
                    for (const f of e.data.files) {
                        if (!f.name.endsWith('.mp4')) continue;
                        var a = document.createElement('a');
                        a.setAttribute('href', f.path);
                        a.innerText = f.name;
                        files.appendChild(a);
                        a.addEventListener('click', function(e) {
                            e.preventDefault();
                            p.open(e.target.getAttribute('href'));
                            return false;
                        });
                    }
                }
                if (e.name == window.webtor.TORRENT_ERROR) {
                    console.log('Torrent error!')
                }
                if (e.name == window.webtor.INITED) {
                    var p = e.player;
                    document.getElementById('play').addEventListener('click', function(ev) {
                        p.play();
                    });
                    document.getElementById('pause').addEventListener('click', function(ev) {
                        p.pause();
                    });
                    document.getElementById('moveto1min').addEventListener('click', function(ev) {
                        p.setPosition(60);
                    });
                    document.getElementById('movetostart').addEventListener('click', function(ev) {
                        p.setPosition(0);
                    });
                }
                if (e.name == window.webtor.PLAYER_STATUS) {
                    document.getElementById('player-status').innerHTML = e.data;
                }
                if (e.name == window.webtor.OPEN) {
                    console.log(e.data);
                }
                if (e.name == window.webtor.CURRENT_TIME) {
                    document.getElementById('current-time').innerHTML = parseInt(e.data);
                }
                if (e.name == window.webtor.DURATION) {
                    document.getElementById('duration').innerHTML = parseInt(e.data);
                }
                if (e.name == window.webtor.OPEN_SUBTITLES) {
                    console.log(e.data);
                }
            },
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@webtor/player-sdk-js@0.2.12/dist/index.min.js" charset="utf-8"></script>
</body>
