<!DOCTYPE html>
<HTML lang="en-US">
<head>
	<title>mainPage</title>
	<meta charset = "utf-8"/>
	<meta name="author" content="Bolun Zhang, Siyu Liu, Ying Deng">
	<meta name="keywords" content="main page, Tariyaki, music">
	<meta name="generator" content="Notepad++">
	<link  rel = "stylesheet" type="text/css" href="css/title.css">
	
</head>
<body>
	<!--Logo and logout button-->
    <div id="top">
			<label id="team">Tariyaki</label>
			<button id="login" onclick="window.location.assign('login.php')">Log Out</button>
	</div>
	<!--title for thumb photo, nick name and self introduction-->
	<section id = "title">
	
		<img src = "img/thumb.jpg" id = "thumb" ></img>
		
			
		<div  id="use-intro">
			<article >
				<p> Blue : "I'm an awesome singer!!!"</p>
			</article>
		</div>
		<div class="some-button">
			<ul>
				
				<li class = "buttonList">
				     
				     <div align="center">search: <input type="text" style="width:300px;height:20px;font-size:14pt;" id="o" onkeyup="autoComplete.start(event)"></div>
                     <div class="auto_hidden" id="auto"></div>
					 <script src="javascript/search.js"></script>
					 <script>
                             var autoComplete=new AutoComplete('o','auto',['b0','b12','b22','b3',
	                         'b4','b5','b6','b7','b8','b2','abd','ab','acd','accd','b1','cd','ccd',
							 'cbcv','cxf','asdfasdvregrthtyur', 'nujknhgj', 'Bolun Zhang', 'Siyu Liu',
							 'Ying Dang', 'Steve Gabarro', 'Dominic Duggan']);
                     </script>
				</li>
			</ul>
		</div>
	</section>
	<section id = "main">
		<section id="friendList" class="friendList">
			<ul>
				<li><img src = "img/thumb.jpg" class="thumb"><a href = "friend.html">Steve<a></li>
				<li><img src = "img/thumb.jpg" class="thumb"><a href = "friend.html">Steven<a></li>
				<li><img src = "img/thumb.jpg" class="thumb"><a href = "friend.html">Galileo<a></li>
				<li><img src = "img/thumb.jpg" class="thumb"><a href = "friend.html">Tom<a></li>
				<li><img src = "img/thumb.jpg" class="thumb"><a href = "friend.html">Cat<a></li>
				<li><img src = "img/thumb.jpg" class="thumb"><a href = "friend.html">Glass<a></li>
				<li><img src = "img/thumb.jpg" class="thumb"><a href = "friend.html">Fish<a></li>
				<li><img src = "img/thumb.jpg" class="thumb"><a href = "friend.html">Micheal<a></li>
				<li><img src = "img/thumb.jpg" class="thumb"><a href = "friend.html">Schofield<a></li>
				<li><img src = "img/thumb.jpg" class="thumb"><a href = "friend.html">Jobs<a></li>
		        </br>
	            </br>
			</ul>
		</section>
		
		<section id = "postSection" class = "postSection">
			<header id="postInput">
				<textarea rows="10" cols="80">
				
				</textarea><br>
				<button id="text-button" class="text-button">post</button>
				<button id="text-button" class="text-button">upload</button>
				<button id="text-button" class="text-button">reset</button>
				<hr>
			</header>
			<section id = "postList" class="postList">
				<li>
					<section id= "post">
						<article>
						     <H4>If You Forget Me</H4>
						</article>
						<nav>
						      I want you to know</br>
						      one thing.</br>

						      You know how this is:</br>
						      if I look</br>
						      at the crystal moon, at the red branch</br>
						      of the slow autumn at my window,</br>
						      if I touch</br>
						      near the fire</br>
						      the impalpable ash</br>
						      or the wrinkled body of the log,</br>
						      everything carries me to you,</br>
						      as if everything that exists,</br>
						      aromas, light, metals,</br>
						      were little boats</br>
						      that sail</br>
						      toward those isles of yours that wait for me.</br>

						      Well, now,</br>
						      if little by little you stop loving me</br>
						      I shall stop loving you little by little.</br>

						      If suddenly</br>
						      you forget me</br>
						      do not look for me,</br>
						      for I shall already have forgotten you.</br>

							  </nav>
						<button onClick = "myFunction()" id="bCom">comment</button>
						
					</section>
					<hr>
				</li>
				<li>
					<section id= "post">
						<article>
						     <H4>If You Forget Me</H4>
						</article>
						<nav>
						      If you think it long and mad,</br>
						      the wind of banners</br>
						      that passes through my life,</br>
						      and you decide</br>
						      to leave me at the shore</br>
						      of the heart where I have roots,</br>
						      remember</br>
						      that on that day,</br>
						      at that hour,</br>
						      I shall lift my arms</br>
						      and my roots will set off</br>
						      to seek another land.</br>

						      But if each day,</br>
						      each hour,</br>
						      you feel that you are destined for me</br>
						      with implacable sweetness,</br>
						      if each day a flower</br>
						      climbs up to your lips to seek me,</br>
						      ah my love, ah my own,</br>
						      in me all that fire is repeated,</br>
						      in me nothing is extinguished or forgotten,</br>
						      my love feeds on your love, beloved,</br>
						      and as long as you live it will be in your arms</br>
						      without leaving mine</br>
						</nav>
						<button onClick = "myFunction()" id="bCom">comment</button>
						
					</section>
					<hr>
				</li>
				<li>
				    <audio controls>
                        <source src="Apologize.mp3" type="audio/mpeg">
                        <source src="Apologize.ogg" type="audio/ogg">
                        <embed height="50" width="100" src="Apologize.mp3">
                    </audio>
					</br>
					<button onClick = "myFunction()" id="bCom">comment</button>
				<hr></li>
				
                <script src="javascript/comment.js"></script>
				</br>
	            </br>
				
			</section>			
		</section>
		
		<section id="comment" class = "comment">
			<img id="commentPhoto"src = "img/comment.jpg">
				
			</img>
			</br>
	        </br>
		</section>
		<section id="comment1" class = "comment1" style="display:none">
			    <li>&nbsp;&nbsp;Jobs: wow<hr></li>
				<li>&nbsp;&nbsp;Zhang: awesome<hr></li>
				<li>&nbsp;&nbsp;Bo: diao bao le<hr></li>
				<li>&nbsp;&nbsp;Ying: good<hr></li>
				<li>&nbsp;&nbsp;Dang: holly<hr></li>
				<li>&nbsp;&nbsp;Liu: XXXXXX<hr></li>
				<li>&nbsp;&nbsp;Steve: yooooooooo<hr></li>
				<li>&nbsp;&nbsp;Steven: yooooooyooo<hr></li>
			</br>
	        </br>
		</section>

		
	
	
	
	
	</section>
	</br>
	</br>
	<footer id = "footer">
	<section id = "footer">
			<p class="copyright">&nbsp;&nbsp;&nbsp;Copyright &#xA9; Tariyaki</p>
	</section>
	</footer>
	
	
	
	



</body>


</HTML>