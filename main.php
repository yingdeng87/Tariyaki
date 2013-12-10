<?php
	if(isset($_POST['userId']))
	{
		define('ROOT', __DIR__); 
		include ROOT . '/DB/tariyaki-DB.php';
		connectDatabase();
		session_start();
		$_POST['userId']=addSlashes($_POST['userId']);
		$_SESSION['userId'] = $_POST['userId'];
		echo $_POST['userId'];
	}
	else if(isset($_POST['user'])&&isset($_POST['pass1']))
	{
		$_POST['user']=addSlashes($_POST['user']);
		$_POST['pass1']=addSlashes($_POST['pass1']);
		define('ROOT', __DIR__); 
		include ROOT . '/DB/tariyaki-DB.php';
		connectDatabase();
		session_start();
		$_SESSION['userId'] = userIdByUserNameAndPassword($_POST['user'], sha1($_POST['pass1']));
		if(userIdByUserNameAndPassword($_POST['user'], sha1($_POST['pass1']))==null)
		{
			$url="signup.php"; 
			echo "<script type='text/Javascript'>alert('invalid username or password');location.href='login.php';</script>"; 
		}
		$_SESSION['userId'] = userIdByUserNameAndPassword($_POST['user'], sha1($_POST['pass1']));
		
	}
	else
	{
		$url="signup.php"; 
		echo "<script type='text/Javascript'>
		location.href='login.php';</script>"; 
	}

	
	

?>
<!DOCTYPE html>
<HTML lang="en-US">
<head>
	<title>
	<?php
	if(isset($_SESSION['userId']))
	{	
		
		$userId = $_SESSION['userId'];
		
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
	
	$allowedExts = array("mp3");
	$temp = explode(".", $_FILES["musicUpload"]["name"]);
	$extension = end($temp);
	echo $extension;
	echo in_array($extension, $allowedExts);
	if (($_FILES["musicUpload"]["type"] == "audio/mp3")&&($_FILES["musicUpload"]["size"] < 100000)&& in_array($extension, $allowedExts))
	{
	
	move_uploaded_file($_FILES["musicUpload"]["tmp_name"],
      "./upload/".$_FILES["musicUpload"]["name"]);
	//echo "upload path = ".$_FILES['musicUpload']['name'];
	$musicLink = "upload/" . $_FILES["musicUpload"]["name"];
	$musicId = addMusic($_SESSION['userId'],$_FILES['musicUpload']['name'], $musicLink);
	//echo "uploaded successive musicId = ".$musicId;
	}
	else
	{
		$musicId = addMusic($_SESSION['userId'],'null','null');
	}
	//addArticle($userId, $musicId, $videoId, $pictureId, $title, $content)
	if(isset($_POST['postText']))
	{
	if($_POST['postText']=='')
	$_POST['postText'] = ' ';
	$_POST['postText']=addSlashes($_POST['postText']);
	$_POST['textTitle']=addSlashes($_POST['textTitle']);
	addArticle($_SESSION['userId'], $musicId, 'null','null',$_POST['textTitle'],$_POST['postText']);
	}
	else
	{
	$_POST['postText'] = ' ';
	addArticle($_SESSION['userId'], $musicId, 'null',$_POST['textTitle'],$_POST['postText']);
	}
	
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
		
				echo '<img height = 60px src="data:image/jpg;base64,'.base64_encode(profileByUserId($_SESSION['userId'])).'"><br>';
			?>

			<h2>
		</div>
		<div id ="bioBlock">
			<p id = "bio">
			<?php
			echo firstNameByUserId($_SESSION['userId']).":";
			echo userInfoByUserId($_SESSION['userId'])."</br>";
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
			
			if(isset($_SESSION['userId']))
			{	
				
				$arr = resOfFriendByUserId($_SESSION['userId']);
				
				echo"<ul>";
				while($row = mysql_fetch_array($arr,MYSQL_NUM))
				{
					echo"<form action='friend.php' method='post'>";
					$i=1;
					foreach($row as $p)
					{
						if($i==1)
							$friendId = $p;
						else if($i==2)
							$userId = $p;
						else if($i==3)
							$friendFirstName = $p;
						else
							$firendLastName = $p;
						$i++;
					}
					echo '<li>';
					echo '<img height = 20px src="data:image/jpg;base64,'.base64_encode(profileByUserId($friendId)).'">';
					echo "<input  type =submit name=friend value='";
					echo "$friendFirstName $firendLastName";
					echo"'>";
					echo "<input hidden type = text name = friendId value = $friendId>";
					$userId = $_SESSION['userId'];
					echo "<input hidden type = text name = userId value = $userId>";
					echo"</form>";
					
				}
				
				
			}
			?>
		</div>
		
		<!--post list wrap-->
		<div id="postWrap">
			<!-- the first item is a text area for user to input information-->
			<div id = "postInputWrap">
				<form id="postForm" action='main.php' onsubmit="return dataCheck(this)" method='post' enctype="multipart/form-data">
				<?php
				if(isset($_POST['userId']))
				$userId = $_POST['userId'];
				echo "<input hidden type = text name = userId value = $userId />"
				?>

					
				<div id ="textAreaWrap">
					<input id = "textTitle" type = text name = 'textTitle' />
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
				<ul>
					<?php
						$arr=articleIdByUserId($_SESSION['userId']);
						foreach($arr as $p)
						{
							echo"<li>";
							//post title
							echo"<p>";
							echo titleByArticleId($p);
							echo"</p><br><hr>";
							//post music
							$musicId=musicIdByArticleId($p);
							$musicLink = musicLinkByMusicId($musicId);
							echo "<audio controls>";
							echo "<source src='$musicLink' type='audio/mpeg'><embed height='50' width='100' src='$musicLink'>";
							echo "</audio><br><hr>";
							//post content
							echo"<p>";
							echo contentByArticleId($p);
							echo"</p><br>";
							//post date
							echo"<p>";
							echo dateByArticleId($p);
							echo"</p><br>";
							echo"<form action = 'main.php' method = 'post'>";
							echo"<input type = 'submit' name = 'commentSubmit' value = 'comment'>";
							$userId = $_SESSION['userId'];
							echo"<input hidden type = 'text' name = 'userId' value = '$userId'>";
							echo"<input hidden type = 'text' name = 'articleId' value = '$p'>";
							echo"</form>";
							echo"</li>";
						}
					?>
				</ul>
			</div>			
		</div> 
		<!--Comment list-->
			<div id = "commentWrap">
			<ul>
			<?php
			if(isset($_POST['articleId']))
			{
				if(isset($_POST['addComment']))
				{
					$_POST['addComment'] = addSlashes($_POST['addComment']);
					addComment($_POST['articleId'],$_SESSION['userId'],$_POST['addComment']);
				}
				
				$_POST['articleId'] = addSlashes($_POST['articleId']);
				$commentId = commentIdByArticleId($_POST['articleId']);
				foreach($commentId as $p)
				{
					$comment = contentByCommentId($p);
					echo"<li>";
					echo"<p>";
					echo"$comment";
					echo"</p>";
					echo"</li>";
				}
				echo'<form action = main.php method = post>';
				echo"<input type = text name = addComment>";
				$userId = $_SESSION['userId'];
				echo"<input hidden type = text name = userId value = $userId />";
				$articleId = $_POST['articleId'];
				echo"<input hidden type = text name = articleId value = $articleId />";
				echo"<input type = submit name = add value = 'say' />";
				echo'</form>';
				
			
			}
			
			
			
			?>
			</ul>
			</div>
		</div>
		
		
	
	</div>






</body>
