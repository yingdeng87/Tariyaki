<?php
	if(isset($_POST['friendId'])&&isset($_POST['userId']))
	{	
		define('ROOT', __DIR__); 
		include ROOT . '/DB/tariyaki-DB.php';
		connectDatabase();
		$_POST['friendId'] = stripTagAddSlashes($_POST['friendId']);
		$_POST['userId'] = stripTagAddSlashes($_POST['userId']);
		$friendFirstName = firstNameByUserId($_POST['friendId']);
		$friendFamilyName = familyNameByUserId($_POST['friendId']);
		echo $_POST['userId'];
		if(isset($_POST['friendChoice']))
		{
		if($_POST['friendChoice']==1)
		{
			addFriend($_POST['friendId'], $_POST['userId'], $friendFirstName, $friendFamilyName);
		}
		else if($_POST['friendChoice']==0)
		{
			deleteFriendByUserId($_POST['friendId']);
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
						
					?>
				</ul>
			</div>			
		</div> 
		<!--Comment list-->
			<div id = "commentWrap">
			
			</div>
		</div>
		
		
	
	</div>






</body>
