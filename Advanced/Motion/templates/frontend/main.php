<html>
<head>
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=EDGE" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script
                src="https://code.jquery.com/jquery-3.4.1.min.js"
                integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
                crossorigin="anonymous"></script>
        <script src="/pub/scripts/modernizr-custom.js"></script>
        <script src="/pub/scripts/webshim/polyfiller.js"></script>
        <script>
            jQuery.webshims.polyfill('mediaelement');
        </script>
        <style>
            @import url('https://fonts.googleapis.com/css?family=Quicksand:300');

            body {
                padding: 0;
                margin:0;
            <?php
        if(!empty(strpos($video, '.gif') || strpos($video, '.jpg') || strpos($video, '.png'))) {
        ?>
                background: url(<?=$video;?>);
                background-size: cover;
                <?php } ?>
            }

            video {
                object-fit: cover;
            }

            .overlay {
                position:absolute;
                width:100vw;
                height:100vh;
                background:url("/pub/motion/overlay2.png");
                z-index:9999;
            }

            h1 {
               
                font-family: 'Quicksand', sans-serif;
                text-shadow: 0 0 10px #FFFFFF;
            }

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
                bottom: 0;
                position: absolute;
                top: 50%;
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

            .music-player {
                position: absolute;
            <?php
           switch ($theme['music_pos']) {
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
                z-index:99999;

            }

            #status {
                font-family: 'Quicksand', sans-serif;
                font-size: 22px;
            }

        </style>
        <link href="https://vjs.zencdn.net/7.5.4/video-js.css" rel="stylesheet">

        <!-- If you'd like to support IE8 (for Video.js versions prior to v7) -->
        <script src="https://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>
    </head>
</head>
<body>

<?php if($theme['music_enabled'] == 1) { ?>
    <audio id="myaudio"  preload="auto" autoplay="autoplay" src="<?=$theme['music_path'];?>"></audio>
    <audio id="myaudio" >
        <source src="<?=$theme['music_path'];?>">
    </audio>
    <div class="music-player">
        Now playing:<br> <b><?=$theme['music_name'];?></b>
    </div>
<?php } ?>
<script>
    var audio = document.getElementById("myaudio");
    audio.volume = <?=$theme['music_volume']/100;?>;
</script>
<?php if($overlay == true) {?>
<div class="overlay"></div>
<?php } ?>


<div class="video_bg">

    <div class="post_title entry_post"><h1><?=$heading;?></h1>
       <?=$style;?>

    </div>


        <div class="video_wrap">
            <?php
            if(empty(strpos($video, '.gif') || strpos($video, '.jpg') || strpos($video, '.png'))) {
            ?>
            <video id='my-video' class='fullscreen-bg video-js' loop muted autoplay preload='none'
                   style="width:100vw; height:100vh;"
                   poster='MY_VIDEO_POSTER.jpg' data-setup='{}'>
                <source src="<?=$video;?>" type="video/webm">

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