<?php
	if(isset($_POST['userId']))
	{
		
		define('ROOT', __DIR__); 
		include ROOT . '/DB/tariyaki-DB.php';
		connectDatabase();
		session_start();
		$_POST['userId']=stripTagAddSlashes($_POST['userId']);
		$_SESSION['userId'] = $_POST['userId'];
		echo $_POST['userId'];
	}
	else if(isset($_POST['user'])&&isset($_POST['pass1']))
	{
		define('ROOT', __DIR__); 
		include ROOT . '/DB/tariyaki-DB.php';
		$_POST['user']=stripTagAddSlashes($_POST['user']);
		$_POST['pass1']=stripTagAddSlashes($_POST['pass1']);
		
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
		
		
		
var $ = function (id) {
    return "string" == typeof id ? document.getElementById(id) : id;
}
var Bind = function(object, fun) {
    return function() {
        return fun.apply(object, arguments);
    }
}
function AutoComplete(obj,autoObj,arr, arr2){
    this.obj=$(obj);        
    this.autoObj=$(autoObj);
    this.value_arr=arr;        
	this.value_arr2=arr2;
    this.index=-1;          
    this.search_value="";   
}
AutoComplete.prototype={
    
    init: function(){
        this.autoObj.style.left = this.obj.offsetLeft + "px";
        this.autoObj.style.top  = this.obj.offsetTop + this.obj.offsetHeight + "px";
        this.autoObj.style.width= this.obj.offsetWidth - 2 + "px";   
    },
   
    deleteDIV: function(){
        while(this.autoObj.hasChildNodes()){
            this.autoObj.removeChild(this.autoObj.firstChild);
        }
        this.autoObj.className="auto_hidden";
    },
    
    setValue: function(_this){
        return function(){
            _this.obj.value=this.seq;
			document.getElementById("friendId").value= this.num;
			//alter(this.value_arr2[i]);
			//document.getElementById("uid").value=_this.obj.value;
            _this.autoObj.className="auto_hidden";
        }       
    },
    
    autoOnmouseover: function(_this,_div_index){
        return function(){
            _this.index=_div_index;
            var length = _this.autoObj.children.length;
            for(var j=0;j<length;j++){
                if(j!=_this.index ){       
                    _this.autoObj.childNodes[j].className='auto_onmouseout';
                }else{
                    _this.autoObj.childNodes[j].className='auto_onmouseover';
                }
            }
        }
    },
    
    changeClassname: function(length){
        for(var i=0;i<length;i++){
            if(i!=this.index ){       
                this.autoObj.childNodes[i].className='auto_onmouseout';
            }else{
                this.autoObj.childNodes[i].className='auto_onmouseover';
                this.obj.value=this.autoObj.childNodes[i].seq;
            }
        }
    }
    ,
    
    pressKey: function(event){
        var length = this.autoObj.children.length;
        
        if(event.keyCode==40){
            ++this.index;
            if(this.index>length){
                this.index=0;
            }else if(this.index==length){
                this.obj.value=this.search_value;
				 
				
            }
            this.changeClassname(length);
        }
        
        else if(event.keyCode==38){
            this.index--;
            if(this.index<-1){
                this.index=length - 1;
            }else if(this.index==-1){
                this.obj.value=this.search_value;
            }
            this.changeClassname(length);
        }
        
        else if(event.keyCode==13){
            this.autoObj.className="auto_hidden";
			
            this.index=-1;
        }else{
            this.index=-1;
        }
    },
   
    start: function(event){
        if(event.keyCode!=13&&event.keyCode!=38&&event.keyCode!=40){
            this.init();
            this.deleteDIV();
            this.search_value=this.obj.value;
            var valueArr=this.value_arr;
			var valueArr2=this.value_arr2;
            //valueArr.sort();
            if(this.obj.value.replace(/(^\s*)|(\s*$)/g,'')==""){ return; }
            try{ var reg = new RegExp("(" + this.obj.value + ")","i");}
            catch (e){ return; }
            var div_index=0;
            for(var i=0;i<valueArr.length;i++){
                if(reg.test(valueArr[i])){
                    var div = document.createElement("div");
                    div.className="auto_onmouseout";
                    div.seq=valueArr[i];
					div.num=valueArr2[i];
                    div.onclick=this.setValue(this);
                    div.onmouseover=this.autoOnmouseover(this,div_index);
                    div.innerHTML=valueArr[i].replace(reg,"<strong>$1</strong>");
                    this.autoObj.appendChild(div);
                    this.autoObj.className="auto_show";
                    div_index++;
                }
            }
        }
        this.pressKey(event);
        window.onresize=Bind(this,function(){this.init();});
    }
}
	</script>
	
</head>

<body>
	<?php
	//add new post to user post list
	if(isset($_FILES['musicUpload'])&&isset($_POST['postText'])){

	
	$allowedExts = array("mp3");
	$temp = explode(".", $_FILES["musicUpload"]["name"]);
	$extension = end($temp);
	echo $extension;
	echo in_array($extension, $allowedExts);
	echo $_FILES["musicUpload"]["size"];
	if (($_FILES["musicUpload"]["type"] == "audio/mp3")&&($_FILES["musicUpload"]["size"] < 10000000)&& in_array($extension, $allowedExts))
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
		echo"<script>alert('Failer to upload music, acceptable file should be .mp3 and smaller than 10MB and ');</script>";
	}
	//addArticle($userId, $musicId, $videoId, $pictureId, $title, $content)
	if(isset($_POST['postText']))
	{
	if($_POST['postText']=='')
	$_POST['postText'] = ' ';
	$_POST['postText']=stripTagAddSlashes($_POST['postText']);
	$_POST['textTitle']=stripTagAddSlashes($_POST['textTitle']);
	addArticle($_SESSION['userId'], $musicId, 'null','null',$_POST['textTitle'],$_POST['postText']);
	}
	else
	{
	$_POST['postText'] = ' ';
	addArticle($_SESSION['userId'], $musicId, 'null',$_POST['textTitle'],$_POST['postText']);
	}
	
	}
	else

	
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
			echo "I like ";
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
		    
		    <div align="center"><input type="text" style="width:300px;height:25px;font-size:14pt;" id="o" onkeyup="autoComplete.start(event)"></div>
            <div class="auto_hidden" id="auto" ></div>
			<form action = "friend.php" method = "post">
			
			<input hidden type= text name="userId" value =<?php $userId = $_SESSION['userId'];echo $userId;?> />
			
			<input hidden type=text name="friendId" id="friendId" value="" >
            <li class="topButton"><input type="submit" title="search" value="goto" href=""></input></li>
			</form>
			
			<?php
	            $arr = Array();
		        //$arr=friendIdByUserId(3);
		        $lkid=connectDatabase();
		        if (! $succ = mysql_select_db("tariyaki"))
		        {
		            echo mysql_error();
			        exit;
		        }
		        $sql = "select id from user;";
		        if (! $res=mysql_query($sql, $lkid)) 
		        {
			        echo mysql_error(). " : line393 </br>";
		        }
		        while($row = mysql_fetch_array($res))
		        {
		            $arr[] = $row[0];
		        }
		
		        $jsarr="";
		        $jsarrid="";
		        for($i=0;$i<count($arr);$i++)
	            {
		            if($i==0)
		        	{
		        	    $jsarr="'" . fullNameByUserId($arr[$i]) . "'";
		        		$jsarrid="'" . $arr[$i] . "'";
		        	}
			        else
			        {
			            $jsarr= $jsarr . ", '" . fullNameByUserId($arr[$i]) . "'";
			        	$jsarrid= $jsarrid . ", '" . $arr[$i] . "'";
			        }
	            }
		
		        echo "
		        <script>
		                 var autoComplete=new AutoComplete('o','auto',[" . $jsarr . "], [" . $jsarrid . "]);
                   </SCRIPT>";
	        ?>
			
			
			<form action = login.php method = post>
			<li class="topButton"><input type="submit" title="logout" value="logout" href=""></input></li>
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
