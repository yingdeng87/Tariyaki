<?php
	if(isset($_POST['friendId'])&&isset($_POST['userId']))
	{	
		define('ROOT', __DIR__); 
		include ROOT . '/DB/tariyaki-DB.php';
		connectDatabase();
		$friendArr = findAllUserId();
		
		if(!in_array($_POST['friendId'],$friendArr))
		{
			echo "<script type='text/Javascript'>
			location.href='main.php';
			alert('user does not exist, need to login');
			</script>";
			
		}
		
		$_POST['friendId'] = stripTagAddSlashes($_POST['friendId']);
		$_POST['userId'] = stripTagAddSlashes($_POST['userId']);
		$friendFirstName = firstNameByUserId($_POST['friendId']);
		$friendFamilyName = familyNameByUserId($_POST['friendId']);

		if(isset($_POST['friendChoice']))
		{
		if($_POST['friendChoice']==1)
		{
			addFriend($_POST['friendId'], $_POST['userId'], $friendFirstName, $friendFamilyName);
			echo "<script>alert('you guys are friends now')</script>";
		}
		else if($_POST['friendChoice']==0)
		{
			deleteFriendByUserId($_POST['friendId']);
			echo "<script>alert('you guys are no longer friends')</script>";
			
		}
		}
		
		session_start();
		$_SESSION['userId'] = $_POST['friendId'];

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
		
				echo '<img height = 60px src="data:image/jpg;base64,'.base64_encode(profileByUserId($_SESSION['userId'])).'"><br>';
			?>

			<h2>
		</div>
		<div id ="bioBlock">
			<p id = "bio">
			<?php
			echo firstNameByUserId($_SESSION['userId']).":";
			echo userInfoByUserId($_SESSION['userId'])."</br>";
			$arr=resOfSpecialtyByUserId($userId);
			
			while($row = mysql_fetch_array($arr,MYSQL_NUM))
			{
				$i=1;
				//foreach($row = );
				/*SouthEastAsian`, `Country`, `SKA`, `EastAsian`, `Blues`, `ModemFolk`, `HipPop`, `African`, 
				`Electronic`, `Jazz`, `Classic`, `Inspirational`, `Pop`, `Rock`, `Opera`, `RB`, `Industrial`, `ChineseOpera`, `HeavyMetal`*/
				foreach($row as $p)
				{
					if($i==2)
					{
						if($p==1)
						echo 'SouthEastAsian ';
					}
					else if($i==3)
					{
						if($p==1)
						echo 'Country ';
					}
					else if($i==4)
					{
						if($p==1)
						echo 'SKA ';
					}
					else if($i==5)
					{
						if($p==1)
						echo 'EastAsian ';
					}
					else if($i==6)
					{
						if($p==1)
						echo 'Blues ';
					}
					else if($i==7)
					{
						if($p==1)
						echo 'ModemFolk ';
					}
					else if($i==8)
					{
						if($p==1)
						echo 'Hiphop ';
					}
					else if($i==9)
					{
						if($p==1)
						echo 'African ';
					}
					else if($i==10)
					{
						if($p==1)
						echo 'Electronic ';
					}
					else if($i==11)
					{
						if($p==1)
						echo 'jazz';
					}
					else if($i==12)
					{
						if($p==1)
						echo 'Classic ';
					}
					else if($i==13)
					{
						if($p==1)
						echo 'inspirational ';
					}
					else if($i==14)
					{
						if($p==1)
						echo 'Pop ';
					}
					else if($i==15)
					{
						if($p==1)
						echo 'Rock ';
					}
					else if($i==16)
					{
						if($p==1)
						echo 'Opera ';
					}
					else if($i==17)
					{
						if($p==1)
						echo 'R&B ';
					}
					else if($i==18)
					{
						if($p==1)
						echo 'Industrial ';
					}
					else if($i==19)
					{
						if($p==1)
						echo 'ChineseOpera ';
					}
					else if($i==20)
					{
						if($p==1)
						echo 'HeavyMetal ';
					}
					
					$i++;
				}
				echo"music";
				
				}
			?>
			</p>
		</div>
		<ul id="nav">
			<form action = main.php method = post>
            <li class="topButton"><input type=submit name = go title="go back" value="back to my page"></input></li>
			<input hidden type =text name = userId value = <?php echo $_POST['userId']?> />
			</form>
			<form action = login.php method = post>
			<li class="topButton"><input type=submit title="logout" name = logout value="logout"></input></li>
			</form>
			<form action='friend.php' method='post'>
			<?php
			$friendArr = friendIdByUserId($_POST['userId']);
			if(in_array($_POST['friendId'],$friendArr))
			{
				echo "<li class='topButton'><input type='submit' title='deleteFriend' value='ignore'>";
				echo "<input hidden type = text name = friendChoice value = 0 />";
			}
			else
			{
				echo "<li class='topButton'><input type='submit' title='addFriend' value='favourite'>";
				echo "<input hidden type = text name = friendChoice value = 1 />";
			}
			
			
			?>
			<input hidden type = text name = friendId value = <?php echo $_POST['friendId']?> />
			<input hidden type = text name = userId value = <?Php echo $_POST['userId']?> />
			</li>
			</form>
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
					echo "<button>";
					echo "$friendFirstName $firendLastName";
					echo"</button>";
				
				
					
				}
				
				
			}
			?>
		</div>
		
		<!--post list wrap-->
		<div id="postWrap">
			<!-- the first item is a text area for user to input information-->
			
			
			<!--Post list-->
			<div id = "friendPostListWrap">
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
							echo"<form action = 'friend.php' method = 'post'>";
							echo"<input type = 'submit' name = 'commentSubmit' value = 'comment'>";
							$friendId = $_SESSION['userId'];
							$userId = $_POST['userId'];
							
							echo"<input hidden type = 'text' name = 'friendId' value = '$friendId'>";
							echo"<input hidden type = 'text' name = 'userId' value = '$userId'>";
							echo"<input hidden type = 'text' name = 'articleId' value = '$p'>";
							echo"</form>";
							
							echo"<form action = 'friend.php' method = 'post'>";
							echo"<input type = 'submit' name = 'share' value = 'share'>";
							echo"<input hidden type = 'text' name = 'friendId' value = '$friendId'>";
							echo"<input hidden type = 'text' name = 'userId' value = '$userId'>";
							echo"<input hidden type = 'text' name = 'articleId' value = '$p'>";
							echo"</form>";
							echo"</li>";
							
						}
							if(isset($_POST['share']))
							{
								$_POST['articleId']=stripTagAddSlashes($_POST['articleId']);

								$title = titleByArticleId($_POST['articleId']);
								$title = $title." (from"." ".firstNameByUserId($_SESSION['userId'])." ".familyNameByUserId($_SESSION['userId']).")";						
								$content = contentByArticleId($_POST['articleId']);
								$musicId=musicIdByArticleId($_POST['articleId']);
								addArticle($userId, $musicId, 'null', 'null', $title, $content);
								echo "<script>alert('shared')</script>";
							}
					
					?>
				</ul>
			</div>			
		</div> 
		<!--Comment list-->
			<div id = "commentWrap">
			<?php
			if(isset($_POST['articleId']))
			{
				if(isset($_POST['addComment']))
				{
					$_POST['addComment'] = stripTagAddSlashes($_POST['addComment']);
					addComment($_POST['articleId'],$_SESSION['userId'],$_POST['addComment']);
				}
				
				$_POST['articleId'] = stripTagAddSlashes($_POST['articleId']);
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
				echo'<form action = friend.php method = post>';
				echo"<input type = text name = addComment>";
				$userId = $_POST['userId'];
				$friendId = $_SESSION['userId'];

				echo"<input hidden type = text name = userId value = $userId />";
				echo"<input hidden type = text name = friendId value = $friendId />";
				$articleId = $_POST['articleId'];
				echo"<input hidden type = text name = articleId value = $articleId />";
				echo"<input type = submit name = add value = 'say' />";
				echo'</form>';
				
			
			}
			
			
			
			?>
			</div>
		</div>
		
		
	
	</div>






</body>
