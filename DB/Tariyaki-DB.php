<?php
    $gl_dbhost="localhost";
	$gl_user="kakashi";
    $gl_pass="123qwe";
	$db="tariyaki";
	function connectDatabase()
	{
		global $gl_dbhost, $gl_user, $gl_pass, $db;
		if(!$linkid=mysql_connect($gl_dbhost,$gl_user,$gl_pass))
		{
			echo $gl_dbhost;
			echo $gl_user;
			echo $gl_pass;
			echo $db;
			echo "Can not connect database";
			exit;
		}
		else
		{
			//echo "database connection succeed" . "</br>";
		}
		return $linkid;
	}
	function addUser($firstName, $familyName,  $dob, $userInfo, $profile, $email, $username, $psw)
	{
	    global $db;
		$lkid = connectDatabase();
		if (! $succ = mysql_select_db($db)) 
		{
		    echo mysql_error();
			exit;
		}
		//$size = filesize($profile);
		//$img=addslashes(fread(fopen($profile, "r"), $size));
		$img = $profile;

		$sql = "insert into user(firstName, familyName, dob, userInfo, profile, email) values ('" . $firstName . "', '" . $familyName . "', '" . $dob . "', '" . $userInfo . "', '" . $img . "', '" . $email . "' );"; 
		if (!$res=mysql_query($sql, $lkid)) 
		{
			echo mysql_error(). " : line34 " . "</br>";
		}
		$id = mysql_insert_id($lkid);
		addLogin($id, $username, $psw);
		//mysql_close($lkid);
	}
	function addLogin($userId, $username, $psw)
	{
	    global $db;
		$lkid=connectDatabase();
		if (! $succ = mysql_select_db($db)) 
		{
		    echo mysql_error();
			exit;
		}
		$sql = "insert into login(userId, userName, password) values (" . $userId . ", '" . $username . "', '" . $psw . "' );"; 
		if (! $res=mysql_query($sql, $lkid)) 
		{
			echo mysql_error(). " : line52 " . "</br>";
		}
		mysql_close($lkid);
	}
	function addPicture($userId, $picture)
	{
	    global $db;
		$lkid=connectDatabase();
		if (! $succ = mysql_select_db($db)) 
		{
		    echo mysql_error();
			exit;
		}
		$size = filesize($picture);
		$img=addslashes(fread(fopen($picture, "r"), $size));
		$sql = "insert into picture(userId, picture) values (" . $userId . ", '" . $img . "' );"; 
		if (! $res=mysql_query($sql, $lkid)) 
		{
			echo mysql_error(). " : line70 " . "</br>";
		}
		$id = mysql_insert_id($lkid); 
		mysql_close($lkid);
		return $id;
	}
	function addMusic($userId, $name, $link)
	{
	    global $db;
		$lkid=connectDatabase();
		if (! $succ = mysql_select_db($db)) 
		{
		    echo mysql_error();
			exit;
		}
		$sql = "insert into music(userId, name, link) values (" . $userId . ", '" . $name . "', '" . $link . "' );"; 
		if (! $res=mysql_query($sql, $lkid)) 
		{
			echo mysql_error(). " : line88 " . "</br>";
		}
		$id = mysql_insert_id($lkid);
		mysql_close($lkid);
		return $id;
	}
	function addVideo($userId, $name, $link)
	{
	    global $db;
		$lkid=connectDatabase();
		if (! $succ = mysql_select_db($db)) 
		{
		    echo mysql_error();
			exit;
		}
		$sql = "insert into video(userId, name, link) values (" . $userId . ", '" . $name . "', '" . $link . "' );"; 
		if (! $res=mysql_query($sql, $lkid)) 
		{
			echo mysql_error(). " : line106 " . "</br>";
		}
		$id = mysql_insert_id($lkid);
		mysql_close($lkid);
		return $id;
	}
	function addSpecialty($userId, $SouthEastAsian, $Country, $SKA, $EastAsian, $Blues, $ModemFolk, 
	$HipPop, $African, $Electronic, $Jazz, $Classic, $Inspirational, $Pop, $Rock, $Opera, $RB, 
	$Industrial, $ChineseOpera, $HeavyMetal)
	{
	    global $db;
		$lkid=connectDatabase();
		if (! $succ = mysql_select_db($db)) 
		{
		    echo mysql_error();
			exit;
		}
		$sql = "insert into specialty(userId, SouthEastAsian, Country, SKA, EastAsian, 
		Blues, ModemFolk, HipPop, African, Electronic, Jazz, Classic, Inspirational, 
		Pop, Rock, Opera, RB, Industrial, ChineseOpera, HeavyMetal) values (" . $userId . ", " . $SouthEastAsian . ", 
		" . $Country . ", " . $SKA . ", " . $EastAsian . ", " . $Blues . ", " . $ModemFolk . ", " . 
		$HipPop . ", " . $African . ", " . $Electronic . ", " . $Jazz . ", " . $Classic . ", " .
		$Inspirational . ", " . $Pop . ", " . $Rock . ", " . $Opera . ", " . $RB . ", " . $Industrial . 
		", " . $ChineseOpera . ", " . $HeavyMetal . " );"; 
		if (! $res=mysql_query($sql, $lkid)) 
		{
			echo mysql_error(). " : line132 " . "</br>";
		}
		mysql_close($lkid);
	}
	function addFriend($friendId, $userId, $friendFirstName, $friendFamilyName)
	{
	    global $db;
		$lkid=connectDatabase();
		if (! $succ = mysql_select_db($db)) 
		{
		    echo mysql_error();
			exit;
		}
		$sql = "insert into friends(friendId, userId, friendFirstName, friendFamilyName) values (" . $friendId . ", " . $userId . ", '" . $friendFirstName . "', '" . $friendFamilyName . "' );"; 
		if (! $res=mysql_query($sql, $lkid)) 
		{
			echo mysql_error(). " : line148 " . "</br>";
		}
		mysql_close($lkid);
	}
	function addArticle($userId, $musicId, $videoId, $pictureId, $title, $content)
	{
	    global $db;
		$lkid=connectDatabase();
		if (! $succ = mysql_select_db($db)) 
		{
		    echo mysql_error();
			exit;
		}
		$sql = "insert into article(userId, musicId, videoId, pictureId, title, content, date) 
		values (" . $userId . ", " . $musicId . ", " . $videoId . ", " . $pictureId . ", '"
        . $title . "', '" . $content . "', now());"; 
		if (! $res=mysql_query($sql, $lkid)) 
		{
			echo mysql_error(). " : line166 " . "</br>";
		}
		$id = mysql_insert_id($lkid);
		mysql_close($lkid);
		return $id;
	}
	function addComment($articleId, $userId, $content)
	{
	    global $db;
		$lkid=connectDatabase();
		if (! $succ = mysql_select_db($db)) 
		{
		    echo mysql_error();
			exit;
		}
		$sql = "insert into comments(articleId, userId,content, date) 
		values (" . $articleId. ", " . $userId . ", '" . $content . "', now());"; 
		if (! $res=mysql_query($sql, $lkid)) 
		{
			echo mysql_error(). " : line191 " . "</br>";
		}
		$id = mysql_insert_id($lkid);
		mysql_close($lkid);
		return $id;
	}
	function numOfUserName($userName)
	{
	    global $db;
		$lkid=connectDatabase();
		if (! $succ = mysql_select_db($db))
		{
		    echo mysql_error();
			exit;
		}
		$sql = "select count(*) from login where userName='" . $userName . "';";
		if (! $res=mysql_query($sql , $lkid)) 
		{
			echo mysql_error(). " : line184  ";
		}
		$num = 0;
		while($array = mysql_fetch_row($res))
		{
			$num = $array[0];			
		}
		mysql_close($lkid);
		return $num;
	}
	function passwordByUserName($userName)
	{
	    global $db;
		$lkid=connectDatabase();
		if (! $succ = mysql_select_db($db))
		{
		    echo mysql_error();
			exit;
		}
		$sql = "select password from login where userName='" . $userName . "';";
		if (! $res=mysql_query($sql , $lkid)) 
		{
			echo mysql_error(). " : line206  ";
		}
		$un = "";
		while($array = mysql_fetch_row($res))
		{
			$un = $array[0];			
		}
		mysql_close($lkid);
		return $un;
	}
	function userIdByUserNameAndPassword($userName, $password)
	{
	    global $db;
		$lkid=connectDatabase();
		if (! $succ = mysql_select_db($db))
		{
		    echo mysql_error();
			exit;
		}
		$sql = "select userId from login where userName='" . $userName . "' and password='" . $password . "';";
		if (! $res=mysql_query($sql , $lkid)) 
		{
			echo mysql_error(). " : line228  ";
		}
		$ui = "";
		while($array = mysql_fetch_row($res))
		{
			$ui = $array[0];			
		}
		mysql_close($lkid);
		return $ui;
	}
	function resOfLogin()
	{
	    global $db;
		$lkid=connectDatabase();
		if (! $succ = mysql_select_db($db))
		{
		    echo mysql_error();
			exit;
		}
		$sql = "select * from login;";
		if (! $res=mysql_query($sql , $lkid)) 
		{
			echo mysql_error(). " : line250  ";
		}
		mysql_close($lkid);
		return $res;
	}
	function resOfLoginByUserId($userId)
	{
	    global $db;
		$lkid=connectDatabase();
		if (! $succ = mysql_select_db($db))
		{
		    echo mysql_error();
			exit;
		}
		$sql = "select * from login where userId='" . $userId . "';";
		if (! $res=mysql_query($sql , $lkid)) 
		{
			echo mysql_error(). " : line267  ";
		}
		mysql_close($lkid);
		return $res;
	}
	function firstNameByUserId($userId)
	{
	    global $db;
		$lkid=connectDatabase();
		if (! $succ = mysql_select_db($db))
		{
		    echo mysql_error();
			exit;
		}
		$sql = "select firstName from user where Id='" . $userId . "';";
		if (! $res=mysql_query($sql , $lkid)) 
		{
			echo mysql_error(). " : line284  ";
		}
		$fn = "";
		while($array = mysql_fetch_row($res))
		{
			$fn = $array[0];			
		}
		mysql_close($lkid);
		return $fn;
	}
	function familyNameByUserId($userId)
	{
	    global $db;
		$lkid=connectDatabase();
		if (! $succ = mysql_select_db($db))
		{
		    echo mysql_error();
			exit;
		}
		$sql = "select familyName from user where Id='" . $userId . "';";
		if (! $res=mysql_query($sql , $lkid)) 
		{
			echo mysql_error(). " : line306  ";
		}
		$fn = "";
		while($array = mysql_fetch_row($res))
		{
			$fn = $array[0];			
		}
		mysql_close($lkid);
		return $fn;
	}
	function dobByUserId($userId)
	{
	    global $db;
		$lkid=connectDatabase();
		if (! $succ = mysql_select_db($db))
		{
		    echo mysql_error();
			exit;
		}
		$sql = "select dob from user where Id='" . $userId . "';";
		if (! $res=mysql_query($sql , $lkid)) 
		{
			echo mysql_error(). " : line328  ";
		}
		$dob;
		while($array = mysql_fetch_row($res))
		{
			$dob = $array[0];			
		}
		mysql_close($lkid);
		return $dob;
	}
	function userInfoByUserId($userId)
	{
	    global $db;
		$lkid=connectDatabase();
		if (! $succ = mysql_select_db($db))
		{
		    echo mysql_error();
			exit;
		}
		$sql = "select userInfo from user where Id='" . $userId . "';";
		if (! $res=mysql_query($sql , $lkid)) 
		{
			echo mysql_error(). " : line350  ";
		}
		$ui="";
		while($array = mysql_fetch_row($res))
		{
			$ui = $array[0];			
		}
		mysql_close($lkid);
		return $ui;
	}
	function profileByUserId($userId)
	{
	    global $db;
		$lkid=connectDatabase();
		if (! $succ = mysql_select_db($db))
		{
		    echo mysql_error();
			exit;
		}
		$sql = "select profile from user where Id=" . $userId . ";";
		if (! $res=mysql_query($sql, $lkid)) 
		{
			echo mysql_error(). " : line372 </br>";
		}
		$image;
		while($row = mysql_fetch_array($res))
		{
		    $image = $row[0];
		}
		return $image;
	}
	function resOfUserByUserId($userId)
	{ 
	    global $db;
		$lkid=connectDatabase();
		if (! $succ = mysql_select_db($db))
		{
		    echo mysql_error();
			exit;
		}
		$sql = "select * from user where Id='" . $userId . "';";
		if (! $res=mysql_query($sql, $lkid)) 
		{
			echo mysql_error(). " : line393 </br>";
		}
		return $res;
	}
	function userIdByFirstName($firstName)
	{
	    global $db;
		$lkid=connectDatabase();
		if (! $succ = mysql_select_db($db))
		{
		    echo mysql_error();
			exit;
		}
		$sql = "select id from user where firstName='" . $firstName . "';";
		if (! $res=mysql_query($sql , $lkid)) 
		{
			echo mysql_error(). " : line409  ";
		}
		$array = Array();
		while($rows = mysql_fetch_array($res))
		{
			$array[] = $rows[0];			
		}
		mysql_close($lkid);
		return $array;
	}
	function userIdByFamilyName($familyName)
	{ 
	    global $db;
		$lkid=connectDatabase();
		if (! $succ = mysql_select_db($db))
		{
		    echo mysql_error();
			exit;
		}
		$sql = "select id from user where familyName='" . $familyName . "';";
		if (! $res=mysql_query($sql , $lkid)) 
		{
			echo mysql_error(). " : line431  ";
		}
		$array = Array();
		while($rows = mysql_fetch_array($res))
		{
			$array[] = $rows[0];			
		}
		mysql_close($lkid);
		return $array;
	}
	function fullNameByUserId($userId)
	{
	    global $db;
		$lkid=connectDatabase();
		if (! $succ = mysql_select_db($db))
		{
		    echo mysql_error();
			exit;
		}
		$sql = "select firstName, familyName from user where Id='" . $userId . "';";
		if (! $res=mysql_query($sql , $lkid)) 
		{
			echo mysql_error(). " : line453  ";
		}
		$fn = "";
		$fn1 = "";
		while($array = mysql_fetch_row($res))
		{
			$fn = $array[0];	
            $fn1 = $array[1];			
		}
		mysql_close($lkid);
		return $fn . " " . $fn1;
	}
	function articleIdByUserId($userId)
	{
	    global $db;
		$lkid=connectDatabase();
		if (! $succ = mysql_select_db($db))
		{
		    echo mysql_error();
			exit;
		}
		$sql = "select articleId from article where userId='" . $userId . "';";
		if (! $res=mysql_query($sql , $lkid)) 
		{
			echo mysql_error(). " : line477  ";
		}
		$array = Array();
		while($rows = mysql_fetch_array($res))
		{
			$array[] = $rows[0];			
		}
		mysql_close($lkid);
		return $array;
	}
	function titleByArticleId($articleId)
	{
	    global $db;
		$lkid=connectDatabase();
		if (! $succ = mysql_select_db($db))
		{
		    echo mysql_error();
			exit;
		}
		$sql = "select title from article where articleId='" . $articleId . "';";
		if (! $res=mysql_query($sql , $lkid)) 
		{
			echo mysql_error(). " : line499  ";
		}
		$title = "";
		while($array = mysql_fetch_row($res))
		{
			$title = $array[0];				
		}
		mysql_close($lkid);
		return $title;
	}
	function contentByArticleId($articleId)
	{
	    global $db;
		$lkid=connectDatabase();
		if (! $succ = mysql_select_db($db))
		{
		    echo mysql_error();
			exit;
		}
		$sql = "select content from article where articleId='" . $articleId . "';";
		if (! $res=mysql_query($sql , $lkid)) 
		{
			echo mysql_error(). " : line521  ";
		}
		$content = "";
		while($array = mysql_fetch_row($res))
		{
			$content = $array[0];				
		}
		mysql_close($lkid);
		return $content;
	}
	function dateByArticleId($articleId)
	{
	    global $db;
		$lkid=connectDatabase();
		if (! $succ = mysql_select_db($db))
		{
		    echo mysql_error();
			exit;
		}
		$sql = "select date from article where articleId='" . $articleId . "';";
		if (! $res=mysql_query($sql , $lkid)) 
		{
			echo mysql_error(). " : line543  ";
		}
		$date = "";
		while($array = mysql_fetch_row($res))
		{
			$date = $array[0];				
		}
		mysql_close($lkid);
		return $date;
	}
	function musicIdByArticleId($articleId)
	{
	    global $db;
		$lkid=connectDatabase();
		if (! $succ = mysql_select_db($db))
		{
		    echo mysql_error();
			exit;
		}
		$sql = "select musicId from article where articleId='" . $articleId . "';";
		if (! $res=mysql_query($sql , $lkid)) 
		{
			echo mysql_error(). " : line565  ";
		}
		$musicId = 0;
		while($array = mysql_fetch_row($res))
		{
			$musicId = $array[0];				
		}
		mysql_close($lkid);
		return $musicId;
	}
	function videoIdByArticleId($articleId)
	{
	    global $db;
		$lkid=connectDatabase();
		if (! $succ = mysql_select_db($db))
		{
		    echo mysql_error();
			exit;
		}
		$sql = "select videoId from article where articleId='" . $articleId . "';";
		if (! $res=mysql_query($sql , $lkid)) 
		{
			echo mysql_error(). " : line587  ";
		}
		$videoId = 0;
		while($array = mysql_fetch_row($res))
		{
			$videoId = $array[0];				
		}
		mysql_close($lkid);
		return $videoId;
	}
	function pictureIdByArticleId($articleId)
	{
	    global $db;
		$lkid=connectDatabase();
		if (! $succ = mysql_select_db($db))
		{
		    echo mysql_error();
			exit;
		}
		$sql = "select pictureId from article where articleId='" . $articleId . "';";
		if (! $res=mysql_query($sql , $lkid)) 
		{
			echo mysql_error(). " : line609  ";
		}
		$pictureId = 0;
		while($array = mysql_fetch_row($res))
		{
			$pictureId = $array[0];				
		}
		mysql_close($lkid);
		return $pictureId;
	}
	function arrayOfArticleByArticleId($articleId)
	{
	     global $db;
		$lkid=connectDatabase();
		if (! $succ = mysql_select_db($db))
		{
		    echo mysql_error();
			exit;
		}
		$sql = "select * from article where articleId='" . $articleId . "';";
		if (! $res=mysql_query($sql , $lkid)) 
		{
			echo mysql_error(). " : line631  ";
		}
		$array=Array();
		while($rows = mysql_fetch_array($res))
		{
			$array["articleId"] = $rows[0];	
            $array["userId"] = $rows[1];	
            $array["musicId"] = $rows[2];	
            $array["videoId"] = $rows[3];	
            $array["pictureId"] = $rows[4];		
            $array["title"] = $rows[5];	
            $array["content"] = $rows[6];
            $array["date"] = $rows[7];			
		}
		mysql_close($lkid);
		return $array;
	}
	function commentIdByArticleId($articleId)
	{
	    global $db;
		$lkid=connectDatabase();
		if (! $succ = mysql_select_db($db))
		{
		    echo mysql_error();
			exit;
		}
		$sql = "select commentId from comments where articleId='" . $articleId . "' order by date desc;";
		if (! $res=mysql_query($sql , $lkid)) 
		{
			echo mysql_error(). " : line660  ";
		}
		$cid = Array();
		while($array = mysql_fetch_row($res))
		{
			$cid[] = $array[0];				
		}
		mysql_close($lkid);
		return $cid;
	}
	function userIdByCommentId($commentId)
	{
	    global $db;
		$lkid=connectDatabase();
		if (! $succ = mysql_select_db($db))
		{
		    echo mysql_error();
			exit;
		}
		$sql = "select userId from comments where commentId='" . $commentId . "';";
		if (! $res=mysql_query($sql , $lkid)) 
		{
			echo mysql_error(). " : line682  ";
		}
		$uid = 0;
		while($array = mysql_fetch_row($res))
		{
			$uid = $array[0];				
		}
		mysql_close($lkid);
		return $uid;
	}
	function contentByCommentId($commentId)
	{
	    global $db;
		$lkid=connectDatabase();
		if (! $succ = mysql_select_db($db))
		{
		    echo mysql_error();
			exit;
		}
		$sql = "select content from comments where commentId='" . $commentId . "';";
		if (! $res=mysql_query($sql , $lkid)) 
		{
			echo mysql_error(). " : line704  ";
		}
		$content = "";
		while($array = mysql_fetch_row($res))
		{
			$content = $array[0];				
		}
		mysql_close($lkid);
		return $content;
	}
	function dateByCommnetId($commentId)
	{
	    global $db;
		$lkid=connectDatabase();
		if (! $succ = mysql_select_db($db))
		{
		    echo mysql_error();
			exit;
		}
		$sql = "select date from comments where commentId='" . $commentId . "';";
		if (! $res=mysql_query($sql , $lkid)) 
		{
			echo mysql_error(). " : line726  ";
		}
		$date;
		while($array = mysql_fetch_row($res))
		{
			$date = $array[0];				
		}
		mysql_close($lkid);
		return $date;
	}
	function resOfCommentByCommentId($commentId)
	{
	     global $db;
		$lkid=connectDatabase();
		if (! $succ = mysql_select_db($db))
		{
		    echo mysql_error();
			exit;
		}
		$sql = "select * from comments where commentId='" . $commentId . "';";
		if (! $res=mysql_query($sql , $lkid)) 
		{
			echo mysql_error(). " : line748  ";
		}
		mysql_close($lkid);
		return $res;
	}
	function friendIdByUserId($userId)
	{
	    global $db;
		$lkid=connectDatabase();
		if (! $succ = mysql_select_db($db))
		{
		    echo mysql_error();
			exit;
		}
		$sql = "select friendId from friends where userId='" . $userId . "';";
		if (! $res=mysql_query($sql , $lkid)) 
		{
			echo mysql_error(). " : line765  ";
		}
		$fid = Array();
		while($array = mysql_fetch_row($res))
		{
			$fid[] = $array[0];				
		}
		mysql_close($lkid);
		return $fid;
	}
	function friendFirstNameByFriendId($friendId)
	{
	    global $db;
		$lkid=connectDatabase();
		if (! $succ = mysql_select_db($db))
		{
		    echo mysql_error();
			exit;
		}
		$sql = "select firstName from user where Id='" . $friendId . "';";
		if (! $res=mysql_query($sql , $lkid)) 
		{
			echo mysql_error(). " : line787  ";
		}
		$fn = "";
		while($array = mysql_fetch_row($res))
		{
			$fn = $array[0];				
		}
		mysql_close($lkid);
		return $fn;
	}
	function friendFamilyNameByFriendId($friendId)
	{
	    global $db;
		$lkid=connectDatabase();
		if (! $succ = mysql_select_db($db))
		{
		    echo mysql_error();
			exit;
		}
		$sql = "select familyName from user where Id='" . $friendId . "';";
		if (! $res=mysql_query($sql , $lkid)) 
		{
			echo mysql_error(). " : line809  ";
		}
		$fn = "";
		while($array = mysql_fetch_row($res))
		{
			$fn = $array[0];				
		}
		mysql_close($lkid);
		return $fn;
	}
	function resOfFriendByUserId($userId)//return an array of friends' infor
	{
	    global $db;
		$lkid=connectDatabase();
		if (! $succ = mysql_select_db($db))
		{
		    echo mysql_error();
			exit;
		}
		$sql = "select * from friends where userId='" . $userId . "';";
		if (! $res=mysql_query($sql , $lkid)) 
		{
			echo mysql_error(). " : line831  ";
		}
		mysql_close($lkid);
		return $res;
	}
	function musicIdByUserId($userId)//return an array of music id
	{
	    global $db;
		$lkid=connectDatabase();
		if (! $succ = mysql_select_db($db))
		{
		    echo mysql_error();
			exit;
		}
		$sql = "select musicId from music where userId='" . $userId . "';";
		if (! $res=mysql_query($sql , $lkid)) 
		{
			echo mysql_error(). " : line848  ";
		}
		$music = Array();
		while($array = mysql_fetch_row($res))
		{
			$music[] = $array[0];				
		}
		mysql_close($lkid);
		return $music;
	}
	function musicNameByMusicId($musicId)
	{
	    global $db;
		$lkid=connectDatabase();
		if (! $succ = mysql_select_db($db))
		{
		    echo mysql_error();
			exit;
		}
		$sql = "select name from music where musicId='" . $musicId . "';";
		if (! $res=mysql_query($sql , $lkid)) 
		{
			echo mysql_error(). " : line870  ";
		}
		$name="";
		while($array = mysql_fetch_row($res))
		{
			$name = $array[0];				
		}
		mysql_close($lkid);
		return $name;
	}
	function musicLinkByMusicId($musicId)
	{
	    global $db;
		$lkid=connectDatabase();
		if (! $succ = mysql_select_db($db))
		{
		    echo mysql_error();
			exit;
		}
		$sql = "select link from music where musicId='" . $musicId . "';";
		if (! $res=mysql_query($sql , $lkid)) 
		{
			echo mysql_error(). " : line892  ";
		}
		$link="";
		while($array = mysql_fetch_row($res))
		{
			$link = $array[0];				
		}
		mysql_close($lkid);
		return $link;
	}
	function resOfMusicByMusicId($musicId)
	{
	    global $db;
		$lkid=connectDatabase();
		if (! $succ = mysql_select_db($db))
		{
		    echo mysql_error();
			exit;
		}
		$sql = "select * from music where musicId='" . $musicId . "';";
		if (! $res=mysql_query($sql , $lkid)) 
		{
			echo mysql_error(). " : line914  ";
		}
		mysql_close($lkid);
		return $res;
	}
	function videoIdByUserId($userId)//return an array of video id
	{
	    global $db;
		$lkid=connectDatabase();
		if (! $succ = mysql_select_db($db))
		{
		    echo mysql_error();
			exit;
		}
		$sql = "select videoId from video where userId='" . $userId . "';";
		if (! $res=mysql_query($sql , $lkid)) 
		{
			echo mysql_error(). " : line931  ";
		}
		$video = Array();
		while($array = mysql_fetch_row($res))
		{
			$video[] = $array[0];				
		}
		mysql_close($lkid);
		return $video;
	}
	function videoNameByVideoId($videoId)
	{
	    global $db;
		$lkid=connectDatabase();
		if (! $succ = mysql_select_db($db))
		{
		    echo mysql_error();
			exit;
		}
		$sql = "select name from video where videoId='" . $videoId . "';";
		if (! $res=mysql_query($sql , $lkid)) 
		{
			echo mysql_error(). " : line953  ";
		}
		$name="";
		while($array = mysql_fetch_row($res))
		{
			$name = $array[0];				
		}
		mysql_close($lkid);
		return $name;
	}
	function videoLinkByVideoId($videoId)
	{
	    global $db;
		$lkid=connectDatabase();
		if (! $succ = mysql_select_db($db))
		{
		    echo mysql_error();
			exit;
		}
		$sql = "select link from video where videoId='" . $videoId . "';";
		if (! $res=mysql_query($sql , $lkid)) 
		{
			echo mysql_error(). " : line975  ";
		}
		$link="";
		while($array = mysql_fetch_row($res))
		{
			$link = $array[0];				
		}
		mysql_close($lkid);
		return $link;
	}
	function resOfVideoByVideoId($videoId)
	{
	    global $db;
		$lkid=connectDatabase();
		if (! $succ = mysql_select_db($db))
		{
		    echo mysql_error();
			exit;
		}
		$sql = "select * from video where videoId='" . $videoId . "';";
		if (! $res=mysql_query($sql , $lkid)) 
		{
			echo mysql_error(). " : line997  ";
		}
		mysql_close($lkid);
		return $res;
	}
	function pictureIdByUserId($userId)
	{
	    global $db;
		$lkid=connectDatabase();
		if (! $succ = mysql_select_db($db))
		{
		    echo mysql_error();
			exit;
		}
		$sql = "select pictureId from picture where userId='" . $userId . "';";
		if (! $res=mysql_query($sql , $lkid)) 
		{
			echo mysql_error(). " : line1014  ";
		}
		$pid=Array();
		while($array = mysql_fetch_row($res))
		{
			$pid[] = $array[0];				
		}
		mysql_close($lkid);
		return $pid;
	}
	function pictureByPictureId($pictureId)
	{
	    global $db;
		$lkid=connectDatabase();
		if (! $succ = mysql_select_db($db))
		{
		    echo mysql_error();
			exit;
		}
		$sql = "select picture from picture where pictureId='" . $pictureId . "';";
		if (! $res=mysql_query($sql , $lkid)) 
		{
			echo mysql_error(). " : line1036  ";
		}
		$picture="";
		while($array = mysql_fetch_row($res))
		{
			$picture = $array[0];				
		}
		mysql_close($lkid);
		return $picture;
	}
	function resOfPictureByPictureId($pictureId)
	{
	    global $db;
		$lkid=connectDatabase();
		if (! $succ = mysql_select_db($db))
		{
		    echo mysql_error();
			exit;
		}
		$sql = "select * from picture where pictureId='" . $pictureId . "';";
		if (! $res=mysql_query($sql , $lkid)) 
		{
			echo mysql_error(). " : line1058  ";
		}
		mysql_close($lkid);
		return $res;
	}
	function updateArticleContentByArticleId($articleId, $content)
	{
	    global $db;
		$lkid=connectDatabase();
		if (! $succ = mysql_select_db($db))
		{
		    echo mysql_error();
			exit;
		}
		$sql="update article set content='" . $content . "' where articleId=" . $articleId . ";";
		if (! $res=mysql_query($sql , $lkid)) 
		{
			echo mysql_error(). " : line1075  ";
		}
		mysql_close($lkid);
	}
	function updateArticleTitleByArticleId($articleId, $title)
	{
	    global $db;
		$lkid=connectDatabase();
		if (! $succ = mysql_select_db($db))
		{
		    echo mysql_error();
			exit;
		}
		$sql="update article set title='" . $title . "' where articleId=" . $articleId . ";";
		if (! $res=mysql_query($sql , $lkid)) 
		{
			echo mysql_error(). " : line1091  ";
		}
		mysql_close($lkid);
	}
	function updateArticleDateByArticleId($articleId)
	{
	    global $db;
		$lkid=connectDatabase();
		if (! $succ = mysql_select_db($db))
		{
		    echo mysql_error();
			exit;
		}
		$sql="update article set date=now() where articleId=" . $articleId . ";";
		if (! $res=mysql_query($sql , $lkid)) 
		{
			echo mysql_error(). " : line1107  ";
		}
		mysql_close($lkid);
	}
	function updateArticleMusicByArticleId($articleId, $musicId)
	{
	    global $db;
		$lkid=connectDatabase();
		if (! $succ = mysql_select_db($db))
		{
		    echo mysql_error();
			exit;
		}
		$sql="update article set musicId=" . $musicId . " where articleId=" . $articleId . ";";
		if (! $res=mysql_query($sql , $lkid)) 
		{
			echo mysql_error(). " : line1123  ";
		}
		mysql_close($lkid);
	}
	function updateArticleVideoByArticleId($articleId, $videoId)
	{
	    global $db;
		$lkid=connectDatabase();
		if (! $succ = mysql_select_db($db))
		{
		    echo mysql_error();
			exit;
		}
		$sql="update article set videoId=" . $videoId . " where articleId=" . $articleId . ";";
		if (! $res=mysql_query($sql , $lkid)) 
		{
			echo mysql_error(). " : line1139  ";
		}
		mysql_close($lkid);
	}
	function updateArticlePictureByArticleId($articleId, $pictureId)
	{
	    global $db;
		$lkid=connectDatabase();
		if (! $succ = mysql_select_db($db))
		{
		    echo mysql_error();
			exit;
		}
		$sql="update article set pictureId=" . $pictureId . " where articleId=" . $articleId . ";";
		if (! $res=mysql_query($sql , $lkid)) 
		{
			echo mysql_error(). " : line1155  ";
		}
		mysql_close($lkid);
	}
	function updateUserInfoByUserId($userId, $userInfo)
	{
	    global $db;
		$lkid=connectDatabase();
		if (! $succ = mysql_select_db($db))
		{
		    echo mysql_error();
			exit;
		}
		$sql="update user set userInfo='" . $userInfo . "' where Id=" . $userId . ";";
		if (! $res=mysql_query($sql , $lkid)) 
		{
			echo mysql_error(). " : line1171  ";
		}
		mysql_close($lkid);
	}
	function updateUserEmailByUserId($userId, $email)
	{
	    global $db;
		$lkid=connectDatabase();
		if (! $succ = mysql_select_db($db))
		{
		    echo mysql_error();
			exit;
		}
		$sql="update user set email='" . $email . "' where Id=" . $userId . ";";
		if (! $res=mysql_query($sql , $lkid)) 
		{
			echo mysql_error(). " : line1187  ";
		}
		mysql_close($lkid);
	}
	function resOfSpecialtyByUserId($userId)
	{
	    global $db;
		$lkid=connectDatabase();
		if (! $succ = mysql_select_db($db))
		{
		    echo mysql_error();
			exit;
		}
		$sql="select * from specialty where userId=" . $userId . ";";
		if (! $res=mysql_query($sql , $lkid)) 
		{
			echo mysql_error(). " : line1203  ";
		}
		mysql_close($lkid);
		return $res;
	}
	function deleteCommentByUserId($userId)
	{
	    global $db;
		$lkid=connectDatabase();
		if (! $succ = mysql_select_db($db))
		{
		    echo mysql_error();
			exit;
		}
		$sql="delete from comments where userId=" . $userId . ";";
		if (! $res=mysql_query($sql , $lkid)) 
		{
			echo mysql_error(). " : line1220  ";
		}
		mysql_close($lkid);
	}
	function deleteMusicByUserId($userId)
	{
	    global $db;
		$lkid=connectDatabase();
		if (! $succ = mysql_select_db($db))
		{
		    echo mysql_error();
			exit;
		}
		$sql="delete from music where userId=" . $userId . ";";
		if (! $res=mysql_query($sql , $lkid)) 
		{
			echo mysql_error(). " : line1220  ";
		}
		mysql_close($lkid);
	}
	function deleteVideoByUserId($userId)
	{
	    global $db;
		$lkid=connectDatabase();
		if (! $succ = mysql_select_db($db))
		{
		    echo mysql_error();
			exit;
		}
		$sql="delete from video where userId=" . $userId . ";";
		if (! $res=mysql_query($sql , $lkid)) 
		{
			echo mysql_error(). " : line1220  ";
		}
		mysql_close($lkid);
	}
	function deletePictureByUserId($userId)
	{
	    global $db;
		$lkid=connectDatabase();
		if (! $succ = mysql_select_db($db))
		{
		    echo mysql_error();
			exit;
		}
		$sql="delete from picture where userId=" . $userId . ";";
		if (! $res=mysql_query($sql , $lkid)) 
		{
			echo mysql_error(). " : line1220  ";
		}
		mysql_close($lkid);
	}
	function deleteArticleByUserId($userId)
	{
	    deleteCommentByUserId($userId);
		deletePictureByUserId($userId);
		deleteVideoByUserId($userId);
		deleteMusicByUserId($userId);
	    global $db;
		$lkid=connectDatabase();
		if (! $succ = mysql_select_db($db))
		{
		    echo mysql_error();
			exit;
		}
		$sql="delete from article where userId=" . $userId . ";";
		if (! $res=mysql_query($sql , $lkid)) 
		{
			echo mysql_error(). " : line1220  ";
		}
		mysql_close($lkid);
	}
	function deleteLoginByUserId($userId)
	{
	    global $db;
		$lkid=connectDatabase();
		if (! $succ = mysql_select_db($db))
		{
		    echo mysql_error();
			exit;
		}
		$sql="delete from login where userId=" . $userId . ";";
		if (! $res=mysql_query($sql , $lkid)) 
		{
			echo mysql_error(). " : line1220  ";
		}
		mysql_close($lkid);
	}
	function deleteSpecialtyByUserId($userId)
	{
	    global $db;
		$lkid=connectDatabase();
		if (! $succ = mysql_select_db($db))
		{
		    echo mysql_error();
			exit;
		}
		$sql="delete from specialty where userId=" . $userId . ";";
		if (! $res=mysql_query($sql , $lkid)) 
		{
			echo mysql_error(). " : line1220  ";
		}
		mysql_close($lkid);
	}
	function deleteFriendByUserId($userId)
	{
	    global $db;
		$lkid=connectDatabase();
		if (! $succ = mysql_select_db($db))
		{
		    echo mysql_error();
			exit;
		}
		$sql="delete from friends where userId=" . $userId . " or friendId=" . $userId . ";";
		if (! $res=mysql_query($sql , $lkid)) 
		{
			echo mysql_error(). " : line1220  ";
		}
		mysql_close($lkid);
	}
	function deleteUserByUserId($userId)
	{
	    deleteArticleByUserId($userId);
	    deleteFriendByUserId($userId);
		deleteSpecialtyByUserId($userId);
		deleteLoginByUserId($userId);
	    global $db;
		$lkid=connectDatabase();
		if (! $succ = mysql_select_db($db))
		{
		    echo mysql_error();
			exit;
		}
		$sql="delete from user where userId=" . $userId . ";";
		if (! $res=mysql_query($sql , $lkid)) 
		{
			echo mysql_error(). " : line1220  ";
		}
		mysql_close($lkid);
	}
	function findAllUserId()
	{
	    
	    global $db;
		$lkid=connectDatabase();
		if (! $succ = mysql_select_db($db))
		{
		    echo mysql_error();
			exit;
		}
		$sql="select userId from login;";
		if (! $res=mysql_query($sql , $lkid)) 
		{
			echo mysql_error(). " : line660  ";
		}
		$cid = Array();
		while($array = mysql_fetch_row($res))
		{
			$cid[] = $array[0];				
		}
		mysql_close($lkid);
		return $cid;
		
	}
	
	function stripTagAddSlashes($text)
	{
		$text = strip_tags($text);
		$text = addSlashes($text);
		trim(mysql_real_escape_string($text));
		return $text;
	}
?>