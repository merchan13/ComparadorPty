<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="google-signin-scope" content="profile email">
	    <meta name="google-signin-client_id" content="677597205141-jjbf1bud8nqbb7k22rfj3k4qbdj7fnom.apps.googleusercontent.com">
		<title>ComparadorPty - Datos</title>

		<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
	    <meta name="viewport" content="width=device-width" />

		<!-- Bootstrap core CSS -->
		<link href="resources/assets/css/bootstrap.min.css" rel="stylesheet" />
		<link href="vendors/bootstrap/css/bootstrap.css" rel="stylesheet">
		<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
	    <link href="resources/assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

		<!--Styles-->
		<link rel="stylesheet" type="text/css" href="resources/css/style.css">
		<!--/Styles-->

		<!--JavaScript-->
		<script src="resources/js/range_value.js" type="text/javascript"></script>
		<script src="resources/js/fb.js" type="text/javascript"></script>
		<script src="resources/js/google.js" type="text/javascript"></script>
		<!--/JavaScript-->

	    <script src="https://apis.google.com/js/platform.js" async defer></script>

	</head>
	<body>

		<div class="flex-container">
			<header>
				<a href="index.php"><img class="logo" src="resources/images/logo2.png" alt=""/></a>
				<ul>
					<li><a href="#"><img src="resources/images/banesco-icon.png" alt="" /></a></li>
					<li><a href="#"><img src="resources/images/facebook-icon.png" alt="" /></a></li>
					<li><a href="#"><img src="resources/images/instagram-icon.png" alt="" /></a></li>
					<li><a href="#"><img src="resources/images/twitter-icon.jpg" alt="" /></a></li>
					<li><a href="#"><img src="resources/images/snapchat-icon.png" alt="" /></a></li>
				</ul>
			</header>

			<div class="comparator">
				<div class="comparator-product-image-top">
                    <img src="resources/images/credit_card.png" alt=""/>
                </div>
                <div class="comparator-form">
                    <form class="form-horizontal" role="form" action="comparador_resultado.php" method="post">

                        <!--Income-->
                        <div class="form-group">
                          <label class="control-label col-sm-2" for="income" style="padding-top: 0;">Salario</label>
                          <div class="col-sm-4 range-input">
                            <input type="range"  id="income" name="income" min =600 max="10000" step ="200" value ="1000"
								onchange="prueba.value = income.value" oninput="outputUpdate(value)">
                          </div>
						  <label class="label-blanco" for="income-number">
							  $
							  <output for="income" id="volume" style="display: inline">1000</output>
						  </label>
                        </div>

                        <!--Email-->
                        <div class="form-group">
                          <label class="control-label col-sm-2" for="email">Email</label>
                          <div class="col-sm-4 email-input">
                            <input type="email" class="form-control" id="email" name="email" value=""
								placeholder="Ingrese correo electrónico" required>
                          </div>
                        </div>

						<!--
						  Below we include the Login Button social plugin. This button uses
						  the JavaScript SDK to present a graphical Login button that triggers
						  the FB.login() function when clicked.
						-->
						<div class="form-group logredes ">
                        	<div class="col-sm-6">
								<fb:login-button scope="public_profile,email" onlogin="checkLoginState();"
									data-max-rows="1" data-size="xlarge">
  								</fb:login-button>
                          	</div>
							<div class="col-sm-4 googlebtn">
								<div class="g-signin2" data-onsuccess="onSignIn" data-theme="light"></div>
                          	</div>
                        </div>

                        <!--Submit Button-->
                        <div class="form-group">
                          <div class="col-sm-offset-2 col-sm-4">
							  <br>
							  <button type="submit" class="btn btn-warning btn-fill"
  								style="width: 200px; height: 55px; font-size:120%">
  								<i class="fa fa-credit-card fa-spin" style="margin-right:5%;"></i>Comparar ahora!
  							</button>
                          </div>
                        </div>

                    </form>
                </div>
				<br><br><br><br><br>
			</div>

			<footer>
				<p style="float: left;">© Javier Merchán - UCAB 2016</p>
				<p style="float: right;"><a href="#">Back to top</a></p>
			</footer>
		</div>
	</body>
</html>
