<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        Galaxy tools - Login page
    </title>
    <link rel="stylesheet" href="/inc/css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="/inc/css/bootstrap/theme_1558038454881.css">
    <link rel="stylesheet" href="/inc/css/custom/login.css">

    <script
            src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous"></script>

    <script src="/inc/css/bootstrap/js/bootstrap.min.js"></script>

    <?php if($error != null) {?>
        <script type="text/javascript">
            $('.toast').toast();
            $(document).ready(function(){
                $('.toast').toast('show');
            });
</script>

    <?php } ?>
</head>
<body>
<?php \App\Lib\SVGLoader::attach(); ?>
<?php if($error != null) {?>
<div aria-live="polite" aria-atomic="true" class="d-flex justify-content-start align-items-baseline">
    <div class="toast" data-delay="3000" style="position: absolute; bottom: 0; z-index:999; margin:10px;">
        <div class="toast-header" style="background-color:#d2172c;">
            <strong class="mr-auto" style="color:#fff;">Authentication error</strong>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true"></span>
            </button>
        </div>
        <div class="toast-body">
            <?=$error;?>
        </div>
    </div>
</div>
<?php } ?>
<div class="container h-100">

    <div class="desktop">

        <div class=" d-flex justify-content-center align-items-center h-100">

            <div class="loginbox shadow mb-5 bg-white rounded">
                <div class="row h-100">

                    <div class=" col-md-6 d-flex justify-content-center align-items-center p-5">
                        <form action="/admin/handleLoginData" method="post" >
                            <div class="form-group">
                                <label for="InputUsername1">Username</label>
                                <input type="text" name="username" class="form-control" id="InputUsername1"
                                       aria-describedby="usernameHelp"
                                       placeholder="Enter username">
                                <small id="usernameHelp" class="form-text text-muted">If you don't have account, please
                                    contact to
                                    administrator
                                </small>
                            </div>
                            <div class="form-group">
                                <label for="InputPassword1">Password</label>
                                <input type="password" name="password" class="form-control" id="InputPassword1"
                                       placeholder="Password">
                            </div>
                            <input type="submit" class="btn btn-primary btn-lg" value="Submit">
                        </form>

                    </div>

                    <div class="col-md-6 logobox h-100 rounded-right"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="mobile">
        <div class=" d-flex justify-content-center align-items-center h-100">
            <div class="loginbox shadow mb-5 bg-white rounded">
                <div class="row d-flex justify-content-center align-items-center pt-3 pl-3 pr-3">
                    <img src="/pub/admin/galaxy_logo.png" width="100px" height="77px"/>
                </div>
                <div class="row">
                    <div class="col-md-12  d-flex justify-content-center align-items-center p-5">
                        <form action="/admin/handleLoginData" method="post" >
                            <div class="form-group">
                                <label for="InputUsername1">Username</label>
                                <input type="text" name="username" class="form-control" id="MobileInputUsername1"
                                       aria-describedby="MobileusernameHelp"
                                       placeholder="Enter username">
                                <small id="MobileusernameHelp" class="form-text text-muted">If you don't have account, please
                                    contact to
                                    administrator
                                </small>
                            </div>
                            <div class="form-group">
                                <label for="MobileInputPassword1">Password</label>
                                <input type="password" name="password" class="form-control" id="MobileInputPassword1"
                                       placeholder="Password">
                            </div>
                            <div class="d-flex justify-content-center"><button type="submit" class="btn btn-primary btn-lg">Submit</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>