<!DOCTYPE html>
<html lang="en=US" id="html">
<head>
		<meta charset="utf-8">
		<title>Sign Up</title>
		<style type="text/css">
		html {
			overflow-x:auto;
			min-width: 1300px;
		}
		body {
			margin: 0;
			padding:0;
		}
		.p1 {
			font:45px arial;
			font-weight: bold;
		}
		.uplaod {
			font-family: arial;
			font-size: 14px;
			margin-top: 10px;
			margin-bottom: 10px;
		}
		#curImg {
			text-align: center;
			font-family: arial;
			color:#BDBDBD;
			border : solid 1px rgba(0,0,0,0.3);
			/*border-color: #00ccff;*/

			border-style: ridge;
			width:150px; 
			height:150px;
			margin-bottom: 10px;
			border-radius: 10px;
		}
		#hint {
			font-size: 20px;
			font-family:arial;
		}
		input[type="text"] {
			font: 15px arial; 
			padding: 1px;
			line-height: 25px;
			margin-top: 10px;
			margin-bottom: 10px;
			width: 150px;
			border-radius: 5px;
		}
		input[type="password"] {
			font: 15px arial; 
			padding: 1px;
			line-height: 25px;
			margin-top: 10px;
			margin-bottom: 10px;
			width: 150px;
			border-radius: 5px;
		}
		input[type="file"]{
			opacity: 1;
			margin-top: 10px;
			border-radius: 5px;
		}
		textarea {
			font: 18px arial; 
			padding: 3px;
			margin-top: 10px;
			margin-bottom: 10px;
			width: 200px;
			border-radius: 5px;
			border : solid 1px rgba(0,0,0,0.3);
			resize: none;
		}
		form { 
			margin: 0 auto;
		}
		.leftDiv {
			float: left;
			width: 20%;
			margin-left: auto;
		}
		.rightDiv {
			float: right;
			width: 20%;
		}
		.mainFrame {
			float:left;
			margin-top: 5px;
			margin-left: 5px;
			margin-right: 5px;
			margin-bottom: 5px;
		}
		.subVertical {
			margin-left: 5px;
			margin-right: 5px;
			margin-bottom: 5px;
			margin-top: 5px;
			float: left;
		}
		#specialty1 {
			float: left;
			margin-left: 5px;
			width: 130px;
		}
		#specialty2 {
			float: left;
			width: 80px;
		}
		#specialty3 {
			float: left;
			width: 130px;
		}
		#top {
			text-shadow: 5px 5px 5px #F2F2F2;
			font-family: "Times New Roman", Georgia, Serif;
			font-size: 60px;
			margin-left: 1%;
			line-height: 100px;
			float: left;
		}
		#name {
			/*position: absolute;*/
/*			top:0px;
			left: 0px;*/
			overflow: hidden;
			background-color: #00ccff;
			height: 100px;
		}
		#submit {
			cursor: pointer;
			width: 80px;
			height: 30px;
			border-radius: 5px;
			background-color: #58D3F7;
			color: white;
			border-color: #58D3F7;
			overflow: hidden;
			float:left;
			margin-left: 15%;
			margin-top:  35px;
			clear: both;
		}
		#reset {
			cursor: pointer;
			width: 80px;
			height: 30px;
			border-radius: 5px;
			background-color: #58D3F7;
			color: white;
			border-color: #58D3F7;
			overflow: hidden;
			float:left;
			margin-left: 15%;
			margin-top:  35px;
		}
		#genderOption {
			margin-bottom: 15px;

		}
		.column3 {
			font-family: arial;
			font-size: 20px;
			background-color: 
		}
		#login {
			cursor: pointer;
			width: 200px;
			height: 30px;
			border-radius: 5px;
			background-color: #58D3F7;
			color: white;
			border-color: #58D3F7;
			overflow: hidden;
			float:right;
			margin-right: 20px;
			margin-top:  35px;
		}
		#choosePic {
			margin-top: 5px;
			margin-bottom: 5px;
			opacity: 1;
			font-size: 12px;
		}
		#fold {
			display: none;
			overflow: hidden;
		}
		#wrap {
			width: 345px;
			border : solid 1px rgba(0,0,0,0.1);
			margin-bottom: 20px;
			border-radius: 10px;
		}
		#imgHint {
			position: relative;
			top:40%;
		}
		#logo {
			width: 230px;
			height: 150px;
			float: left;
			margin-left:10%;
		}
		</style>

		<script type="text/javascript">
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
						}else{
							div.innerHTML = "<img id='imghead' />";
							var img = document.getElementById("imghead");
							img.onload = function(){
								var rect = clacImgZoomParam(MAXWIDTH, MAXHEIGHT, img.offsetWidth, img.offsetHeight);
								img.width = rect.width;
								img.height = rect.height;
								img.style.marginLeft = rect.left + "px";
								img.style.marginTop = rect.top + "px";
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
				if(thisForm.user.value==""||thisForm.user.value==null)
				{
					alert("User Name must be filled out!");
					thisForm.user.focus();
					return false;
				}
				if(thisForm.email.value==""||thisForm.user.value==null)
				{
					alert("Email must be filled out!");
					thisForm.email.focus();
					return false;
				}
				if (thisForm.email.value.search(/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/) == -1) {
					alert("Please input proper Email form!");
					thisForm.email.focus();
					return false;
				}
				if(thisForm.pass1.value==""||thisForm.user.value==null)
				{
					alert("Password must be filled out!");
					thisForm.fass1.focus();	
					return false;
				}
				if(thisForm.pass2.value==""||thisForm.user.value==null)
				{
					alert("You must confirm your password!");
					thisForm.fass2.focus();
					return false;
				}
				if (thisForm.pass1.value!=thisForm.pass1.value)
				{
					alert("Please confirm your password is right!");
					thisForm.pass1.value="";
					thisForm.pass2.value="";
					return false;
				}
				if(thisForm.selfIntro.value==""||thisForm.user.value==null)
				{
					alert("Self Introduction must be filled out!");
					thisForm.selfIntro.focus();
					return false;
				}
				if(thisForm.gender.value==""||thisForm.user.value==null)
				{
					alert("Please choose your gender!");
					return false;
				}
				if(thisForm.profilePic.value==""||thisForm.user.value==null)
				{
					alert("Please choose a Profile Picture!");
					thisForm.profilePic.focus();
					return false;
				}
			}
		</script>
	</head>
	<body onLoad=setHead();>
		<div id="name">
			<img id='logo' src='img/logo.png'/>
			<label id="top">Tariyaki</label>
			<button id="login">Log in to exsisting account</button>
		</div>
		<div class="leftDiv"><p></p></div>
		<div class = "mainFrame" style="margin-left:100px;">
		<p class = "p1">Sign Up</p>
		<FORM id="signUp" action='login.php' onsubmit="return dataCheck(this)" method='post'>
			<div class="subVertical">
			<input type='text' placeholder="Enter User Name ..." id="user name" name='user'/><br>
			<input type = 'text' placeholder="Email Address ..." id="email" name = 'email'/><br>
			<input placeholder="Enter Password ..." type="password" id="password1" name='pass1'/><br>
			<input placeholder="Confirm Password ..." type="password" id="password2" name = 'pass2'/><br>
			<textarea rows="6" cols="30" placeholder="Self Introduction ..." id="selfIntro" name='selfIntro'></textarea><br>
			</div>
			<div class="subVertical" style="margin-left:100px;">
			<label class="column3">Gender: 
			<span style="padding-left:5px;">Male</span><input type="radio" name="gender" form="signUp" value="male">
			<span style="padding-left:5px;">Female</span><input type="radio" name="gender" form="signUp" value="female">
			</label><br><br><br>
			<div id= "wrap">
			<div class="column3" style="width:390px; cursor:pointer; margin-left:5px;" onclick="isHidden('fold','icon')">
				<span>Specialty:</span>
				<label class="column3" id="icon" style="cursor:pointer; margin-left:150px;">Unfold It</label>
			</div>
			<!-- <hr style="border : solid 1px rgba(0,0,0,0.1);"/> -->
			<div id="fold">
			<div id="specialty1">
				<br>	
				<input type="checkbox" value="South East Asian" name="speciality">South East Asian <br>
				<input type="checkbox" value="East Asian" name="speciality">East Asian <br> 
				<input type="checkbox" value="Hip pop" name="speciality">Hip pop <br> 
				<input type="checkbox" value="Jazz" name="speciality">Jazz <br> 
				<input type="checkbox" value="Pop" name="speciality">Pop <br> 
				<input type="checkbox" value="R&B" name="speciality">R&B <br><br>
			</div>
			<div id="specialty2">
				<br>
				<input type="checkbox" value="Country" name="speciality">Country <br> 
				<input type="checkbox" value="Blues" name="speciality">Blues <br> 
				<input type="checkbox" value="African" name="speciality">African <br> 
				<input type="checkbox" value="Classic" name="speciality">Classic <br> 
				<input type="checkbox" value="Rock" name="speciality">Rock <br>
				<input type="checkbox" value="Industrial" name="speciality">Industrial <br><br>
			</div>
			<div id="specialty3">
				<br>
				<input type="checkbox" value="SKA" name="speciality">SKA <br>
				<input type="checkbox" value="Modem Folk" name="speciality">Modem Folk <br>
				<input type="checkbox" value="Electronic" name="speciality">Electronic <br>
				<input type="checkbox" value="Inspirational" name="speciality">Inspirational <br> 
				<input type="checkbox" value="Opera" name="speciality">Opera <br> 
				<input type="checkbox" value="Chinese Opera" name="speciality">Chinese Opera <br><br>
			</div>
			</div>
			</div><br>
			<label id="hint">Upload profile picture:</label><br>
			<input type="file" id="choosePic" name="profilePic" onchange="previewImage(this);"/><br>
			<div id="curImg">
				<span id="imgHint">Profile image</span>
			</div>
			</div>
		</FORM>
		<p>
		<input form ="signUp" type = "Submit" id="submit">
		<input form ="signUp" type = "Reset" id="reset" value = "reset"/>
		</p>
		</div>
		<div class="rightDiv"><p></p></div>
	</body>


<html>