<?php
    include 'Tariyaki-DB.php';
	//addArticle($userId, $musicId, $videoId, $pictureId, $title, $content)
	//addComment($articleId, $userId, $content)
	//addComment(1, 3,"test");
	deleteUserByUserId(1);
	//$link = connectDatabase();
	//addUser("Daniel", "Zhang",  "1991-01-01", "Talented", "xiaolan.jpg", "dzbl", "123qwe");
	//addUser("Dan", "Diaoren",  "1999-09-09", "fei chang diao", "xiaolan.jpg", "diao", "1123456");
	//addSpecialty(1, true, true, true, true, true, true, 
	//true, true, true, true, true, true, true, true, true, true, 
	//true, true, true);
	/*echo numOfUserName("dzbl") . "</br>";
	$res=resOfLoginByUserId(2);
	echo passwordByUserName("dzbl") . "</br>";
	echo userIdByUserNameAndPassword("dzbl", "123qwe") . "</br>";
	echo firstNameByUserId(2)."</br>";
	echo dobByUserId(2)."</br>";
	echo familyNameByUserId(2)."</br>";
	echo userInfoByUserId(2)."</br>";
	echo '<img src="data:image/jpg;base64,'.base64_encode(profileByUserId(1)).'"><br>';"</br>";
	//echo print_r(userIdByFirstName("Dan")) . " lin:18 </br>";
	$arr=Array();
	$arr=userIdByFamilyName("Zhang");
	echo $arr[0] . "</br>";
	echo $arr[1] . "</br>";
	$len=0;
	for($i=0;$i<count($arr);$i++)
	{
	    echo $arr[$i] . "</br>";
	}
	echo fullNameByUserId(1) . "</br>";
	echo print_r(articleIdByUserId(3)) . "</br>";
	
	$arr1=Array();
	$arr1=articleIdByUserId(3);
	echo $arr1[0] . "</br>";
	echo $arr1[1] . "</br>";
	//echo $arr1[4] . "</br>";
	$len=0;
	for($i=0;$i<count($arr);$i++)
	{
	    echo $arr1[$i] . "</br>";
	}
	
	*/
	
	/*echo titleByArticleId(3) . "</br>";
	echo contentByArticleId(4) . "</br>";
	echo dateByArticleId(4) . "</br>";
	echo musicIdByArticleId(2) . "</br>";
	echo videoIdByArticleId(2) . "</br>";
	echo pictureIdByArticleId(2) . "</br>";
	$arr1=Array();
	$arr1=commentIdByArticleId(2);
	echo $arr1[0] . "</br>";
	echo $arr1[1] . "</br>";
	//echo $arr1[4] . "</br>";
	$len=0;
	for($i=0;$i<count($arr1);$i++)
	{
	    echo $arr1[$i] . "</br>";
	}
	
	
	$arr1=resOfArticleByArticleId(2);
	foreach($arr1 as $x=>$x_value)
    {
       echo "Key=" . $x . ", Value=" . $x_value;
       echo "<br>";
    }			
	
	$arr1=commentIdByArticleId(2);
	for($i=0;$i<count($arr1);$i++)
	{
	    echo $arr1[$i] . "</br>";
	}*/
	//addVideo(2, "video", "");
	//addPicture(2, "xiaolan.jpg");
	//addMusic(2, "music", "");
	//addArticle(4, 1, 1, 1, "null title", "null content");
	/*$arr1=commentIdByArticleId(2);
	for($i=0;$i<count($arr1);$i++)
	{
	    echo $arr1[$i] . "</br>";
	}
	echo userIdByCommentId(2) . "</br>";
	
	echo contentByCommnentId(2) . "</br>";
	//addUser("BlaBlaBla", "Budy",  "1970-12-31", "hehexia", "xiaolan.jpg", "123@163.com", "qazwsx", "zxcvbnasdfgh");
	
	echo dateByCommnetId(1) . "</br>";
	echo dateByCommnetId(2) . "</br>";
	echo dateByCommnetId(3) . "</br>";
	echo dateByCommnetId(5) . "</br>";
	$res=resOfCommentByCommentId(5);
	while($array = mysql_fetch_row($res))
		{
			echo $array[0] . " " . $array[1] . " " . $array[2] . " " . $array[3] . " " . $array[4] . " "  ;				
		}*/
		//addFriend(3, 1, firstNameByUserId(3), familyNameByUserId(3));
		//addFriend(4, 2, firstNameByUserId(4), familyNameByUserId(4));
		//addFriend(3, 2, firstNameByUserId(3), familyNameByUserId(3));
		//addFriend(2, 4, firstNameByUserId(2), familyNameByUserId(2));
		//addFriend(2, 3, firstNameByUserId(2), familyNameByUserId(2));
		
/*		$arr = friendIdByUserId(2);
		for($i=0;$i<count($arr);$i++)
	{
	    echo $arr[$i] . "</br>";
	}
		
	echo friendFirstNameByFriendId(2) . " " . friendFamilyNameByFriendId(2) . "</br>" ;
	
	$res=resOfFriendByUserId(2);
	while($array = mysql_fetch_row($res))
		{
			echo $array[0] . " " . $array[1] . " " . $array[2] . " " . $array[3] . "</br> " ;				
		}
		$arr=musicIdByUserId(2);
		for($i=0;$i<count($arr);$i++)
	{
	    echo $arr[$i] . "</br>";
	}
	echo musicNameByMusicId(1) . "</br>";
	echo musicNameByMusicId(2) . "</br>";
	echo musicNameByMusicId(3) . "</br>";
	echo musicNameByMusicId(4) . "</br>";
	echo musicNameByMusicId(5) . "</br>";
	if(musicLinkByMusicId(1)==null)
	{
	    echo "yes, it's null </br>";
	}
	else
	{
	    echo "no, not null </br>";
	}
	echo musicLinkByMusicId(1) . "</br>";
	echo musicLinkByMusicId(2) . "</br>";
	echo musicLinkByMusicId(3) . "</br>";
	echo musicLinkByMusicId(4) . "</br>";
	echo musicLinkByMusicId(5) . "</br>";
	
	$res=resOfMusicByMusicId(4);
	while($array = mysql_fetch_row($res))
		{
			echo $array[0] . " " . $array[1] . " " . $array[2] . " " . $array[3] . "</br> " ;				
		}
	$arr=videoIdByUserId(2);
		for($i=0;$i<count($arr);$i++)
	{
	    echo $arr[$i] . "</br>";
	}
	echo videoNameByVideoId(1) . "</br>";
	echo videoNameByVideoId(2) . "</br>";
	echo videoNameByVideoId(3) . "</br>";
	echo videoNameByVideoId(4) . "</br>";
	echo videoNameByVideoId(5) . "</br>";
	echo videoLinkByVideoId(1) . "</br>";
	echo videoLinkByVideoId(2) . "</br>";
	echo videoLinkByVideoId(3) . "</br>";
	echo videoLinkByVideoId(4) . "</br>";
	echo videoLinkByVideoId(5) . "</br>";
	$res=resOfVideoByVideoId(4);
	while($array = mysql_fetch_row($res))
		{
			echo $array[0] . " " . $array[1] . " " . $array[2] . " " . $array[3] . "</br> " ;				
		}
		
		echo "picture ID" . "</br>";
	$arr=pictureIdByUserId(2);
	for($i=0;$i<count($arr);$i++)
	{
	    echo $arr[$i] . "</br>";
	}
	echo '<img src="data:image/jpg;base64,'.base64_encode(pictureByPictureId(4)).'"><br>';"</br>";
	
	
	$res=resOfPictureByPictureId(4);
	while($array = mysql_fetch_row($res))
		{
			echo $array[0] . " " . $array[1] . " " . '<img src="data:image/jpg;base64,'.base64_encode($array[2]).'"><br>' . "</br> " ;				
		}
	
	updateArticleContentByArticleId(1, "changed content");
	
	updateArticlePictureByArticleId(1, 4);
	updateArticleVideoByArticleId(1, 5);
	updateArticleMusicByArticleId(1, 3);
	updateArticleTitleByArticleId(1, "changed title");
	updateArticleDateByArticleId(1);
	
	updateUserInfoByUserId(1, "changed userInfo");
	updateUserEmailByUserId(1, "10000@qq.com");
	
	
	$res=resOfSpecialtyByUserId(5);
	while($array = mysql_fetch_row($res))
	{
	    //userId, SouthEastAsian, Country, SKA, EastAsian, 
		//Blues, ModemFolk, HipPop, African, Electronic, Jazz, Classic, Inspirational, 
		//Pop, Rock, Opera, RB, Industrial, ChineseOpera, HeavyMetal
		if($array[1]==true)
        {
		    echo "good at South East Asian </br>";
		}		
		if($array[2]==true)
        {
		    echo "good at Country </br>";
		}		
		if($array[3]==true)
        {
		    echo "good at SKA </br>";
		}	
        if($array[19]==false)
        {
		    echo "not good at HeavyMetal </br>";
		}		
	}
	/*addSpecialty(2, true, true, "false", true, true, true, 
	true, true, true, "false", true, true, true, true, true, true, 
	true, true, "false");
	addSpecialty(3, true, true, true, true, true, true, 
	true, true, true, true, "false", true, true, "false", true, true, 
	true, true, "false");
	addSpecialty(4, true, true, true, true, true, true, 
	"false", true, "false", "false", true, true, "false", true, true, true, 
	true, true, true);
	addSpecialty(5, true, true, true, true, true, true, 
	true, "false", true, true, "false", true, "false", true, true, true, 
	true, true, "false");*/
	/*
	deleteUserByUserId(1);
	echo "</br>";
	echo "</br>";
	echo "</br>";
	echo "</br>";
	echo "</br>";
	echo "</br>";
	echo "</br>";
	echo "</br>";*/
?>