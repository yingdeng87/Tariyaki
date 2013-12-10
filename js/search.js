
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
			document.getElementById("uid").value= this.num;
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
				 
				<?php
				    
				?>
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