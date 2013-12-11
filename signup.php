<!DOCTYPE html>
<html lang="en=US" id="html">
<head>
		<meta charset="utf-8">
		<title>Sign Up</title>
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
				if(thisForm.first.value==""||thisForm.first.value==null)
				{
					alert("First Name must be filled out!");
					thisForm.first.focus();
					return false;
				} 
				else if(thisForm.last.value==""||thisForm.last.value==null)
				{
					alert("First Name must be filled out!");
					thisForm.last.focus();
					return false;
				} 
				else if(thisForm.user.value==""||thisForm.user.value==null)
				{
					alert("User Name must be filled out!");
					thisForm.user.focus();
					return false;
				}
				else if(thisForm.email.value==""||thisForm.email.value==null)
				{
					alert("Email must be filled out!");
					thisForm.email.focus();
					return false;
				}
				else if (thisForm.email.value.search(/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/) == -1) {
					alert("Please input proper Email form!");
					thisForm.email.focus();
					return false;
				}
				else if(thisForm.pass1.value==""||thisForm.pass1.value==null)
				{
					alert("Password must be filled out!");
					thisForm.pass1.focus();	
					return false;
				}
				else if(thisForm.pass1.value.length<6)
				{
					alert("Your password have to be longer than 6!");
					return false;
				}
				else if(thisForm.pass2.value==""||thisForm.pass2.value==null)
				{
					alert("You must confirm your password!");
					thisForm.pass2.focus();
					return false;
				}
				else if (thisForm.pass1.value !== thisForm.pass2.value)
				{
					alert("Please confirm your password is right!");
					thisForm.pass1.value="";
					thisForm.pass2.value="";
					return false;
				}
				else if(thisForm.selfIntro.value==""||thisForm.selfIntro.value==null)
				{
					alert("Self Introduction must be filled out!");
					thisForm.selfIntro.focus();
					return false;
				}
				else if(thisForm.profilePic.value==""||thisForm.profilePic.value==null)
				{
					alert("Please choose a Profile Picture!");
					thisForm.profilePic.focus();
					return false;
				}
				else if(!picOK)
				{
					alert("Please upload proper profile Picture!");
					return false;
				}
				else if(thisForm.securityQ.value==""||thisForm.securityQ.value==null)
				{
					alert("Please Set your security Question!");
					thisForm.securityQ.focus();
					return false;
				}
				else if(thisForm.securityA.value==""||thisForm.securityA.value==null)
				{
					alert("Please Set your security Answer!");
					thisForm.securityA.focus();
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
			mysql_select_db($db,$conn);
			if(isset($_POST["submit"]))
			{
				$username = strip_tags(addslashes($_POST["user"]));
				if($username==''||$username==null)
				{
					echo "<script type='text/javascript'>alert('You have input html tags as username!');location='javascript:history.back()';</script>";
				}
				$userInfo = strip_tags(addslashes($_POST["selfIntro"]));
				if($userInfo==''||$userInfo==null)
				{
					echo "<script type='text/javascript'>alert('You have input html tags as Self Introduction!');location='javascript:history.back()';</script>";
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
				}
				$image = addslashes(fread(($fp), filesize($_FILES['profilePic']['tmp_name'])));
				$profile = $image;
				$email = strip_tags(addslashes($_POST["email"]));
				if($email==''||$email==null)
				{
					echo "<script type='text/javascript'>alert('You have input html tags as Email!');location='javascript:history.back()';</script>";
				}
				$psw = addslashes($_POST["pass1"]);
				$firstname = strip_tags(addslashes($_POST["first"]));
				if($firstname==''||$firstname==null)
				{
					echo "<script type='text/javascript'>alert('You have input html tags as First Name!');location='javascript:history.back()';</script>";
				}
				$lastname = strip_tags(addslashes($_POST["last"]));
				if($lastname==''||$lastname==null)
				{
					echo "<script type='text/javascript'>alert('You have input html tags as Last Name!');location='javascript:history.back()';</script>";
				}
				$securityA = strip_tags(addslashes($_POST["securityA"]));
				if($securityA==''||$securityA==null)
				{
					echo "<script type='text/javascript'>alert('You have input html tags as security Answer!');location='javascript:history.back()';</script>";
				}
				$securityQ = strip_tags(addslashes($_POST["securityQ"]));
				if($securityQ==''||$securityQ==null)
				{
					echo "<script type='text/javascript'>alert('You have input html tags as security Question!');location='javascript:history.back()';</script>";
				}
				$psw = sha1($psw);
				$securityA = sha1($securityA);
				$sql="select username from login where username='$username'";
				$query=mysql_query($sql);
				$rows=mysql_num_rows($query);
				if ($rows>0) {
					echo "<script type='text/javascript'>alert('User Existed, enter again!');location='javascript:history.back()';</script>";
				} else{
					addUserSecurity($firstname,$lastname,null,$userInfo,$profile,$email,$securityQ,$securityA,$username,$psw);
					$userId = userIdByUserNameAndPassword($username,$psw);
					$SouthEastAsian = 0;
					$Country = 0;
					$SKA = 0;
					$EastAsian = 0;
					$Blues = 0;
					$ModemFolk = 0;
					$HipPop = 0;
					$African = 0;
					$Electronic =0;
					$Jazz = 0;
					$Classic = 0;
					$Inspirational = 0;
					$Pop =0;
					$Rock =0;
					$Opera =0;
					$RB = 0;
					$Industrial =0;
					$ChineseOpera =0;
					$HeavyMetal = 0;
					if (!empty($_POST['speciality'])) {
						foreach ($_POST['speciality'] as $specialty) {
							if ($specialty=="HeavyMetal") {
								$HeavyMetal = 1;
							}
							if ($specialty=="ChineseOpera") {
								$ChineseOpera = 1;
							}
							if ($specialty=="Industrial") {
								$Industrial = 1;
							}
							if ($specialty=="RB") {
								$RB = 1;
							}
							if ($specialty=="Opera") {
								$Opera = 1;
							}
							if ($specialty=="Rock") {
								$Rock = 1;
							}
							if ($specialty=="SouthEastAsian") {
								$SouthEastAsian = 1;
							}
							if ($specialty=="Country") {
								$Country = 1;
							}
							if ($specialty=="SKA") {
								$SKA = 1;
							}
							if ($specialty=="EastAsian") {
								$EastAsian = 1;
							}
							if ($specialty=="Blues") {
								$Blues = 1;
							} 
							if ($specialty=="ModemFolk") {
								$ModemFolk = 1;
							}
							if ($specialty=="HipPop") {
								$HipPop = 1;
							}
							if ($specialty=="African") {
								$African = 1;
							}
							if ($specialty=="Electronic") {
								$Electronic = 1;
							} 
							if ($specialty=="Jazz") {
								$Jazz = 1;
							}
							if ($specialty=="Classic") {
								$Classic = 1;
							}
							if ($specialty=="Inspirational") {
								$Inspirational = 1;
							} 
							if ($specialty=="Pop") {
								$Pop = 1;
							}
						}
					}
					addSpecialty($userId,$SouthEastAsian, $Country, $SKA, $EastAsian, $Blues, $ModemFolk, 
					$HipPop, $African, $Electronic, $Jazz, $Classic, $Inspirational, $Pop, $Rock, $Opera, $RB, 
					$Industrial, $ChineseOpera, $HeavyMetal);
					echo "<script type='text/javascript'>alert('Successfully Registered!!!');location.href='login.php';</script>"; 
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
		<p class = "p1">Sign Up</p>
		<FORM id="signUp" action='signup.php' onsubmit="return dataCheck(this)" method='post' enctype="multipart/form-data">
			<div class="subVertical">
			<input type='text' placeholder="Enter First Name ..." id="first name" name="first"/>
			<input type='text' placeholder="Enter Last Name ..." id="last name" name="last"/><br>
			<input type='text' placeholder="Enter User Name ..." id="user name" name='user'/><br>
			<input type = 'text' placeholder="Email Address ..." id="email" name = 'email'/><br>
			<input placeholder="Enter Password ..." type="password" id="password1" name='pass1'/>
			<input placeholder="Confirm Password ..." type="password" id="password2" name = 'pass2'/><br>
			<textarea rows="6" cols="30" placeholder="Self Introduction ..." id="selfIntro" name='selfIntro'></textarea><br>
			</div>
			<div class="subVertical" style="margin-left:100px;">
			<div id= "wrap">
			<div class="column3" style="width:390px; cursor:pointer; margin-left:5px;" onclick="isHidden('fold','icon')">
				<span>Specialty:</span>
				<label class="column3" id="icon" style="cursor:pointer; margin-left:150px;">Unfold It</label>
			</div>
			<!-- <hr style="border : solid 1px rgba(0,0,0,0.1);"/> -->
			<div id="fold">
			<div id="specialty1">
				<br>	
				<input type="checkbox" value="SouthEastAsian" name="speciality[]">South East Asian <br>
				<input type="checkbox" value="EastAsian" name="speciality[]">East Asian <br> 
				<input type="checkbox" value="HipPop" name="speciality[]">Hip pop <br> 
				<input type="checkbox" value="Jazz" name="speciality[]">Jazz <br> 
				<input type="checkbox" value="Pop" name="speciality[]">Pop <br> 
				<input type="checkbox" value="RB" name="speciality[]">R&B <br>
				<input type="checkbox" value="HeavyMetal" name="specialty[]">Heavy Metal <br>
			</div>
			<div id="specialty2">
				<br>
				<input type="checkbox" value="Country" name="speciality[]">Country <br> 
				<input type="checkbox" value="Blues" name="speciality[]">Blues <br> 
				<input type="checkbox" value="African" name="speciality[]">African <br> 
				<input type="checkbox" value="Classic" name="speciality[]">Classic <br> 
				<input type="checkbox" value="Rock" name="speciality[]">Rock <br>
				<input type="checkbox" value="Industrial" name="speciality[]">Industrial <br><br>
			</div>
			<div id="specialty3">
				<br>
				<input type="checkbox" value="SKA" name="speciality[]">SKA <br>
				<input type="checkbox" value="ModemFolk" name="speciality[]">Modem Folk <br>
				<input type="checkbox" value="Electronic" name="speciality[]">Electronic <br>
				<input type="checkbox" value="Inspirational" name="speciality[]">Inspirational <br> 
				<input type="checkbox" value="Opera" name="speciality[]">Opera <br> 
				<input type="checkbox" value="ChineseOpera" name="speciality[]">Chinese Opera <br><br>
			</div>
			</div>
			</div><br>
			<label id="hint">Upload profile picture:</label><br>
			<input type="file" id="choosePic" name="profilePic" onchange="previewImage(this);"/><br>
			<div id="curImg">
				<span id="imgHint">Profile image</span>
			</div>
			<input type='text' placeholder="Enter your security Question..." id="securityQ" name="securityQ"/><br>
			<input type='text' placeholder="Enter your security Answer ..." id="securityA" name="securityA"/><br>
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