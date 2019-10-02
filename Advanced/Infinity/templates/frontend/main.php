<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <meta charset="utf-8">
    <title></title>


    <style>
        @import url(https://fonts.googleapis.com/css?family=Quicksand:200,300,400,700);

        body {
            color: #<?=$theme['text_color'];?>;
            background-image: url('<?=$theme['bg_img'];?>');
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
            font-family: Quicksand, sans-serif;
        }

        img {
            max-width: 100%;
        }

        .wrapper {
            margin: 0 auto;
            padding-top: 15%;
            
            width: 100%;
        }

        .player-welcoming {
            text-shadow: 0px 4px 4px rgba(0, 0, 0, 0.72);
            margin: 0 auto;
            line-height: 38px;
            font-size: 42px;
            text-align: left;
        }

        .player-welcoming .steamid {
            font-size: 18px;
            text-align: left;
        }

        .server-heading {
            text-align: center;
            margin: 0 auto;
            font-size: 72px;
            text-shadow: 0 0 10px #<?=$theme['text_color'];?>;
        }

        .common-info {
            margin: 0 auto;
            width: 100%;
        }

        .server-info {
            transform: translate(0, -50%);
            margin-top: 5%;
            font-size:19px;
            text-align: center;
        }

        .server-info .row {
            margin-top: 30px;
        }

        .server-info .row img {
            margin-right: 20px;
        }

        .progressbar-row span {
            margin: 0 auto;
        }

        .border-right {
            border-right:1px solid #fff;
        }
        .progressbar-row {
            max-width: 100%;
            margin: 0 auto;
            text-align: center;
            margin-top: 5%;
            text-shadow: 0px 4px 4px rgba(0, 0, 0, 0.72);
        }

        .progress-bar {

            background-color: #<?=$theme['first_circle_color'];?>;
        }

        .centering {
            color: #e0dfdc;
            text-shadow: 0 -1px 0 #fff, 0 1px 0 #2e2e2e, 0 2px 0 #2c2c2c, 0 3px 0 #2a2a2a, 0 4px 0 #282828, 0 5px 0 #262626, 0 22px 30px rgba(0,0,0,0.9), 2px 2px 2px rgba(206,89,55,0);
        }

        #plyimg {
            width: 200px;
            border-radius: 15px;
            -webkit-box-shadow: 0px 9px 11px 0px rgba(0, 0, 0, 0.84);
            -moz-box-shadow: 0px 9px 11px 0px rgba(0, 0, 0, 0.84);
            box-shadow: 0px 9px 11px 0px rgba(0, 0, 0, 0.84);
        }

        #mapimg {
            width: 300px;
            border-radius: 15px;
            -webkit-box-shadow: 0px 9px 11px 0px rgba(0, 0, 0, 0.84);
            -moz-box-shadow: 0px 9px 11px 0px rgba(0, 0, 0, 0.84);
            box-shadow: 0px 9px 11px 0px rgba(0, 0, 0, 0.84);
        }

        .img img {

        }

        .progress-line {
            width:0%;
            -webkit-transition: width 1500ms ease-in-out;
-moz-transition: width 1500ms ease-in-out;
-ms-transition: width 1500ms ease-in-out;
-o-transition: width 1500ms ease-in-out;
transition: width 1500ms ease-in-out;
            background-color: #fff;
            height: 1px;
            margin: 9px;
        }
        
        .mycol-md-3 {
            display:inline-block;
            width:33% !important;
        }
        
        .mycol-md-2 {
            display:inline-block;
            width:16% !important;
        }
        
        .mycol-md-10 {
            display:inline-block;
            width:83% !important;
        }
        
        .max {
            
        }
        
        .container {
            width:100%;
        }
        
        .row {
            
            margin:0 0 0 5%;
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
            z-index:9999999;

        }

    </style>
</head>
<body>
    <?php if($theme['music_enabled'] == 1) { ?>
        <audio id="myaudio"preload="auto" autoplay="autoplay" src="<?=$theme['music_path'];?>"></audio>
        <audio id="myaudio">
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
<div class="wrapper">
    <div class="container w-100 max">
        <div class="row ">
            <div class="player-welcoming">
                <span>Hi, </span><strong id="plyname">Player</strong><br>
                <div id="steamid" class="steamid">STEAM_ID:0:000</div>
            </div>
        </div>
        <div class="row w-100">
            <div class="mycol-md-2">
                <!--@Main row-->
                <div class="img">
                    <img id="plyimg" src="/pub/minimal/unknown.png" onerror="this.src='/pub/minimal/unknown.png'"/>
                </div>
            </div>
            <div class="mycol-md-10 w-100">
            <div class="server-info centering">
                <div class="mycol-md-3 border-right">
                    <img src="/pub/minimal/game.png"/> Gamemode:&nbsp;<b id="gamemode">darkrp</b>
                </div>
                <div class="mycol-md-3 border-right">
                    <img  src="/pub/minimal/map.png"/> Map:&nbsp;<b id="mapname">gm_fork</b>
                </div>
                <div class="mycol-md-3">
                    <img src="/pub/minimal/service.png"/> Max players:&nbsp;<b id="maxply">24</b>
                </div>
            </div>
            </div>
        </div>

        <div class="row progressbar-row ">
            <span id="status"
                  style="color:#fff; font-family:Quicksand,sans-serif; font-size:24px; ">Connecting...</span>
            <div class="w-100">
                <div id="progress" class="progress-line "></div>
            </div>
            <span id="progress-percentage"
                  style="color:#fff; font-family:Quicksand,sans-serif; font-size:24px; ">0%</span>
        </div>
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
</body>
</html>
