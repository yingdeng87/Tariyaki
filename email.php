<!DOCTYPE html>
<html lang="en=US">
<head>
		<meta charset="utf-8">
		<title>Forget?</title>
		<link  rel = "stylesheet" type="text/css" href="css/signup.css">
	</head>
	<body>
		<div id="name">
			<img id='logo' src='img/logo.png'/>
			<label id="top">Tariyaki</label>
			<button id="login" onclick="location.href='login.php'">Log in to exsisting account</button>
		</div>
		<div class="leftDiv"><p></p></div>
		<div class = "mainFrame" style="margin-left:100px;">
		<p class="p2">Please enter your registered email address:</p>
		<FORM id="signUp" action='security.php' method='post'>
			<div class="subVertical">
			<input type = 'text' placeholder="User Name ..." id="user" name='user'></br>
			<input form ="signUp" type = "Submit" id="submit">
			<button form ="signUp" type = "Reset" id="reset" value = "reset"/>Reset</button><br>
			</div>
		</FORM>
		</div>
	</body>


<html>