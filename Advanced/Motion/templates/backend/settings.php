<div class="row p-3">
    <div class="w-100" style="display:flex; justify-content:center; align-items: center;"><img
                src="/pub/motion/logo.png"/></div>
    <div class="m-3 d-flex justify-content-center align-items-center">
        <small style="text-align:center; width:50%;">Motion - advanced theme for Galaxy Tools. With this
            theme, you can create a screen with video background. Please, before working with this theme, read
            documentation
            which
            was included in Galaxy Tools downloading archive.
        </small>
    </div>
    <span class="block-heading-lg w-100">Module management<hr/></span>


    <div class="w-100">
        <div class="block-heading ">Video background</div>
        <br>
        <small>Make sure that you're using <b>.webm</b> video!</small>
        <hr>
    </div>
    <div class="col-md-5 w-100">
        <form action="/advancedTheme/setVideo" id="video" method="post">
            <div class="input-group mb-3">
                <input type="text" value="<?=$video;?>" required class="form-control"  name="url" id="url" placeholder="Video URL" aria-label="Video URL"
                       aria-describedby="button-addon2">
                <div class="input-group-append">
                    <button class="btn btn-outline-primary" onclick="if(document.getElementById('url').value !== ''){document.getElementById('video').submit();}" type="button" id="button-addon2">Set video</button>
                </div>
            </div>
        </form>
        <small>Overlay image</small><br>
        <form action="/advancedTheme/setOverlay" id="overlay" method="post">
            <div class="input-group">
                <select name="overlay" class="custom-select" id="inputGroupSelect04" aria-label="Example select with button addon">
                    <option <?php if($overlay == true){echo "selected";}?> value="1">Enabled</option>
                    <option <?php if($overlay == false){echo "selected";}?> value="0">Disabled</option>
                </select>

                <div class="input-group-append">
                    <button class="btn btn-outline-primary" onclick="document.getElementById('overlay').submit();" type="button">Set overlay</button>
                </div>
            </div>
        </form>
        <small>Default video backgrounds (just select one)</small>
        <form action="/advancedTheme/setVideo" id="def" method="post">
            <div class="input-group">
                <select name="url" class="custom-select" id="inputGroupSelect04" aria-label="Example select with button addon">
                    <option value="/pub/motion/video/purple.webm">Purple</option>
                    <option value="/pub/motion/video/neon.webm">Neon</option>
                    <option value="/pub/motion/video/elegy.webm">Elegy</option>
                    <option value="/pub/motion/video/tiles.webm">Tiles</option>
                    <option value="/pub/motion/video/tiles_persp.webm">Tiles #2</option>
                    <option value="/pub/motion/video/rain.webm">Rain</option>
                    
                </select>

                <div class="input-group-append">
                    <button class="btn btn-outline-primary" onclick="document.getElementById('def').submit();" type="button">Set video</button>
                </div>
            </div>
        </form>
    </div>

    <div class="col-md-7">
        <form action="/advancedTheme/setVideo" id="video1" method="post" enctype="multipart/form-data" >
            <div class="input-group">
                <div class="custom-file">
                    <input required type="file" id="upload" name="videofile" accept="video/webm, image/jpeg, image/png, image/gif" class="custom-file-input" aria-describedby="inputGroupFileAddon04">
                    <label class="custom-file-label" for="upload">Choose file</label>
                </div>
                <div class="input-group-append">
                    <button onclick="if(document.getElementById('upload').value !== ''){document.getElementById('video1').submit();}" class="btn btn-outline-primary" type="button" id="inputGroupFileAddon04">Submit</button>
                </div>

            </div>
            <small>Max size: <?=ini_get('post_max_size');?></small>
        </form>
    </div>



    <br> <br> <br>
    <div class="w-100">
        <div class="block-heading ">Custom heading</div>
        <br>
        <small>Write something about your server.</small>
        <hr>
    </div>
    <form action="/advancedTheme/setHeading" method="post" class="w-100">
        <div class="col-md-12 w-100">
            <div class="form-group w-100">
                <input type="text" value="<?=$heading;?>" required class="form-control w-100" name="heading" placeholder="Heading" aria-label="Heading"
                       aria-describedby="button-addon3">

            </div>
            <div class="form-group">
                <input class="btn btn-outline-primary" type="submit" value="Set new heading" id="button-addon3">
            </div>
        </div>
    </form>
</div>
