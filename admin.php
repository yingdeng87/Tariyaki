<?php
	define('ROOT', __DIR__); 
	include ROOT . '/DB/tariyaki-DB.php';
	
	 if(isset($_POST['user'])&&isset($_POST['pass1']))
	{
		
		
		$_POST['user']=stripTagAddSlashes($_POST['user']);
		$_POST['pass1']=stripTagAddSlashes($_POST['pass1']);
		
		connectDatabase();
		session_start();
		
		if(adminIdByAdminNameAndPassword($_POST['user'], sha1($_POST['pass1']))==null)
		{
			$url="signup.php"; 
			echo "<script type='text/Javascript'>alert('invalid username or password');location.href='adminLogin.php';</script>"; 
		}
		
		
	}
	else
	{
		if(!isset($_POST['userId']))
		{
			$url="signup.php"; 
			echo "<script type='text/Javascript'>location.href='adminLogin.php';</script>"; 
		}
		
	}
	
?>
<!DOCTYPE html>
<html>
	<head>
		<title>
		admin
		</title>
		<meta charset = "utf-8"/>
		<meta name="author" content="Bolun Zhang, Siyu Liu, Ying Deng">
		<meta name="keywords" content="admin">
		<meta name="generator" content="Notepad++">
		<link  rel = "stylesheet" type="text/css" href="css/main.css">
	</head>
	<body>
		<!--Content wrap include friend list post list and comment list-->
	<div id = "contentWrap">
		<!--friend list-->
		<div id= "friendListWrap">
		<?php
			if(isset($_POST['deleteUser']))
					{
						deleteUserByUserId($_POST['userId']);
					}
			echo"<ul>";
			
			if(isset($_POST['deletePost']))
			{
				deleteArticleByArticleId($_POST['articleId']);
			}
			
			if(isset($_POST['deleteCommentButton']))
			{
				deleteCommentByCommentId($_POST['commentId']);
			}
			
				
				$arr = findAllUserId();
				foreach($arr as $p)
				{
				echo"<li>";
				$arrUser = resOfUserByUserId($p);
				
				
				while($row = mysql_fetch_array($arrUser,MYSQL_NUM))
				{
					
					$i=1;
					foreach($row as $p)
					{
						if($i==1)
							$userId = $p;
						else if($i==2)
							$firstName = $p;
						else if($i==3)
							$lastName = $p;
						else
							$firendLastName = $p;
						$i++;
					
					}
		
					//echo '<img height = 20px src="data:image/jpg;base64,'.base64_encode(profileByUserId($friendId)).'">';
					//echo "<input  type =submit name=friend value='";
					$value = "\"".$userId." ".$firstName." ".$lastName."\"";
					echo"<form action = admin.php method = post>";
					echo "<input hidden type = text name = userId value = $userId />";
					echo "<input type=submit name='check' value = $value />";
					echo"</form>";
					
					echo"<form action = admin.php method = post>";
					echo "<input hidden type = text name = userId value = $userId />";
					echo "<input type=submit name='deleteUserButton' value = 'delete' />";
					echo "<input hidden type = text name = 'deleteUser' value = 1 />";
					echo"</form>";
					
					echo"<form action = admin.php method = post>";
					echo "<input hidden type = text name = userId value = $userId />";
					echo "<input type=submit name='checkComment' value = 'postList' />";
					echo"</form>";
					
					
					
					//echo"'>";
					//echo "<input hidden type = text name = friendId value = $friendId>";
					//$userId = $_SESSION['userId'];
					//echo "<input hidden type = text name = userId value = $userId>";
					//echo"</form>";
					echo"</li>";
				}
				
				}
			echo"</ul>";
			?>
		</div>
		
		<!--post list wrap-->
		<div id="postWrap">

			
			
			<!--Post list-->
			<div id = "postListWrap">
				<ul>
					<?php
					if(isset($_POST['userId']))
					{
						
						$arr=articleIdByUserId($_POST['userId']);
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
							echo"<form action = 'admin.php' method = 'post'>";
							echo"<input type = 'submit' name = 'deletePost' value = 'delete'>";
							
							echo"<input hidden type = 'text' name = 'commentCheck' value = 1>";
							$userId = $_POST['userId'];
							echo"<input hidden type = 'text' name = 'userId' value = '$userId'>";
							echo"<input hidden type = 'text' name = 'articleId' value = '$p'>";
							echo"</form>";
							
							echo"<form action = 'admin.php' method = 'post'>";
							echo"<input type = 'submit' name = 'commentButton' value = 'comment'>";
							
							echo"<input hidden type = 'text' name = 'commentCheck' value = 1>";
							$userId = $_POST['userId'];
							echo"<input hidden type = 'text' name = 'userId' value = '$userId'>";
							echo"<input hidden type = 'text' name = 'articleId' value = '$p'>";
							echo"</form>";
							
							echo"</li>";
						}
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
			
				
				$_POST['articleId'] = stripTagAddSlashes($_POST['articleId']);
				$commentId = commentIdByArticleId($_POST['articleId']);
				foreach($commentId as $p)
				{
					$comment = contentByCommentId($p);
					echo"<li>";
					echo"<p>";
					echo"$comment";
					echo"</p>";
					echo'<form action = admin.php method = post>';
					$userId = $_POST['userId'];
					echo"<input hidden type = text name = userId value = $userId />";
					$articleId = $_POST['articleId'];
					echo"<input hidden type = text name = articleId value = $articleId />";
					echo"<input hidden type = text name = commentId value = $p />";
					echo"<input type = submit name = deleteCommentButton value = 'delete' />";
					echo'</form>';
					
					echo"</li>";
				}
				
				
			
			}
			
			
			
			?>
			</ul>
			</div>
		</div>
		
		
	
	</div>
	
	</body>

</html>