
var action = 1;
var photo = document.getElementById("comment");
var replace = document.createElement("comment");
replace.setAttribute("id","aaccd");
replace.innerHTML = "commentList";
function myFunction(){

/*if(action==1)
{
var x = document.getElementById("comment");

x.parentNode.replaceChild(replace,x);
action=2;
}else
{

var abc = document.getElementById("aaccd");

replace.parentNode.replaceChild(photo,replace);
action=1;
}*/
var a=document.getElementById('comment'); 
var a1=document.getElementById('comment1'); 
a.style.display=="none"?a.style.display="":a.style.display="none"; 
a1.style.display=="none"?a1.style.display="":a1.style.display="none"; 
}

