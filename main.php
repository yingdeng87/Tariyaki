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
</head>

<body>

	<!-- Top wrap include thumb photo, logo, searching bar and log out button-->

	<h1 id = "logo">Tariyaki</h1>
	<div id="topWrap">
		<!--logo-->
		<div id = "logoArea">
			<h2 id = "thumb">
			<?php
		
				echo '<img height = 60px src="data:image/jpg;base64,'.base64_encode(profileByUserId(2)).'"><br>';
			?>

			<h2>
		</div>
		<div id ="bioBlock">
			<p id = "bio">
			<?php
			echo firstNameByUserId(2).":";
			echo userInfoByUserId(2)."</br>";
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
				echo"<ul>";
				while($row = mysql_fetch_array($arr,MYSQL_NUM))
				{
					$i=1;
					echo '<li>';echo '<img height = 20px src="data:image/jpg;base64,'.base64_encode(profileByUserId(2)).'">';
					echo "<a href>";
					foreach($row as $p)
					{
						if($i==3||$i==4)
							echo $p." ";
						$i++;
					}
					echo "</a></li><br>";
				}
				echo"</ul>";
			//}
			?>
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
			
			</div>			
		</div> 
		<!--Comment list-->
			<div id = "commentWrap">
			
			</div>
		</div>
		
		
	
	</div>






</body>
