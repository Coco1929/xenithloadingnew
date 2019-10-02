<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/inc/css/bootstrap-grid.min.css"/>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Quicksand:300');

        body {
            padding: 0;
            margin: 0;

        }
        video {
                object-fit: cover;
            }

        .container_ {
            position:absolute;
            background-image: url(<?=$bg_img;?>);
            width: 100%;
            height: 100%;
            -webkit-background-size:cover;
            -moz-background-size:cover;
            -o-background-size:cover;
            background-size:cover;
        }

            <?php
        if(!empty(strpos($bg_img, '.webm'))) {
        ?>
             .video_bg{
                position: relative;
                max-height:700px;
            }
            .video_bg h1{font-size: 52px;}

            .video_wrap{
                position: relative;
                width:100%;
                height:100%;
                overflow:hidden;
            }
            .video_wrap video{
                min-height: 700px;
                min-width: 100%;
                width: 100%;
                background-position: center center;
                background-repeat: no-repeat;
            }
            .video_bg .post_title {
                display: block;
                width: 80%;
                height: auto;
                background: transparent;
                vertical-align: bottom;
                margin: auto;
                
                position: absolute;
                top:50%;
                left: 10%;
                z-index: 99999;
                padding-top: 15px;
                padding-bottom: 15px;
                text-align: center;
                color: #fff;
            }
            .video_bg .post_title .contact{
                font-size: 18px;
                color: #fff;
                border: 1px solid #fff;
                padding: 10px 20px;
                border-radius: 90px;
                display: inline-block;
                margin-top: 20px;
            }
            <?php } ?>

        .heading {
            font-family: 'Quicksand', sans-serif;
            display: -webkit-box;
            display: -webkit-flex;
            display: -moz-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -webkit-align-items: center;
            -moz-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-box-pack: center;
            -webkit-justify-content: center;
            -moz-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            font-size:21px;
            text-shadow: 0 0 10px #FFFFFF;
            color: #<?=$text_color;?>;
        }

        .music-player {
            position: absolute;
            <?php
                switch ($music_pos) {
                    case 1:
                        echo "";
                        break;
                    case 2:
                        echo "right:0;";
                        break;
                    case 3:
                        echo "bottom:0;";
                        break;
                    case 4:
                        echo "bottom:0; right:0;";
                        break;
                }
            ?>
            padding:15px;
            -webkit-border-radius:0 0 0 12px;
            -moz-border-radius:0 0 0 12px;
            border-radius:0 0 0 12px;
            background-color:rgba(255,255,255,0);
            font-family: 'Quicksand', sans-serif;
            font-size:25px;
            text-shadow: 0 0 10px #FFFFFF;
            color: #FFFFFF;
            z-index:9999999;

        }
        }
    </style>
    <script>

    </script>
</head>
<body>
<?php if($music_enabled == 1) { ?>
        <audio id="myaudio"preload="auto" autoplay="autoplay" src="<?=$music_path;?>"></audio>
        <audio id="myaudio">
            <source src="<?=$music_path;?>">
        </audio>
    <div class="music-player">
        Now playing:<br> <b><?=$music_name;?></b>
    </div>
    <?php } ?>
    <script>
        var audio = document.getElementById("myaudio");
        audio.volume = <?=$music_volume/100;?>;
    </script>
<?php
        if(!empty(strpos($bg_img, '.webm'))) {
        ?>
<div class="video_bg">

    <div class="post_title entry_post">
       <?=$style;?>
    </div>


        <div class="video_wrap">
            <?php
            if(empty(strpos($bg_img, '.gif') || strpos($bg_img, '.jpg') || strpos($bg_img, '.png'))) {
            ?>
            <video id='my-video' class='fullscreen-bg video-js' loop muted autoplay preload='none'
                   style="width:100vw; height:100vh;"
                   poster='MY_VIDEO_POSTER.jpg' data-setup='{}'>
                <source src="<?=$bg_img;?>" type="video/webm">

                <p class='vjs-no-js'>
                    To view this video please enable JavaScript, and consider upgrading to a web browser that
                    <a href='https://videojs.com/html5-video-support/' target='_blank'>supports HTML5 video</a>
                </p>
            </video>
                <?php
            }
            ?>
        </div>

</div>
<?php } else { ?>
<div class="container_">
    
    <div class="oncenter">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <?=$style;?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="heading">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>
<div style="display:none;">
    <span id="mapname"></span>
    <span id="gamemode"></span>
    <span id="maxply"></span>
    <span id="mapimg"></span>
    <span id="steamid"></span>
    <span id="plyimg"></span>
    <span id="plyname"></span>
    <span id="progress"></span>
    <span id="progress-percentage"></span>
    <span id="status"></span>
</div>
<?=\App\Lib\LoadingScreenFramework::render();?>
    
<script type="text/javascript">
        GameDetails('servername', 'serverurl', 'mapname', 64, '76561197960287930', 'gamemode')
</script>
<script src='https://vjs.zencdn.net/7.5.4/video.js'></script>
</body>
</html>

