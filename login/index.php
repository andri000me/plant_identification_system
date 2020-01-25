<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="style.css">
</head>

<body>
	<div class="container" id="container">
		<div class="form-container sign-up-container">
			<form action="static/daftar.php" method="POST">
				<h1>Create Account</h1>
				<div class="social-container">
					<a href="#" class="social"><img src="fb-icon.png" width="20" height="20"></a>
					<a href="#" class="social"><img src="g+-icon.png" width="20" height="20"></a>
					<a href="#" class="social"><img src="in-icon.png" width="20" height="20"></a>
				</div>
				<span>or use your email for registration</span>
				<input type="text" name="nama" placeholder="Nama Lengkap" />
				<input type="text" name="username" placeholder="Username" />
				<input type="password" name="password" placeholder="Password" />
				<input type="text" name="nomor" placeholder="NIM/NIP" />
				<table style="width:100%">
					<tr>
						<td><input type="radio" name="status" value="3" class="radio"> Student<br></th>
						<td><input type="radio" name="status" value="2" class="radio"> Lecture<br></th>
					</tr>
				</table>
				<br>
				<button type="submit">Sign Up</button>
			</form>
		</div>
		<div class="form-container sign-in-container">
			<form action="static/masuk.php" method="POST">
				<h1>Sign in</h1>
				<div class="social-container">
					<a href="#" class="social"><img src="fb-icon.png" width="20" height="20"></a>
					<a href="#" class="social"><img src="g+-icon.png" width="20" height="20"></a>
					<a href="#" class="social"><img src="in-icon.png" width="20" height="20"></a>
				</div>
				<span>or use your account</span>
				<input type="text" name="username" placeholder="Username" />
				<input type="password" name="password" placeholder="Password" />
				<a href="#">Forgot your password?</a>
				<button type="submit">Sign In</button>
			</form>
		</div>
		<div class="overlay-container">
			<div class="overlay">
				<div class="overlay-panel overlay-left">
					<h1>Welcome Back!</h1>
					<p>To keep connected with us please login with your personal info</p>
					<button class="ghost" id="signIn">Sign In</button>
				</div>
				<div class="overlay-panel overlay-right">
					<h1>Hello, Friend!</h1>
					<p>Enter your personal details and start journey with us</p>
					<button class="ghost" id="signUp">Sign Up</button>
				</div>
			</div>
		</div>
	</div>

	<script src="main.js"></script>
</body>

</html>
