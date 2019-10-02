<html>
<head>

    <link rel="stylesheet" href="install.css">
    <title>Galaxy tools - install</title>
    <link rel="stylesheet" href="/inc/css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="/inc/css/bootstrap/theme_1558038454881.css">
    <link rel="stylesheet" href="/inc/css/custom/admin_style.css">
    <script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>
    <script
        src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.0/dist/jquery.validate.js"></script>

</head>
<body>
<div class="top-line">&nbsp;</div>
<div class="container">
    <div class="logo_row d-flex justify-content-center align-items-md-baseline">
        <div class="d-flex align-self-center pr-4">Galaxy</div>
        <img src="/pub/admin/galaxy_logo.png"/>
        <div class="d-flex align-self-center pl-4"> Tools</div>
    </div>
    <div class="row  d-flex justify-content-center ">
        <div class="col-sm-12 col-md-5 col-md-offset rounded">
            <!-- Offset -->
            <form action="/install/action.php" method="post">
                <div class="form-step-wrap">
                    <div id="step1box" class="slider-step first-step step" data-next-step="step2box">
					
                        <h2>Welcome to Galaxy Tools</h2>
                        <hr>
                        <p>Welcome to the installation page of the Galaxy tools. <br><br>Follow the instructions and we promise you that installation will be easy and fast :)</p>
                        <!-- /Row -->
                        <div class="row ">
                            <div class="col-xs-12 ">
                                <input type='button' value='Continue' tabindex="1"
                                       class="btn-next-welcome btn-primary form-control"/>
                            </div>
                        </div>
                    </div>
					<div id="step2box" class="slider-step step" data-next-step="step3box" data-back-to="step1box">
					<h2>Requirements</h2>
                        <hr>
						<ul class="list-group">
						<?php
							$globalflag = true;
							$modules = array('bcmath','Reflection','session','json','hash','PDO','xml','fileinfo','pdo_mysql');
							$installed = get_loaded_extensions();
							foreach($modules as $Item){
								$flag = false;
								
								for($i=0;$i < count($installed); $i++) {
									if($Item == $installed[$i]) {
										$flag = true;
										break;
									}
								}
								
								if($flag) {
								?>
									<li class="list-group-item list-group-item-secondary">"<?=$Item;?>" module - <strong style="color: green" >installed</strong></li>
								<?php
								
								} else {
									$globalflag = false;
								?>
								  <li class="list-group-item list-group-item-danger">"<?=$Item;?>" module - <strong style="color: red" >not found!</strong></li>
								<?php
								}
							}
							?>
							</ul>
							<?php
							if($globalflag == false) {
							 ?>
							 <br>
								<h4>Some modules not found! Galaxy tools may work with errors!</h4>
							 <?php
							}
						?><br>
						<div class="row ">
                            <div class="col-xs-12 ">
                                <input type='button' value='Continue' tabindex="2"
                                       class="btn-next-welcome btn-primary form-control"/>
                            </div>
                        </div>
                    </div>
                    <div id="step3box" class="slider-step step" data-next-step="step4box" data-back-to="step2box">
                        <h2>Database configuration</h2>
                        <hr>
                        <div class="row">
                            <div class="row w-100 mt-4">
                                <div class="w-100">
                                    <input class="form-control" type="text" id="host" name="host"
                                           placeholder="Database host">
                                    <small>MySQL database host</small>
                                </div>
                            </div>
                            <div class="row w-100 mt-4">
                                <div class="w-100">
                                    <input class="form-control" type="text" id="db" name="db"
                                           placeholder="Database name">
                                    <small>MySQL database name</small>
                                </div>
                            </div>

                            <div class="row w-100 mt-4">
                                <div class="w-100">
                                    <input class="form-control" type="text" id="user" name="user"
                                           placeholder="Database username">
                                    <small>MySQL database username</small>
                                </div>
                            </div>
                            <div class="row w-100 mt-4">
                                <div class="w-100">
                                    <input class="form-control" type="password" id="password" name="password"
                                           placeholder="Database password">
                                    <small>MySQL database user password</small>
                                </div>
                            </div>
                            <!-- /Form Questions -->
                        </div>
						<div class="row pt-3 pb-3">

							<span id="connectionstate"></span>

					
						</div>
                        <!-- /Row -->
						<div class="row ">
                            <div class="row ">
                                <input type='button' value='Test connection!' tabindex="3"
                                       class="btn-primary form-control" onclick="TestDbConnection();"/>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="row "">
                                <input type='button' value='Continue' tabindex="3"
                                       class="btn-next btn-primary form-control"/>
                            </div>
                        </div>
                    </div>
                    <!-- Upper Text -->
                    <div id="step4box" class="slider-step step"
                         data-back-to="step3box">
                        <h2>Admin account configuration</h2>
                        <hr>
                        <div class="row">
                            <div class="col-md-6 form-questions">
                                <div class="row w-100 mt-4">
                                    <div class="w-100">
                                        <input required class="form-control" type="text" name="auser"
                                               placeholder="User">
                                        <small>Admin username</small>
                                    </div>
                                </div>
                                <div class="row w-100 mt-4">
                                    <div class="w-100">
                                        <input required class="form-control" type="password" name="apass"
                                               placeholder="Password">
                                        <small>Admin password</small>
                                    </div>
                                </div>
                            </div>
                        </div><br>
                        <div class="row ml-3">
                            <div class="col-xs-12">
                                <input type='submit' value='Finish install' tabindex="5"
                                       class="btn-primary form-control"/>
                            </div>
                        </div>
                        <div class="row ml-3">
                            <div class="col-xs-12">
                                <a class="btn btn-back btn-outline-primary">Back</a>
                            </div>
                        </div>
                    </div>
                    <!-- Mortgage Balance -->
                    <!-- /Home Value -->

            </form>
            <div class="clear"></div>
        </div>
        <!-- Offset -->
    </div>
</div>
<!-- Container Row -->
<script>
    $(document).ready(function () {

        $(".btn-next-welcome").on("click", function () {
            nextStep = $("#" + $(this).parents(".slider-step").data("nextStep"));
            $(this).parents(".slider-step").attr("data-anim", "hide-to--left");
            nextStep.attr("data-anim", "show-from--right");

        });
        //Dynamic Next
        $(".btn-next").on("click", function () {
            if (document.getElementById("host").value !== "" && document.getElementById("db").value !== "" && document.getElementById("user").value !== "") {
                nextStep = $("#" + $(this).parents(".slider-step").data("nextStep"));
                $(this).parents(".slider-step").attr("data-anim", "hide-to--left");
                nextStep.attr("data-anim", "show-from--right");
            }
        });

        //Dynamic Back
        $(".btn-back").on("click", function () {
            backTo = $("#" + $(this).parents(".slider-step").data("backTo"));
            $(this).parents(".slider-step").attr("data-anim", "hide-to--right");
            backTo.attr("data-anim", "show-from--left");
        });
    });
	
	function TestDbConnection()
	{
	
	$.ajax({
   type: "POST",
   url: "/install/testconnection.php",
   data: {
		host:document.getElementById("host").value,
		db:document.getElementById("db").value,
		user:document.getElementById("user").value,
		password:document.getElementById("password").value,
	},
   success: function(html){

		var res = JSON.parse(html);

		if(res.connection == true)
			$("#connectionstate").html("<strong style='color:green;'>Connection established!</strong>");
		else
			$("#connectionstate").html("<strong style='color:red;'>Connection error!</strong>");
    }
 });

	}
</script>
</body>
</html>
