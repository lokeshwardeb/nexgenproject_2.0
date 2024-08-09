<?php

require __DIR__ . '/inc/_login_signup_header.php';

$controllers->signup();

?>

<main>
	<!-- parent container starts from here -->
	<div class="container" id="container">
		<!-- Sign up contaner starts from here -->
		<div class="form-container sign-up-container" id="sign-in-container" >
			<form action="" method="post">
				<!-- <img class="nex_gen_logo" src="../assets/Logo.png" alt=""> -->
				<img class="nex_gen_logo" src="/assets/img/Logo.png" alt="">
				<h1>Register</h1>
				<input type="text" name="username" placeholder="Input your username" />
				<input type="email" name="email" placeholder="Input your email" />
				<input type="password" name="password" placeholder="Input your password" />
				<input type="password" name="cpassword" placeholder="Confirm your password" />
				<button type="submit" name="signup">Sign Up</button>
			</form>
		</div>
		<!-- Sign up container ends here -->

		<!-- Log in container starts from here -->
		<div class="form-container sign-in-container">
			<form action="#">
				<!-- <img class="nex_gen_logo" src="../assets/Logo.png" alt=""> -->
				<img class="nex_gen_logo" src="/assets/img/Logo.png" alt="">
				<h1>Login</h1>
				<input type="email" placeholder="Input your username or email" />
				<input type="password" placeholder="Input your password" />
				<a href="#">Forgot your password?</a>
				<button>Log In</button>
			</form>
		</div>
		<!-- Log in container ends here -->

		<!-- overlap container starts from here -->
		<div class="overlay-container" id="main_content">
			<div class="overlay">
				<div class="overlay-panel overlay-left">
					<h1>Welcome Mate!</h1>
					<p>To keep connected with us please login with your personal info</p>
					<button class="ghost" id="signIn">Log In</button>
				</div>
				<div class="overlay-panel overlay-right">
					<h1>Hello, Mate!</h1>
					<p>Enter your personal details and start journey with us</p>
					<button class="ghost"  id="signUp"><a href="#sign-in-container?page=signup" id="mySignup">Sign
							Up</a></button>
				</div>
			</div>
		</div>
		<!-- overlap container ends here -->
	</div>
</main>

<?php

require __DIR__ . '/inc/_login_signup_footer_script.php';

?>