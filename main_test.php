<!DOCTYPE html>
<HTML lang="en-US">
<head>
	<title>mainPage</title>
	<meta charset = "utf-8"/>
	<meta name="author" content="Bolun Zhang, Siyu Liu, Ying Deng">
	<meta name="keywords" content="main page, Tariyaki, music">
	<meta name="generator" content="Notepad++">
	<link  rel = "stylesheet" type="text/css" href="css/main.css">
	
</head>

<body>
	<!-- Top wrap include thumb photo, logo, searching bar and log out button-->

	<h1 id = "logo">Tariyaki</h1>
	<div id="topWrap">
		<!--logo-->
		<div id = "logoArea">
			<h2 id = "thumb"><img id= "thumbPhoto" src = "img/thumb.jpg"></img><h2>
		</div>
		<div id ="bioBlock">
			<p id = "bio">Siyu: I am happy today!</p>
		</div>
		<ul id="nav">
            <li class="topButton"><input type = text></input></li>
            <li class="topButton"><input type="button" title="search" value="search" href=""></input></li>
            <li class="topButton"><input type="button" title="logout" value="logout" href=""></input></li>
        </ul>
	</div>
	<!--Content wrap include friend list post list and comment list-->
	<div id = "contentWrap">
		<!--friend list-->
		<div id= "friendListWrap">
		<iframe src="friendList.php" width="240px" height="795px"></iframe>
		</div>
		
		<!--post list wrap-->
		<div id="postWrap">
			<!-- the first item is a text area for user to input information-->
			<div id = "postInputWrap">
				<div id ="textAreaWrap">
					<input id = "textArea" type = "textArea">
					
					</input>
				</div>
				<div id = "buttonList">
					<ul>
						<li class="postButton"><input type="button" value = "post"href=""></input></li>
						<li class="postButton"><input type="button" value = "upload"href=""></input></li>
					</ul>
				</div>
			</div>
			
			<!--Post list-->
			<div id = "postListWrap">
			<iframe src="postList.php" width="517px" height="605px"></iframe>
				
			</div>			
		</div> 
		<!--Comment list-->
			<div id = "commentWrap">
			<iframe src="commentList.php" width="360px" height="795px"></iframe>
			
			</div>
		</div>
		
		
	
	</div>






</body>