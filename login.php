<!DOCTYPE html>
<html lang="en=US">
<head>
		<meta charset="utf-8">
		<title>Login</title>
		<link  rel = "stylesheet" type="text/css" href="css/signup.css">
		<script type="text/javascript">
		</script>

	</head>
	<body>
		<div id="name">
			<img id='logo' src='img/logo.png'/>
			<label id="top">Tariyaki</label>
			<button id="login" onclick="location.href='signup.php'">Don't hava account?</button>
		</div>
		<div class="leftDiv"><p></p></div>
		<div class = "mainFrame" style="margin-left:100px;">
		<p class = "p1">Login Now!</p>
		<FORM id="signUp" action='main.php' method='post'>
			<div class="subVertical">
			<input type='text' placeholder="Enter User Name ..." id="user name" name='user'/><br>
			
			<input placeholder="Enter Password ..." type="password" id="password1" name='pass1'/><br>
			</div>
		</FORM>
		<button form="signUp" type = "Submit" id="submit">Go!</button>
		<button id="reset" name="forget" onclick="location.href='email.php'">Forget</button>
		</div>
		</div>
	</body>


<html>