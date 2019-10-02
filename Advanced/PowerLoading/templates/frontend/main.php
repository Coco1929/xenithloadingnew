<html>
<head>
    <meta name="viewport" content="width=1024">

    <link rel="stylesheet" href="/inc/css/bootstrap/bootstrap.min.css">
    <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
    <style>
        @import url(https://fonts.googleapis.com/css?family=Quicksand:200,300,400,700);

        body {
            background-image: url('<?=$theme['bg_img'];?>');
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }

        .data {
            
            margin: 0 auto;
            width: 90%;
            height: 60%;
            background-color: #fff;
            margin-top: 10%;
            -webkit-border-radius: 15px;
            -moz-border-radius: 15px;
            border-radius: 15px;
            -webkit-box-shadow: 6px 0px 12px 1px rgba(0, 0, 0, 0.22);
            -moz-box-shadow: 6px 0px 12px 1px rgba(0, 0, 0, 0.22);
            box-shadow: 6px 0px 12px 1px rgba(0, 0, 0, 0.22);
        }

        .staff-name {
            font-size:24px;
        }


        .block-row {
            height: 100%;
        }

        .block {
            background-color: #0f6674;
            width: 100%;
            height: 100%;
            padding: 0;
        }

        .corner-left {
            -webkit-border-radius: 15px 0 0 15px;
            -moz-border-radius: 15px 0 0 15px;
            border-radius: 15px 0 0 15px;
        }

        .corner-right {
            -webkit-border-radius: 0 15px 15px 0;
            -moz-border-radius: 0 15px 15px 0;
            border-radius: 0 15px 15px 0;
        }

        .rules-block {
            background: rgb(30, 106, 76);
            background: -moz-linear-gradient(50deg, rgba(30, 106, 76, 1) 0%, rgba(121, 213, 128, 1) 100%);
            background: -webkit-linear-gradient(50deg, rgba(30, 106, 76, 1) 0%, rgba(121, 213, 128, 1) 100%);
            background: -webkit-linear-gradient(40deg, rgba(30, 106, 76, 1) 0%, rgba(121, 213, 128, 1) 100%);
            background: -moz-linear-gradient(40deg, rgba(30, 106, 76, 1) 0%, rgba(121, 213, 128, 1) 100%);
            background: -o-linear-gradient(40deg, rgba(30, 106, 76, 1) 0%, rgba(121, 213, 128, 1) 100%);
            background: linear-gradient(50deg, rgba(30, 106, 76, 1) 0%, rgba(121, 213, 128, 1) 100%);
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#1e6a4c", endColorstr="#79d580", GradientType=1);

            -webkit-box-shadow: 6px 0px 12px 1px rgba(0, 0, 0, 0.22);
            -moz-box-shadow: 6px 0px 12px 1px rgba(0, 0, 0, 0.22);
            box-shadow: 6px 0px 12px 1px rgba(0, 0, 0, 0.22);

            z-index: 5;
        }

        .rules-content {
            padding: 15px;
            color: #fff;
            font-family: Quicksand, sans-serif;
            font-size: 14px;
        }

        .rule-number {
            width: 50px;
            height: 50px;
            background-color: rgba(0, 0, 0, 0.2);
            display: -webkit-box;
            display: -webkit-flex;
            display: -moz-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: center;
            -webkit-justify-content: center;
            -moz-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            -webkit-align-content: center;
            -ms-flex-line-pack: center;
            align-content: center;
            -webkit-border-radius: 100px;
            -moz-border-radius: 100px;
            border-radius: 100px;
        }

        .rule-number span {
            margin-top: 25%;
        }

        .staff-content {
            padding: 15px;
            color: #fff;
            font-family: Quicksand, sans-serif;
        }

        .heading {
            background: rgba(255, 255, 255, 0.2);
            height: 50px;
            width: 100%;
            text-align: center;
            font-family: Quicksand, sans-serif;
            color: #fff;
            font-size: 30px;
        }

        .heading img {
            margin-right: 10px;
        }

        .corner-heading-left {
            -webkit-border-radius: 15px 0 0 0;
            -moz-border-radius: 15px 0 0 0;
            border-radius: 15px 0 0 0;
        }

        .corner-heading-right {
            -webkit-border-radius: 0 15px 0 0;
            -moz-border-radius: 0 15px 0 0;
            border-radius: 0 15px 0 0;
        }

        .staff {
            margin-top: 25px;
        }

        @media screen and (max-width: 1400px) {
            .rules-content {
                font-size:10px;
            }
            
            .rule-number {
                width:40px;
                height:40px;
            }
            
            .data {
                height: 70%;
                margin-top: 4%;
            }

            .staff-name{
                font-size:13px;
            }
            
            .desc-content {
                font-size:12px;
            }

            .music-player {
                margin-top:-1%;
                line-height: 23px;
            }
            
              .server-info-content .mapimg {
                  width:100px
                  height:auto;
             }

        }

        .staff-block {
            background: rgb(91, 94, 222);
            background: -moz-linear-gradient(50deg, rgba(91, 94, 222, 1) 0%, rgba(46, 252, 222, 1) 100%);
            background: -webkit-linear-gradient(50deg, rgba(91, 94, 222, 1) 0%, rgba(46, 252, 222, 1) 100%);
            background: -webkit-linear-gradient(40deg, rgba(91, 94, 222, 1) 0%, rgba(46, 252, 222, 1) 100%);
            background: -moz-linear-gradient(40deg, rgba(91, 94, 222, 1) 0%, rgba(46, 252, 222, 1) 100%);
            background: -o-linear-gradient(40deg, rgba(91, 94, 222, 1) 0%, rgba(46, 252, 222, 1) 100%);
            background: linear-gradient(50deg, rgba(91, 94, 222, 1) 0%, rgba(46, 252, 222, 1) 100%);
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#5b5ede", endColorstr="#2efcde", GradientType=1);

            -webkit-box-shadow: 6px 0px 12px 1px rgba(0, 0, 0, 0.22);
            -moz-box-shadow: 6px 0px 12px 1px rgba(0, 0, 0, 0.22);
            box-shadow: 6px 0px 12px 1px rgba(0, 0, 0, 0.22);

            z-index: 4;
        }

        .steam-pic img {
            width:50px;
            height: 50px;
            -webkit-border-radius: 100px;
            -moz-border-radius: 100px;
            border-radius: 100px;
            -webkit-box-shadow: 0px 5px 5px 0px rgba(50, 50, 50, 0.63);
            -moz-box-shadow: 0px 5px 5px 0px rgba(50, 50, 50, 0.63);
            box-shadow: 0px 5px 5px 0px rgba(50, 50, 50, 0.63);
        }

        .desc-block {
            background: rgb(123, 123, 123);
            background: -moz-linear-gradient(50deg, rgba(123, 123, 123, 1) 0%, rgba(219, 219, 219, 1) 100%);
            background: -webkit-linear-gradient(50deg, rgba(123, 123, 123, 1) 0%, rgba(219, 219, 219, 1) 100%);
            background: -webkit-linear-gradient(40deg, rgba(123, 123, 123, 1) 0%, rgba(219, 219, 219, 1) 100%);
            background: -moz-linear-gradient(40deg, rgba(123, 123, 123, 1) 0%, rgba(219, 219, 219, 1) 100%);
            background: -o-linear-gradient(40deg, rgba(123, 123, 123, 1) 0%, rgba(219, 219, 219, 1) 100%);
            background: linear-gradient(50deg, rgba(123, 123, 123, 1) 0%, rgba(219, 219, 219, 1) 100%);
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#7b7b7b", endColorstr="#dbdbdb", GradientType=1);

            -webkit-box-shadow: 6px 0px 12px 1px rgba(0, 0, 0, 0.22);
            -moz-box-shadow: 6px 0px 12px 1px rgba(0, 0, 0, 0.22);
            box-shadow: 6px 0px 12px 1px rgba(0, 0, 0, 0.22);

            z-index: 3;
        }

        .desc-content {
            word-wrap: break-word;

            padding: 15px;
            color: #fff;
            font-family: Quicksand, sans-serif;
        }

        .server-info-block {
            background: rgb(194, 66, 66);
            background: -moz-linear-gradient(50deg, rgba(194, 66, 66, 1) 0%, rgba(255, 150, 12, 1) 100%);
            background: -webkit-linear-gradient(50deg, rgba(194, 66, 66, 1) 0%, rgba(255, 150, 12, 1) 100%);
            background: -webkit-linear-gradient(40deg, rgba(194, 66, 66, 1) 0%, rgba(255, 150, 12, 1) 100%);
            background: -moz-linear-gradient(40deg, rgba(194, 66, 66, 1) 0%, rgba(255, 150, 12, 1) 100%);
            background: -o-linear-gradient(40deg, rgba(194, 66, 66, 1) 0%, rgba(255, 150, 12, 1) 100%);
            background: linear-gradient(50deg, rgba(194, 66, 66, 1) 0%, rgba(255, 150, 12, 1) 100%);
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#c24242", endColorstr="#ff960c", GradientType=1);

            -webkit-box-shadow: 6px 0px 12px 1px rgba(0, 0, 0, 0.22);
            -moz-box-shadow: 6px 0px 12px 1px rgba(0, 0, 0, 0.22);
            box-shadow: 6px 0px 12px 1px rgba(0, 0, 0, 0.22);

            z-index: 2;
        }

        .server-info-content {
            padding: 15px;
            color: #fff;
            font-family: Quicksand, sans-serif;

        }

        .server-info-content .mapimg {
            max-width: 100%;
            width: 300px;
            height: auto;
            -webkit-border-radius: 15px;
            -moz-border-radius: 15px;
            border-radius: 15px;
            -webkit-box-shadow: 0px 5px 5px 0px rgba(50, 50, 50, 0.63);
            -moz-box-shadow: 0px 5px 5px 0px rgba(50, 50, 50, 0.63);
            box-shadow: 0px 5px 5px 0px rgba(50, 50, 50, 0.63);
            margin:0 auto;
            -webkit-transform: translate(-50%, 0);
            -moz-transform: translate(-50%, 0);
            -ms-transform: translate(-50%, 0);
            -o-transform: translate(-50%, 0);
            transform: translate(-50%, 0);
            margin-left:50%;
        }
        
        @media screen and (max-width: 1400px) {
        
        .server-info-content {
            font-size:13px;
        }
         .server-info-content .mapimg {
                  width:200px;
                  height:auto;
             }
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
            padding-right:15px;
            -webkit-border-radius:0 0 0 12px;
            -moz-border-radius:0 0 0 12px;
            border-radius:0 0 0 12px;
            background-color:rgba(255,255,255,0);
            font-family: 'Quicksand', sans-serif;
            font-size:25px;
            text-shadow: 0 0 10px #FFFFFF;
            color: #FFFFFF;

        }

        .row {
            display: -webkit-box;
            display: -webkit-flex !important;
            display: -moz-box;
            display: -ms-flexbox;
            display: flex;
        }

        .progress-bar {
            -webkit-transition: width 1500ms ease-in-out;
-moz-transition: width 1500ms ease-in-out;
-ms-transition: width 1500ms ease-in-out;
-o-transition: width 1500ms ease-in-out;
transition: width 1500ms ease-in-out;
            background-color:#<?=$first_circle_color;?>;
        }
    </style>
</head>
<body>
&nbsp;
<?php if($theme['music_enabled'] == 1) { ?>
    <audio id="myaudio" preload="auto" autoplay="autoplay" type="audio/ogg" src="<?=$theme['music_path'];?>"></audio>
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

<div class="content ">

    <div class="data">
        <div class="row block-row">
            <div class="corner-left block rules-block col-md-3">
                <div class="corner-heading-left heading"><img src="/pub/powerloading/document.png">Rules</div>
                <div class="rules-content">
                    <?php if (!empty($rules["1"])) { ?>
                        <div class="row rule rule-block">
                            <div class="col-md-2">
                                <div class="rule-number"><span>1</span></div>
                            </div>
                            <div class="col-md-8 p-3 pl-md-4 "><b><?= $rules["1"]; ?></b></div>
                        </div>
                    <?php } ?>
                    <?php if (!empty($rules["2"])) { ?>
                        <div class="row rule rule-block">
                            <div class="col-md-2">
                                <div class="rule-number"><span>2</span></div>
                            </div>
                            <div class="col-md-8 p-3 pl-md-4"><b><?= $rules["2"]; ?></b></div>
                        </div>
                    <?php } ?>
                    <?php if (!empty($rules["3"])) { ?>
                        <div class="row rule rule-block">
                            <div class="col-md-2">
                                <div class="rule-number"><span>3</span></div>
                            </div>
                            <div class="col-md-8 p-3 pl-md-4"><b><?= $rules["3"]; ?></b></div>
                        </div>
                    <?php } ?>
                    <?php if (!empty($rules["4"])) { ?>
                        <div class="row rule rule-block">
                            <div class="col-md-2">
                                <div class="rule-number"><span>4</span></div>
                            </div>
                            <div class="col-md-8 p-3 pl-md-4"><b><?= $rules["4"]; ?></b></div>
                        </div>
                    <?php } ?>
                    <?php if (!empty($rules["5"])) { ?>
                        <div class="row rule rule-block">
                            <div class="col-md-2">
                                <div class="rule-number"><span>5</span></div>
                            </div>
                            <div class="col-md-8 p-3 pl-md-4"><b><?= $rules["5"]; ?></b></div>
                        </div>
                    <?php } ?>
                    <?php if (!empty($rules["6"])) { ?>
                        <div class="row rule rule-block">
                            <div class="col-md-2">
                                <div class="rule-number"><span>6</span></div>
                            </div>
                            <div class="col-md-8 p-3 pl-md-4"><b><?= $rules["6"]; ?></b></div>
                        </div>
                    <?php } ?>
                    <?php if (!empty($rules["7"])) { ?>
                        <div class="row rule rule-block">
                            <div class="col-md-2">
                                <div class="rule-number"><span>7</span></div>
                            </div>
                            <div class="col-md-8 p-3 pl-md-4"><b><?= $rules["7"]; ?></b></div>
                        </div>
                    <?php } ?>
                    <?php if (!empty($rules["8"])) { ?>
                        <div class="row rule rule-block">
                            <div class="col-md-2">
                                <div class="rule-number"><span>8</span></div>
                            </div>
                            <div class="col-md-8 p-3 pl-md-4"><b><?= $rules["8"]; ?></b></div>
                        </div>
                    <?php } ?>
                    <?php if (!empty($rules["9"])) { ?>
                        <div class="row rule rule-block">
                            <div class="col-md-2">
                                <div class="rule-number"><span>9</span></div>
                            </div>
                            <div class="col-md-8 p-3 pl-md-4"><b><?= $rules["9"]; ?></b></div>
                        </div>
                    <?php } ?>


                </div>
            </div>
            <div class="block staff-block col-md-3">
                <div class="heading"><img src="/pub/powerloading/service.png">Staff</div>
                <div class="staff-content">
                    <?php if (!empty($staff["1"]["job"])) { ?>
                    <div class="row staff">
                        <div class="col-md-2">
                            <?php
                            $steamuser = \App\Lib\SteamIdParser::getData($staff["1"]["steamid"]);
                            ?>
                            <div class="steam-pic"><img src="<?= @$steamuser['avatarFull']; ?>"></div>
                        </div>
                        <div class="col-md-8 pl-md-5"><?= $staff["1"]["job"]; ?>
                            <br><span class="staff-name" style="line-height:16px;"><?= @$steamuser['steamID']; ?></span>
                        </div>
                    </div>
                    <?php } ?>
                    <?php if (!empty($staff["2"]["job"])) { ?>
                    <div class="row staff">
                        <div class="col-md-2">
                            <?php
                            $steamuser = \App\Lib\SteamIdParser::getData($staff["2"]["steamid"]);
                            ?>
                            <div class="steam-pic"><img src="<?= @$steamuser['avatarFull']; ?>"></div>
                        </div>
                        <div class="col-md-8 pl-md-5 "><?= $staff["2"]["job"]; ?>
                            <br><span class="staff-name" style="line-height:16px;"><?= @$steamuser['steamID']; ?></span>
                        </div>
                    </div>
                    <?php } ?>
                    <?php if (!empty($staff["3"]["job"])) { ?>
                    <div class="row staff">
                        <div class="col-md-2">
                            <?php
                            $steamuser = \App\Lib\SteamIdParser::getData($staff["3"]["steamid"]);
                            ?>
                            <div class="steam-pic"><img src="<?= @$steamuser['avatarFull']; ?>"></div>
                        </div>
                        <div class="col-md-8 pl-md-5 "><?= $staff["3"]["job"]; ?>
                            <br><span class="staff-name" style=" line-height:16px;"><?= @$steamuser['steamID']; ?></span>
                        </div>
                    </div>
                    <?php } ?>
                    <?php if (!empty($staff["4"]["job"])) { ?>
                    <div class="row staff">
                        <div class="col-md-2">
                            <?php
                            $steamuser = \App\Lib\SteamIdParser::getData($staff["4"]["steamid"]);
                            ?>
                            <div class="steam-pic"><img src="<?= @$steamuser['avatarFull']; ?>"></div>
                        </div>
                        <div class="col-md-8 pl-md-5 "><?= $staff["4"]["job"]; ?>
                            <br><span class="staff-name" style=" line-height:16px;"><?= @$steamuser['steamID']; ?></span>
                        </div>
                    </div>
                    <?php } ?>
                    <?php if (!empty($staff["5"]["job"])) { ?>
                    <div class="row staff">
                        <div class="col-md-2">
                            <?php
                            $steamuser = \App\Lib\SteamIdParser::getData($staff["5"]["steamid"]);
                            ?>
                            <div class="steam-pic"><img src="<?= @$steamuser['avatarFull']; ?>"></div>
                        </div>
                        <div class="col-md-8 pl-md-5 "><?= $staff["5"]["job"]; ?>
                            <br><span class="staff-name" style=" line-height:16px;"><?= @$steamuser['steamID']; ?></span>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <div class="block desc-block col-md-3">
                <div class="heading"><img src="/pub/powerloading/hastag.png">Description</div>
                <div class="desc-content">
                    <?= $desc; ?>
                </div>
            </div>
            <div class="corner-right block server-info-block col-md-3">
                <div class="corner-heading-right heading"><img src="/pub/powerloading/map.png">Server info</div>
                <div class="server-info-content">
                    <img class="mapimg" id="mapimg" src="/pub/minimal/unknownmap.png"
                         onerror="this.src = '/pub/minimal/unknownmap.png'">
                    <br><br><img class="mr-2" src="/pub/powerloading/map.png">Current map: <b><span
                            id="mapname"></span></b></b></br>
                    <br><img class="mr-2" src="/pub/powerloading/game.png">Gamemode: <b><span
                            id="gamemode"></span></b></br>
                </div>
            </div>
        </div>
<br>
        <div class="progress">
            <div id="progress" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" ></div>

        </div>
        <center><span id="status" style="color:#fff; font-family:Quicksand,sans-serif; font-size:24px;">Connecting...</span></center>
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