<!DOCTYPE html>
<html lang="en=US">
<head>
		<meta charset="utf-8">
		<title>Sign Up</title>
		<style type="text/css">
		/*body {background-color:yellow;}*/
		.p1 {
			font:24px arial;
		}
		.uplaod {
			font-family: arial;
			font-size: 14px;
			margin-top: 10px;
			margin-bottom: 10px;
		}
		#curImg {
			font-family: arial;
			color:#BDBDBD;
			border-width: 3px;
			border-color: #CEF6F5;
			border-style: ridge;
			width:150px; 
			height:150px;
			margin-bottom: 10px;
		}
		#hint {
			color:#cccccc; 
			font-family:arial; 
			margin-top: 50px; 
			margin-bottom: 50px;
		}
		input[type="text"] {
			font: 18px arial; 
			padding: 3px;
			line-height: 30px;
			margin-top: 10px;
			margin-bottom: 10px;
			width: 300px;
		}
		input[type="password"] {
			font: 18px arial; 
			padding: 3px;
			line-height: 30px;
			margin-top: 10px;
			margin-bottom: 10px;
			width: 300px;
		}
		input[type="file"]{
			opacity: 1;
			margin-top: 10px;
		}
		textarea {
			font: 18px arial; 
			padding: 3px;
			margin-top: 10px;
			margin-bottom: 10px;
			width: 415px;
		}
		.submit
		{
			width: 60px;
			height: 40px;
		}
		form { 
			margin: 0 auto;
		}
		.vertical {
			float:left; 
			padding-top: 100px;
			margin-top: 10px;
		}
		.subVertical {
			float: left;
			width: 550px;
		}
		#specialty {
			padding-top: 10px;
			float: left;
			width: 140px;
		}
		#top {
			text-shadow: 5px 5px 5px #e28bc5;
			font-family: "Times New Roman", Georgia, Serif;
			font-size: 60px;
			margin-left: 10%;
			line-height: 100px;
			float: left;
		}
		#name {
			position: absolute;
			top:0px;
			left: 0px;
			background-color: #00ccff;
			width:  100%;
			height: 100px;
		}
		#submit {
		   -webkit-box-shadow: 2px 3px 2px 0px rgba(0,0,0,1);
		      -moz-box-shadow: 2px 3px 2px 0px rgba(0,0,0,1);
		           box-shadow: 2px 3px 2px 0px rgba(0,0,0,1);
		   border: solid 2px rgba(0,0,0,0);
		   -webkit-border-radius: 9px;
		      -moz-border-radius: 9px;
		           border-radius: 9px;
		   width: 80px;
		   height: 35px;
		   margin: 2px;
		   display: inline-block;
		   -webkit-box-sizing: padding-box;
		      -moz-box-sizing: padding-box;
		           box-sizing: padding-box;
		   font-size: 17px;
		   line-height: 28px;
		   text-align: center;
		   color: rgba(0,0,0,0.46);
		   font-style: italic;
		   font-weight: bold;
		   text-transform: capitalize;
		   margin-left :15%;
		}
		#reset {
		   -webkit-box-shadow: 2px 3px 2px 0px rgba(0,0,0,1);
		      -moz-box-shadow: 2px 3px 2px 0px rgba(0,0,0,1);
		           box-shadow: 2px 3px 2px 0px rgba(0,0,0,1);
		   border: solid 2px rgba(0,0,0,0);
		   -webkit-border-radius: 9px;
		      -moz-border-radius: 9px;
		           border-radius: 9px;
		   width: 80px;
		   height: 35px;
		   margin: 2px;
		   display: inline-block;
		   -webkit-box-sizing: padding-box;
		      -moz-box-sizing: padding-box;
		           box-sizing: padding-box;
		   font-size: 17px;
		   line-height: 28px;
		   text-align: center;
		   color: rgba(0,0,0,0.46);
		   font-style: italic;
		   font-weight: bold;
		   text-transform: capitalize;
		   margin-left :15%;
		}
		#genderOption {
			margin-bottom: 5px;
		}
		.column3 {
			font-family: arial;
			font-size: 20px;
		}
		#login {
			width: 200px;
			height: 30px;
			float:right;
			margin-right: 20px;
			margin-top:  35px;
		}
		#choosePic {
			margin-top: 5px;
			margin-bottom: 5px;
			font-size: 12px;
			background-color: #CEF6F5;
		}
		</style>

		<script type="text/javascript">
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
		</script>
	</head>
	<body>
		<div id="name">
			<label id="top">Tariyaki</label>
			<button id="login">Log in to exsisting account</button>
		</div>

		<div class = "vertical">
			<img id='logo' src='img/logo.png'/>
		</div>
		<div class = "vertical">
		<p class = "p1">Please enter your registered email address:</p>
		<FORM id="signUp" action='sentEmail.php' method='post'>
			<div class="subVertical">
			
			<input type = 'text' placeholder="Email Address ..." id="email" name = 'email'/><br>
			<button form ="signUp" type = "Submit" id="submit">Submit</button>
			<button form ="signUp" type = "Reset" id="reset" value = "reset"/>Reset</button><br>
			</div>
			
			



			</div>
		</FORM>
		</div>
	</body>


<html>