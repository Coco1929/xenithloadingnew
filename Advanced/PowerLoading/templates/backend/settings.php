<div class="row p-3">
    <div class="w-100" style="display:flex; justify-content:center; align-items: center;"><img
                src="/pub/powerloading/power_loading_logo.png"/></div>
    <div class="m-3 d-flex justify-content-center align-items-center">
        <small style="text-align:center; width:50%;">PowerLoading - default advanced theme of Galaxy Tools. With this
            theme, you can create a screen of any complexity. Please, before working with this theme, read documentation
            which
            was included in Galaxy Tools downloading archive.
        </small>
    </div>
    <span class="block-heading-lg w-100">Module management<hr/></span>

    <div class="col-md-5 w-100">

        <form action="/advancedTheme/updaterules" method="post" class="form-horizontal">
            <fieldset>

                <!-- Form Name -->
                <legend class="block-heading">Server rules</legend><br>
                <hr>
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="rule1">Rule #1</label>
                    <div class="col-md-12">
                        <input id="rule1" name="rule1" type="text" placeholder="" value="<?= $rules['1']; ?>"
                               class="form-control input-md  w-100">

                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="rule2">Rule #2</label>
                    <div class="col-md-12">
                        <input id="rule2" name="rule2" type="text" placeholder="" value="<?= $rules['2']; ?>"
                               class="form-control input-md">

                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="rule3">Rule #3</label>
                    <div class="col-md-12">
                        <input id="rule3" name="rule3" type="text" placeholder="" value="<?= $rules['3']; ?>"
                               class="form-control input-md">

                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="rule4">Rule #4</label>
                    <div class="col-md-12">
                        <input id="rule4" name="rule4" type="text" placeholder="" value="<?= $rules['4']; ?>"
                               class="form-control input-md">

                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="rule5">Rule #5</label>
                    <div class="col-md-12">
                        <input id="rule5" name="rule5" type="text" placeholder="" value="<?= $rules['5']; ?>"
                               class="form-control input-md">

                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label" for="rule5">Rule #6</label>
                    <div class="col-md-12">
                        <input id="rule5" name="rule6" type="text" placeholder="" value="<?= $rules['6']; ?>"
                               class="form-control input-md">

                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label" for="rule5">Rule #7</label>
                    <div class="col-md-12">
                        <input id="rule5" name="rule7" type="text" placeholder="" value="<?= $rules['7']; ?>"
                               class="form-control input-md">

                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label" for="rule5">Rule #8</label>
                    <div class="col-md-12">
                        <input id="rule5" name="rule8" type="text" placeholder="" value="<?= $rules['8']; ?>"
                               class="form-control input-md">

                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label" for="rule5">Rule #9</label>
                    <div class="col-md-12">
                        <input id="rule5" name="rule9" type="text" placeholder="" value="<?= $rules['9']; ?>"
                               class="form-control input-md">

                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12">
                        <input type="submit" placeholder="" class="btn btn-primary" value="Save rules">

                    </div>
                </div>

            </fieldset>
        </form>
    </div>

    <div class="col-md-7">
        <form action="/advancedTheme/updateStaff" method="post" class="form-horizontal">
            <fieldset>

                <!-- Form Name -->
                <legend class="block-heading">Server staff</legend>
                <small><a href="https://steamcommunity.com/sharedfiles/filedetails/?id=209000244">Click here to see, how
                        to get SteamID64</a></small>
                <hr>
                <div class="form-row">
                    <div class="col">
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="rule1">Row #1</label>
                            <div class="col-md-12">
                                <input id="rule1" name="row1" type="text" placeholder=""
                                       value="<?= $staff['1']['job']; ?>" class="form-control input-md">

                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="rule2">Row #2</label>
                            <div class="col-md-12">
                                <input id="rule2" name="row2" type="text" placeholder=""
                                       value="<?= $staff['2']['job']; ?>" class="form-control input-md">

                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="rule3">Row #3</label>
                            <div class="col-md-12">
                                <input id="rule3" name="row3" type="text" placeholder=""
                                       value="<?= $staff['3']['job']; ?>" class="form-control input-md">

                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="rule4">Row #4</label>
                            <div class="col-md-12">
                                <input id="rule4" name="row4" type="text" placeholder=""
                                       value="<?= $staff['4']['job']; ?>" class="form-control input-md">

                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="rule5">Row #5</label>
                            <div class="col-md-12">
                                <input id="rule5" name="row5" type="text" placeholder=""
                                       value="<?= $staff['5']['job']; ?>" class="form-control input-md">

                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="submit" placeholder="" class="btn btn-primary" value="Save stuff">

                            </div>
                        </div>
                    </div>


                    <div class="col">
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="rule1">SteamID64</label>
                            <div class="col-md-12">
                                <input id="rule1" name="st1" type="text" placeholder=""
                                       value="<?= $staff['1']['steamid']; ?>" class="form-control input-md">
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="rule2">SteamID64</label>
                            <div class="col-md-12">
                                <input id="rule2" name="st2" type="text" placeholder=""
                                       value="<?= $staff['2']['steamid']; ?>" class="form-control input-md">

                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="rule3">SteamID64</label>
                            <div class="col-md-12">
                                <input id="rule3" name="st3" type="text" placeholder=""
                                       value="<?= $staff['3']['steamid']; ?>" class="form-control input-md">

                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="rule4">SteamID64</label>
                            <div class="col-md-12">
                                <input id="rule4" name="st4" type="text" placeholder=""
                                       value="<?= $staff['4']['steamid']; ?>" class="form-control input-md">

                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="rule5">SteamID64</label>
                            <div class="col-md-12">
                                <input id="rule5" name="st5" type="text" placeholder=""
                                       value="<?= $staff['5']['steamid']; ?>" class="form-control input-md">

                            </div>
                        </div>


                    </div>
                </div>
            </fieldset>

        </form>
        <div class="row">
            <form action="/advancedTheme/updateDesc" method="post">
                <fieldset>
                    <legend class="block-heading">Server description</legend>
                    <hr>
                    <div class="form-group">
                        <script src="/pub/powerloading/nicEdit.js" type="text/javascript"></script>
                        <script type="text/javascript">
                            bkLib.onDomLoaded(
                                function() {
                                    new nicEditor({
                                            fullPanel : true
                                        }
                                    ).panelInstance("area1");
                                }
                            );
                        </script>
                            <div>
                        <div class="col-md-12">
                            <textarea maxlength="600" name="desc" rows="5" cols="100" type="text" placeholder=""
                                      class="form-control"><?= $desc; ?></textarea>

                        </div>

                    </div><br>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="submit" placeholder="" class="btn btn-primary" value="Save description">

                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>
