<!DOCTYPE html>
<html lang="en=US" id="html">
<head>
		<meta charset="utf-8">
		<title>Security</title>
		<link  rel = "stylesheet" type="text/css" href="css/signup.css">
	</head>
	<body onLoad=setHead();>
		<?php
			include 'DB/Tariyaki-DB.php';
			if(!isset($_POST['user']))
			{
			echo "<script type='text/Javascript'>
			location.href='login.php';
		
			</script>";
			}
			if(isset($_POST["user"])&& ($_POST["user"]!=''))
			{
				$username = strip_tags(addslashes($_POST["user"]));
				if ($username==''||$username==null)
				{
					echo "<script type='text/javascript'>alert('You input tags as User Name!');location='javascript:history.back()';</script>";
				}
				$conn = connectDatabase();
				mysql_select_db($db,$conn);
				$sql="select userId from login where userName='".$username."'";
				$query=mysql_query($sql);
				$rows=mysql_num_rows($query);
				if ($rows==0) {
					echo "<script type='text/javascript'>alert('User Name not exsist!');location='javascript:history.back()';</script>";
				}
				$res=mysql_fetch_row($query);
				$userId=$res[0];
				$sql="select SecurityQ from user where ID='".$userId."'";
				$query=mysql_query($sql);
				if ($res=mysql_fetch_row($query)){
					$securityQ=$res[0];
					if ($securityQ=='') {
						echo "<script type='text/javascript'>alert('Security Qusetion not exsist!');location='javascript:history.back()';</script>";
					}
				} else {
					echo "<script type='text/javascript'>alert('Security Qusetion not exsist!');location='javascript:history.back()';</script>";
				}
			} else {
				echo "<script type='text/javascript'>alert('User Name Cannot be empty!');location='javascript:history.back()';</script>";
			}
		?>
		<div id="name">
			<img id='logo' src='img/logo.png'/>
			<label id="top">Tariyaki</label>
			<button id="login" onclick="location.href='login.php'">Log in to exsisting account</button>
		</div>
		<div class="leftDiv"><p></p></div>
		<div class = "mainFrame" style="margin-left:100px;">
			<FORM id='signUp' action='reset.php' method='post'>
			<div class="subVertical">
			<?php
				echo "Security Question:<br>".$securityQ."<br>";
				echo "<input hidden type=text id='forget' name='forget' value='yes'>";
				echo "<input hidden type=text id='username' name='username' value='$username'>";
				echo "<input hidden type=text id='securityQ' name='securityQ' value='$securityQ'>";
			?>
			<input type = 'text' placeholder="Security Answer ..." id="securityA" name='securityA'></br>
			<input form ="signUp" type = "Submit" id="submit">
			<button form ="signUp" type = "Reset" id="reset" value = "reset"/>Reset</button><br>
			</div>

		</div>
		<div class="rightDiv"><p></p></div>
	</body>


<html>