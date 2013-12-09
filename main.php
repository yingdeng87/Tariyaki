<!DOCTYPE html>
<HTML lang="en-US">
<head>
	<title>
	<?php
	define('ROOT', __DIR__); 
	include ROOT . '/DB/tariyaki-DB.php';
	connectDatabase();
	if(isset($_POST['userId']))
	{	
		
		$userId = $_POST['userId'];
		
		echo firstNameByUserId($userId)."'s page";
	}
	
	?>

	</title>
	<meta charset = "utf-8"/>
	<meta name="author" content="Bolun Zhang, Siyu Liu, Ying Deng">
	<meta name="keywords" content="main page, Tariyaki, music">
	<meta name="generator" content="Notepad++">
	<link  rel = "stylesheet" type="text/css" href="css/main.css">
	<script type="text/javascript">
		function uploadMusic(file)
		{
			if (!file.value.match(/\.(mp3|wav)$/))
			alert('not support your music file');
			
		}
	</script>
</head>

<body>
	<?php
	//add new post to user post list
	if(isset($_FILES['musicUpload'])&&isset($_POST['postText'])){
	echo "it works";
	//addMusic(2, "music", $_FILES['musicUpload']['tmp_name']);
	echo $_FILES['musicUpload']['tmp_name'];
	 move_uploaded_file($_FILES["musicUpload"]["tmp_name"],
      "music/" . $_FILES["musicUpload"]["name"]);
	//$row = musicIdByUserId(2);
	//foreach($row as $p)
	//echo $p."<br>";
	//addArticle(2, $musicId, null, null, null, $_POST['postText']);
	}
	else
	echo "no";
	
	?>
	<!-- Top wrap include thumb photo, logo, searching bar and log out button-->

	<h1 id = "logo">Tariyaki</h1>
	<div id="topWrap">
		<!--logo-->
		<div id = "logoArea">
			<h2 id = "thumb">
			<?php
		
				echo '<img height = 60px src="data:image/jpg;base64,'.base64_encode(profileByUserId($_POST[$userId])).'"><br>';
			?>

			<h2>
		</div>
		<div id ="bioBlock">
			<p id = "bio">
			<?php
			echo firstNameByUserId($_POST[$userId]).":";
			echo userInfoByUserId($_POST[$userId])."</br>";
			?>
			</p>
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
			<?php
			
			//if(isset($_POST['userId']))
			//{	
				
				$arr = resOfFriendByUserId(1);
				echo"<form action='friend.php' method='post'>";
				echo"<ul>";
				while($row = mysql_fetch_array($arr,MYSQL_NUM))
				{
					$i=1;
					echo '<li>';
					echo '<img height = 20px src="data:image/jpg;base64,'.base64_encode(profileByUserId(2)).'">';
					echo "<input  type =submit name=friend value='";
					foreach($row as $p)
					{
						if($i==3||$i==4)
							echo $p." ";
						$i++;
					}
					echo"'>";
					
				}
				
				echo"</form>";
			//}
			?>
		</div>
		
		<!--post list wrap-->
		<div id="postWrap">
			<!-- the first item is a text area for user to input information-->
			<div id = "postInputWrap">
				<form id="postForm" action='main.php' onsubmit="return dataCheck(this)" method='post' enctype="multipart/form-data">
				<div id ="textAreaWrap">
					<input id = "textArea" type = "textArea" name="postText">
					
					</input>
				</div>
				<div id = "buttonList">
				
					<ul>
						<li class="postButton"><input type="file" id="uploadButton" name="musicUpload" onchange="uploadMusic(this);"/><br></li>
						<li class="postButton"><input type="submit" id = "submitPost" name = "post"></input></li>
					</ul>
				</div>
				</form>
			</div>
			
			<!--Post list-->
			<div id = "postListWrap">
			
			</div>			
		</div> 
		<!--Comment list-->
			<div id = "commentWrap">
			
			</div>
		</div>
		
		
	
	</div>






</body>
