<!DOCTYPE html>
<html lang="en=US" id="html">
<head>
		<meta charset="utf-8">
		<title>Reset</title>
		<link  rel = "stylesheet" type="text/css" href="css/signup.css">

		<script type="text/javascript">
		var picOK=true;
		    function isHidden(oDiv,ooDiv){
     			 var vDiv = document.getElementById(oDiv);
     			 vDiv.style.display = (vDiv.style.display == 'none')?'block':'none';
     			 var vvDiv = document.getElementById(ooDiv);
     			 vvDiv.innerHTML= (vDiv.style.display == 'none')?"Unfold It":"Fold It";
    		}
			function previewImage(file){
				var div = document.getElementById("curImg");
				var MAXWIDTH = 150;
				var MAXHEIGHT = 150;
				
				if(typeof FileReader === "undefined"){
					alert("Your Browser doesn't support thumbnail picture!");
				}else{
					if (file.files && file.files[0]) {
						var myFile = file.files[0];
						if(!/image\/\w+/.test(myFile.type)){ //not pic
							alert("It's not a picture!");
							picOK=false;
						}else{
							div.innerHTML = "<img id='imghead' />";
							var img = document.getElementById("imghead");
							img.onload = function(){
								var rect = clacImgZoomParam(MAXWIDTH, MAXHEIGHT, img.offsetWidth, img.offsetHeight);
								img.width = rect.width;
								img.height = rect.height;
								img.style.marginLeft = rect.left + "px";
								img.style.marginTop = rect.top + "px";
								picOK=true;
							}

							var reader = new FileReader();
							reader.onload = function(evt){
								img.src = evt.target.result;
							}
							reader.readAsDataURL(myFile);
						}
					} else {
						var sFilter = 'filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale,src="';
						file.select();
						var src = document.selection.createRange().text;
						div.innerHTML = '<img id=imghead>';
						var img = document.getElementById('imghead');
						img.filters.item('DXImageTransform.Microsoft.AlphaImageLoader').src = src;
						var rect = clacImgZoomParam(MAXWIDTH, MAXHEIGHT, img.offsetWidth, img.offsetHeight);
						status = ('rect:' + rect.top + ',' + rect.left + ',' + rect.width + ',' + rect.height);
						div.innerHTML = "<div id=divhead style='width:" + rect.width + "px;height:" + rect.height + "px;margin-top:" + rect.top + "px;margin-left:" + rect.left + "px;" + sFilter + src + "\"'></div>";
					}
				}
			}
			function clacImgZoomParam(maxWidth, maxHeight, width, height){
				var param = {
					top: 0,
					left: 0,
					width: width,
					height: height
				};
				if (width > maxWidth || height > maxHeight) {
					rateWidth = width / maxWidth;
					rateHeight = height / maxHeight;
					
					if (rateWidth > rateHeight) {
						param.width = maxWidth;
						param.height = Math.round(height / rateWidth);
					}
					else {
						param.width = Math.round(width / rateHeight);
						param.height = maxHeight;
					}
				}
				
				param.left = Math.round((maxWidth - param.width) / 2);
				param.top = Math.round((maxHeight - param.height) / 2);
				return param;
			}
			function setHead() {
				var width = window.screen.width;
				document.getElementById('name').style.pixelWidth = width;
			}
			function dataCheck(thisForm) {
				if (thisForm.email.value.search(/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/) == -1) {
					alert("Please input proper Email form!");
					thisForm.email.focus();
					return false;
				}
				else if (thisForm.pass1.value !=""&&thisForm.pass1.value !== thisForm.pass2.value)
				{
					alert("Please confirm your password is right!");
					thisForm.pass1.value="";
					thisForm.pass2.value="";
					return false;
				}
				else if (thisForm.pass1.value.length<6 && thisForm.pass1.value.length>0)
				{
					alert("Your password have to be longer than 6!");
					return false;
				}
				else if(thisForm.selfIntro.value==""||thisForm.selfIntro.value==null)
				{
					alert("Self Introduction must be filled out!");
					thisForm.selfIntro.focus();
					return false;
				}
				else if(thisForm.profilePic.value!=""&&(!picOK))
				{
					alert("Please upload proper profile Picture!");
					return false;
				}
				else 
					return true;
			}
		</script>
	</head>
	<body onLoad=setHead();>
		<?php
			include 'DB/Tariyaki-DB.php';
			//set error reporting level at 0
			// error_reporting(0);
			// session_start();
			$conn = connectDatabase();
			if(!isset($_POST['username']))
			{
			echo "<script type='text/Javascript'>
			location.href='login.php';
			
			</script>";
			}
			mysql_select_db($db,$conn);
			function updatePasswordByUserId($userId, $password)
			{
			    global $db;
				$lkid=connectDatabase();
				if (! $succ = mysql_select_db($db))
				{
				    echo mysql_error();
					exit;
				}
				$sql="update login set password='" . $password . "' where userId=" . $userId . ";";
				if (! $res=mysql_query($sql , $lkid)) 
				{
					echo mysql_error();
				}
				mysql_close($lkid);
			}
			function updateProfileByUserId($userId, $profile)
			{
			    global $db;
				$lkid=connectDatabase();
				if (! $succ = mysql_select_db($db))
				{
				    echo mysql_error();
					exit;
				}
				$sql="update user set profile='" . $profile . "' where ID=" . $userId . ";";
				if (! $res=mysql_query($sql , $lkid)) 
				{
					echo mysql_error();
				}
				mysql_close($lkid);
			}
			if (isset($_POST['forget'])&&($_POST['forget']=='yes')) {
				if (isset($_POST['securityQ'])) {
					$securityA=strip_tags(addslashes($_POST['securityA']));
					$securityQ=$_POST['securityQ'];
					$username=$_POST['username'];

					$sql="select * from user inner join login on user.ID = login.userId where SecurityQ='".$securityQ."' and SecurityA='".sha1($securityA)."' and userName='".$username."'";
					$query=mysql_query($sql);
					$rows=mysql_num_rows($query);
					if ($rows==0) {
						echo "<script type='text/javascript'>alert('Wrong Security Answer!');location='javascript:history.back()';</script>";
					} else {
						$forget="yes";
						$res=mysql_fetch_row($query);
						$ID=$res[0];
					
						$firstName= $res[1];
						
						$familyName= $res[2];
						$dob= $res[3];
						$userInfo= $res[4];
						$profilePic= $res[5];
						$email= $res[6];
						$securityQ= $res[7];
						$securityA= $res[8];
						$password= $res[11];
					}
				}
			}


			if(isset($_POST["submit"]))
			{
				$ID = $_POST["ID"];
				$userInfo = strip_tags(addslashes($_POST["selfIntro"]));
				if($userInfo==''||$userInfo==null)
				{
					echo "<script type='text/javascript'>alert('You have to reset your Self Introduction!');location='javascript:history.back()';</script>";
				} else {
					updateUserInfoByUserId($ID,$userInfo);
				}
				$email = strip_tags(addslashes($_POST["email"]));
				if($email==''||$email==null)
				{
					echo "<script type='text/javascript'>alert('You have to reset your Email!');location='javascript:history.back()';</script>";
				} else {
					updateUserEmailByUserId($ID,$email);
				}
				if ($_FILES['profilePic']['size']) {
					$profilename = $_FILES["profilePic"]["name"];
					$arr = explode('.', $profilename);
					$name = $arr[0];
					$fp = fopen($_FILES['profilePic']['tmp_name'],'rb');
					$type = $_FILES['profilePic']['type'];
					if ($_FILES['profilePic']['size']>2000000) {
						echo "<script type='text/javascript'>alert('Profile picture is oversize, please choose a smaller one.');location='javascript:history.back()';</script>";
					}
					$image = addslashes(fread(($fp), filesize($_FILES['profilePic']['tmp_name'])));
					updateProfileByUserId($ID,$image);
				}
				if (isset($_POST["pass1"])&&$_POST["pass1"]!='') {
					$psw = addslashes($_POST["pass1"]);
					echo "password changed";
					if ($psw!=''&&$psw!=null) {
						$psw = sha1($psw);
						updatePasswordByUserId($ID,$psw);
					}
				}


					
				
				
					if($_POST['forget']=='yes')
					{
						echo "<script type='text/javascript'>alert('Successfully Updated!!!');location.href='login.php';</script>"; 
					}
					else {
						//return to mainpage using cookie user ID;
					}
				

			}

		?>
		<div id="name">
			<img id='logo' src='img/logo.png'/>
			<label id="top">Tariyaki</label>
			<button id="login" onclick="location.href='login.php'">Log in to exsisting account</button>
		</div>
		<div class="leftDiv"><p></p></div>
		<div class = "mainFrame" style="margin-left:100px;">
		<p class = "p1">Reset Your Information:</p>
		<FORM id="signUp" action='reset.php' onsubmit="return dataCheck(this)" method='post' enctype="multipart/form-data">
			<div class="subVertical">
				<?php
					echo "<input hidden type='text' id='forget' name='forget' value='".$forget."'/><br>"; 
					echo "<input hidden type='text' id='ID' name='ID' value='".$ID."'/><br>";
					echo "<input type='text' disabled='disabled' id='user name' name='user' value='".$username."'/><br>";
					echo "<input type='text' disabled='disabled' placeholder='Enter First Name ...' id='first name' name='first' value='".$firstName."'/>";
					echo "<input type='text' disabled='disabled' placeholder='Enter Last Name ...' id='last name' name='last' value='".$familyName."'/><br>";
					echo "<input type = 'text' placeholder='Email Address ...' id='email' name = 'email' value='".$email."'/><br>";
					echo "<input placeholder='Enter Password ...' type='password' id='password1' name='pass1' value=''/>";
					echo "<input placeholder='Confirm Password ...' type='password' id='password2' name = 'pass2'/><br>";
					echo "<textarea rows='6' cols='30' placeholder='Self Introduction ...' id='selfIntro' name='selfIntro'>".$userInfo."</textarea><br>";
			?>
			<!-- <textarea rows="6" cols="30" placeholder="Self Introduction ..." id="selfIntro" name='selfIntro'></textarea><br> -->
			</div>
			<div class="subVertical" style="margin-left:100px;">
				
			<label id="hint">Upload profile picture:</label><br>
			<input type="file" id="choosePic" name="profilePic" onchange="previewImage(this);"/><br>
			<div id="curImg">
				<span id="imgHint">Profile image</span>
			</div>
			</div>
		</FORM>
		<p>
		<input form ="signUp" type = "Submit" id="submit" name="submit">
		<input form ="signUp" type = "Reset" id="reset" value = "reset"/>
		</p>
		</div>
		<div class="rightDiv"><p></p></div>
	</body>


<html>