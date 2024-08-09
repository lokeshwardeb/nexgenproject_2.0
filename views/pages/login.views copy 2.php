<?php

require __DIR__ . '/inc/_login_signup_header.php';

$controllers->signup();

?>

<?php
// Get the protocol (http or https)
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";

// Get the host (e.g., localhost or www.example.com)
$host = $_SERVER['HTTP_HOST'];

// Get the URI (e.g., /login)
$uri = $_SERVER['REQUEST_URI'];

// Combine them to get the full URL
echo $url = $protocol . $host . $uri . '?page=signup';

// Now you can parse the URL as before
$parsed_url = parse_url($url, PHP_URL_FRAGMENT);

// Check if the fragment exists
if ($parsed_url) {
    // Parse the fragment to get the query parameters
     parse_str($parsed_url, $query_params);

    // Get the value of the 'page' parameter
    $page = isset($query_params['page']) ? $query_params['page'] : null;

    echo "The value of 'page' is: " . $page;
} else {
    echo "No fragment found in the URL.";
}
?>


<main>
	<!-- parent container starts from here -->
	<div class="container <?php 
	
	if(isset($_GET['page'])){
		$page = $_GET['page'][0];
		if($page == 'signup'){
			echo 'container right-panel-active';
		}else{
			echo 'container';
			echo 'the page is : ' . $page;
		}
	}

	?>" id="container">
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
					<button class="ghost"  id="signUp">
						<!-- <a href="?page=signup#sign-in-container" id="mySignup">Sign
							Up
						</a> -->
						<a href="#sign-in-container?page=signup" id="mySignup">Sign
							Up
						</a>
						</button>
				</div>
			</div>
		</div>
		<!-- overlap container ends here -->
	</div>
</main>

<?php

require __DIR__ . '/inc/_login_signup_footer_script.php';

?>