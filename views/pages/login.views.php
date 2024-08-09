<?php

require __DIR__ . '/inc/_login_signup_header.php';

$controllers->login();

$controllers->signup();

$controllers->send_sms();

?>

<!-- <script>
	danger_alert("Error !! Please fillup all the data !!", "hi");
</script> -->


<script></script>



<main>
	<!-- parent container starts from here -->
	<div class="container " id="container">
		<!-- Sign up contaner starts from here -->
		<div class="form-container sign-up-container" id="sign-in-container">
			<form action="" method="post">
				<!-- <img class="nex_gen_logo" src="../assets/Logo.png" alt=""> -->
				<img class="nex_gen_logo" src="/assets/img/Logo.png" alt="">
				<h1>Register</h1>
				<input type="text" class="login_inp" name="signup_username" placeholder="Input your username" />
				<input type="email" name="signup_email" placeholder="Input your email" />
				<input type="password" name="signup_password" placeholder="Input your password" />
				<input type="password" name="signup_cpassword" placeholder="Confirm your password" />
				<button type="submit" style="margin-top: 25px;" name="signup">Sign Up</button>
			</form>
		</div>
		<!-- Sign up container ends here -->

		<!-- Log in container starts from here -->
		<div class="form-container sign-in-container">
			<form action="" method="post" >
				<!-- <img class="nex_gen_logo" src="../assets/Logo.png" alt=""> -->
				<img class="nex_gen_logo" src="/assets/img/Logo.png" alt="">
				<h1 style="margin-bottom: 25px">Login</h1>
				<input type="text" name="login_username" placeholder="Input your username or email" />
				<input type="password" name="login_password" placeholder="Input your password" />
				<a href="#">Forgot your password?</a>
				<button name="login" style="margin-top: 25px" >Log In</button>
			</form>
		</div>
		<!-- Log in container ends here -->

		<!-- overlap container starts from here -->
		<div class="overlay-container" id="main_content">
			<div class="overlay">
				<div class="overlay-panel overlay-left">
					<h1>Welcome Mate!</h1>
					<!-- <p>Enter your personal details and start journey with us</p> -->

					<p>To keep connected with us please login with your personal info</p>
					<a href="#sign-in-container?page=login" style="color: white !important;" id="mySignup">
						<button class="ghost" id="signIn">Log In</button>
					</a>
				</div>
				<div class="overlay-panel overlay-right">
					<h1>Hello, Mate!</h1>
					<!-- <p>To keep connected with us please login with your personal info</p> -->

					<p>Enter your personal details and start journey with us</p>
					<a href="#sign-in-container?page=signup" style="color: white !important;" id="mySignup">

						<button class="ghost" id="signUp">
							Signup
							<!-- <a href="?page=signup#sign-in-container" id="mySignup">Sign
							Up
						</a> -->
							<!-- <a href="#sign-in-container?page=signup" style="color: white !important;" id="mySignup">Sign
							Up
						</a> -->
						</button>

					</a>

				</div>
			</div>
		</div>
		<!-- overlap container ends here -->
	</div>
</main>

<!-- <script>
				success_alert("Error !! Please fillup all the data !!", "hi");
				</script>


<script> -->

<!-- </script> -->

<!-- <script>
	// success_alert("Error !! Please fillup all the data !!", "hi");
</script> -->


<?php

require __DIR__ . '/inc/_login_signup_footer_script.php';

?>