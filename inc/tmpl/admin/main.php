<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        Galaxy tools - Main page
    </title>
    <link rel="stylesheet" href="/inc/css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="/inc/css/bootstrap/theme_1558038454881.css">
    <link rel="stylesheet" href="/inc/css/custom/admin_style.css">

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous"></script>

    <script src="/inc/css/bootstrap/js/bootstrap.min.js"></script>
    <script src="/inc/js/jscolor.js"></script>

    <?php if ($state != null) { ?>
        <script type="text/javascript">
            $('.toast').toast();
            $(document).ready(function () {
                $('.toast').toast('show');
            });
        </script>

    <?php } ?>
</head>
<body>
<?php \App\Lib\SVGLoader::attach(); ?>
<?php if ($state != null) { ?>
    <div aria-live="polite" aria-atomic="true" class="d-flex justify-content-start align-items-baseline">
        <div class="toast" data-delay="3000" style="position: fixed; bottom: 0; z-index:9999; margin:10px;">
            <div class="toast-header" style="background-color:#5985c6;">
                <strong class="mr-auto" style="color:#fff;">New notification</strong>
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>
            <div class="toast-body">
                <?= $state; ?>
            </div>
        </div>
    </div>
<?php } ?>
<div class="top-line"><a href="/admin/logout"><span>Logout</span></a> <a href="/"><span>Go to home</span></a></div>
<div class="container w-100">
    <div class="logo_row d-flex justify-content-center align-items-md-baseline">
        <div class="d-flex align-self-center pr-4">Galaxy</div>
        <img src="/pub/admin/galaxy_logo.png"/>
        <div class="d-flex align-self-center pl-4"> Tools</div>
    </div>

    <div class="wrapper">
        <div class="row">
            <div class="col-md-3">
                <div class="row p-3">
                    <span class="block-heading">Background music</span>
                    <div style="width:100%;" class="shadow mb-5 bg-white rounded p-3">
                        <form action="/admin/changeBackgroundMusic" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="FormControlFile1">Upload music (*.ogg)</label>
                                <input type="file" accept="audio/ogg" name="music_file" class="form-control-file"
                                       id="FormControlFile1">
									   <small>Max size: <?=ini_get('upload_max_filesize');?></small>
                            </div>

                            <div class="form-group">
                                <label for="TrackName" class="">Track name</label>

                                <input required type="text" name="track_name"
                                       value="<?= $currentTheme['music_name']; ?>"
                                       class="form-control form-control-md" id="TrackName">
                                <small id="imageUploadHelp" class="form-text text-muted">Text in this field will be
                                    shown in the upper right corner of loading screen.
                                </small>
                            </div>

                            <div class="form-group">
                                <label for="Vol" class="">Music volume</label>
                                <input type="range" name="volume" value="<?=$currentTheme['music_volume'];?>" class="custom-range" min="0" max="40" id="Vol">
                                <small id="imageUploadHelp" class="form-text text-muted">Sometimes, music can be very loud. Configure music volume with that slider
                                </small>
                            </div>

                            <div class="form-group">
                                <label for="FormControlSelect1">Position</label>
                                <select name="pos" class="form-control" id="FormControlSelect1">
                                    <option <?php if ($currentTheme['music_pos'] == 1) echo "selected"; ?> value="1">Top
                                        Left
                                    </option>
                                    <option <?php if ($currentTheme['music_pos'] == 2) echo "selected"; ?> value="2">Top
                                        Right
                                    </option>
                                    <option <?php if ($currentTheme['music_pos'] == 3) echo "selected"; ?> value="3">
                                        Bottom Left
                                    </option>
                                    <option <?php if ($currentTheme['music_pos'] == 4) echo "selected"; ?> value="4">
                                        Bottom Right
                                    </option>
                                </select>


                                <small id="imageUploadHelp" class="form-text text-muted">Select the position of music
                                    block.
                                </small>
                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox" name="enabled"
                                       <?php if ($currentTheme['music_enabled'] == 1){ ?>checked<?php } ?>
                                       class="form-check-input" id="TrackEnabled">
                                <label for="TrackEnabled" class="form-check-label">Music enabled</label>
                                <small id="imageUploadHelp" class="form-text text-muted">Enable it, if you want music to
                                    play while loading
                                </small>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <input type="submit" class="btn btn-primary col-sm-12" value="Save">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>


                <div class="row  p-3">
                    <span class="block-heading">Background image/video</span>
                    <div class="shadow mb-5 bg-white rounded p-3">
                        <form action="/admin/changeBackground" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Upload image/video</label>
                                <input required type="file" name="bg_img" accept="video/webm,image/jpeg,image/png"
                                       aria-describedby="imageUploadHelp" class="form-control-file"
                                       id="exampleFormControlFile1">
                                <small id="imageUploadHelp" class="form-text text-muted">Allowed WEBM/JPG/PNG.<br><br>
                                    Please, make sure, that you're
                                    downloading image/video in good resolution. Players have different screen resolution and
                                    system automatically resize image/video.
                                </small>
                            </div>
                            <small>Max size: <?=ini_get('upload_max_filesize');?></small>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <input type="submit" class="btn btn-primary col-sm-12" value="Save">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="row p-3">
                    <span class="block-heading">Styling</span>
                    <div style="width:100%;" class="shadow mb-5 bg-white rounded p-3">
                        <form action="/admin/changeStyle" method="post">
                            <div class="form-group">
                                <label for="style">Loading style</label>

                                <select name="style" class="form-control" id="FormControlSelect1">
                                    <?php foreach ($styles as $Item) { ?>
                                        <option <?php if ($currentTheme['style'] == $Item['alias']) echo "selected"; ?>
                                                value="<?= $Item['alias']; ?>"><?= $Item['name']; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                                <small id="" class="form-text text-muted">Style of loading element
                                </small>
                            </div>

                            <div class="form-group">
                                <label for="1st">1st color</label>

                                <input type="text" name="fcc" value="<?= $currentTheme['first_circle_color']; ?>"
                                       class="jscolor form-control form-control-md" id="TrackName">
                                <small id="imageUploadHelp" class="form-text text-muted">1st color of loading element
                                </small>
                            </div>

                            <div class="form-group">
                                <label for="2nd" class="">2nd color</label>

                                <input type="text" name="scc" value="<?= $currentTheme['second_circle_color']; ?>"
                                       class="jscolor form-control form-control-md" id="TrackName">
                                <small id="imageUploadHelp" class="form-text text-muted">2nd color of loading element
                                </small>
                            </div>

                            <div class="form-group">
                                <label for="circlebg" class="">Background color</label>

                                <input type="text" name="cbc" value="<?= $currentTheme['circle_bg_color']; ?>"
                                       class="jscolor form-control form-control-md" id="TrackName">
                                <small id="imageUploadHelp" class="form-text text-muted">
                                </small>
                            </div>

                            <div class="form-group">
                                <label for="textcolor" class="">Text color</label>

                                <input type="text" name="tc" value="<?= $currentTheme['text_color']; ?>"
                                       class="jscolor form-control form-control-md" id="TrackName">
                                <small id="imageUploadHelp" class="form-text text-muted">
                                </small>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <input type="submit" class="btn btn-primary col-sm-12" value="Save">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="row p-3">
                    <span class="block-heading">Package manager</span>
                    <div style="width:100%;" class="shadow mb-5 bg-white rounded p-3">
                        <div class="row">
                            <div class="col-md-12">
                                <form action="/admin/installPackage" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="FormControlFile1">Install package</label>
                                        <input required type="file" name="theme" aria-describedby="imageUploadHelp"
                                               class="form-control-file"
                                               id="FormControlFile1">
                                        <small id="imageUploadHelp" class="form-text text-muted">
                                        </small>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <input type="submit" class="btn btn-primary col-sm-12" value="Install">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <button <?php if (!empty($a_theme)) echo "disabled" ?> data-toggle="modal"
                                                                                       data-target="#ModalExport"
                                                                                       class="btn btn-primary col-sm-12">
                                    <?php if (!empty($a_theme)) echo "You can't export Advanced theme"; else echo "Export current theme" ?>
                                </button>
                            </div>
                        </div>

                        <div class="modal fade" id="ModalExport" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalCenterTitle">Exporting theme</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="/admin/exportTheme" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <input required type="text" name="name" aria-describedby="nameHelp"
                                                       class="form-control form-control-md" id="name">
                                                <small id="nameHelp" class="form-text text-muted">Theme display name
                                                </small>
                                            </div>

                                            <div class="form-group">
                                                <label for="name">Description</label>
                                                <textarea required name="desc" aria-describedby="descHelp"
                                                          class="form-control" id="name" rows="3"></textarea>
                                                <small id="descHelp" class="form-text text-muted">Description of current
                                                    theme
                                                </small>
                                            </div>

                                            <div class="form-group">
                                                <label for="FormControlFile1">Thumbnail</label>
                                                <input required type="file" name="thumb" accept="image/jpeg,image/png"
                                                       aria-describedby="imageUploadHelp" class="form-control-file"
                                                       id="FormControlFile1">
                                                <small id="imageUploadHelp" class="form-text text-muted">JPG/PNG -
                                                    332x332
                                                </small>
                                            </div>

                                            <div class="form-group">
                                                <label for="FormControlFile2">Screenshot</label>
                                                <input required type="file" name="screen" accept="image/jpeg,image/png"
                                                       aria-describedby="imageUploadHelp2" class="form-control-file"
                                                       id="FormControlFile2">
                                                <small id="imageUploadHelp2" class="form-text text-muted">JPG/PNG -
                                                    800x403
                                                </small>
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
                                        </button>
                                        <input type="submit" value="Export theme" style="margin-top:0px;"
                                               class="btn btn-primary">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-9">
                <div class="row p-3">
                    <span class="block-heading">Themes</span>
                    <div class="shadow mb-5 bg-white rounded p-3">
                        <?php
                        if (empty($themes)) echo "You don't have any installed theme!";
                        foreach ($themes as $Item) {
                            ?>
                            <!-- -->
                            <div class="theme_card">
                                <div class="row theme_col" data-toggle="modal" data-target="#target<?= $Item['id']; ?>">
                                    <img class="theme_img <?php if ($Item['advanced'] == 1) {
                                        echo "advanced-icon";
                                    } ?>" src="/pub/themeicons/<?= $Item['icon']; ?>">
                                </div>
                                <div class="row">
                                    <span style="margin:0 auto;"><?= $Item['name']; ?></span>
                                </div>
                                <div class="modal fade" id="target<?= $Item['id']; ?>" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title"
                                                    id="exampleModalCenterTitle"><?= $Item['name']; ?>
                                                    theme</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <span class="block-heading">How it looks?</span><br>
                                                <img style="border-radius:10px; max-width:100%; " class="shadow "
                                                     src="/pub/themeicons/<?= $Item['screen']; ?>">
                                                <span class="block-heading">Description</span><br>
                                                <p><?= $Item['description']; ?></p>
                                            </div>
                                            <div class="modal-footer">
                                                <form action="/admin/deletetheme/" method="post"
                                                      onsubmit="return confirm('Are you sure?');">
                                                    <input type="hidden" name="id" value="<?= $Item['id']; ?>">
                                                    <input type="submit" value="Delete theme"
                                                           style="width:110px; margin-top:14px;"
                                                           class="btn btn-sm  btn-sm btn-danger">
                                                </form>
                                                <button type="button" class="btn btn-sm  btn-secondary"
                                                        data-dismiss="modal">Close
                                                </button>
                                                <form action="/admin/settheme/" method="post"
                                                      onsubmit="return confirm('Are you sure?');">
                                                    <input type="hidden" name="id" value="<?= $Item['id']; ?>">
                                                    <input type="submit" value="Set this theme" style="margin-top:14px;"
                                                           class="btn btn-sm  btn-primary">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- -->
                        <?php } ?>
                    </div>

                </div>
                <?php
                if (!empty($a_theme)) {
                    ?>
                    <div class="row p-3">
                        <span class="block-heading"><?= $a_theme['name']; ?></span>
                        <div class="shadow mb-5 bg-white rounded p-3 w-100">
                            <?php
                            $a_theme_object->renderSettings();
                            ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<center><small>Galaxy tools ver. <?=VERSION;?> &copy; Galaxy Team</small></center>
</body>
</html>