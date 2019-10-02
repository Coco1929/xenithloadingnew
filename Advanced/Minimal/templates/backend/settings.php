<div class="row p-3">
    <div class="w-100" style="display:flex; justify-content:center; align-items: center;"><img
                src="/pub/minimal/minimal.png"/></div>
    <div class="m-3 d-flex justify-content-center align-items-center">
        <small style="text-align:center; width:50%;">Minimal - advanced theme for Galaxy Tools. With this
            theme, you can create a beautiful loading screen. Please, before working with this theme, read
            documentation
            which
            was included in Galaxy Tools downloading archive.
        </small>
    </div>
    <span class="block-heading-lg w-100">Module management<hr/></span>


    <div class="w-100">
        <div class="block-heading">Custom header</div>
        <br>
    </div>
    <div class="col-md-12 w-100">
        <form action="/advancedTheme/updateSettings" id="video" method="post">
            <div class="input-group mb-3">
                <input type="text" value="<?= $settings['header']; ?>" required class="form-control" name="header" id="url"
                       placeholder="Heading" aria-label="Heading"
                       aria-describedby="button-addon2">
                <div class="input-group-append">
                    <button class="btn btn-outline-primary"
                            onclick="if(document.getElementById('url').value !== ''){document.getElementById('video').submit();}"
                            type="button" id="button-addon2">Set heading
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>