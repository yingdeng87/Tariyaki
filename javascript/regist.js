
			function previewImage(file){
				var div = document.getElementById("curImg");
				var MAXWIDTH = 150;
				var MAXHEIGHT = 150;
				
				if(typeof FileReader === "undefined"){
					alert("Your Browser doesn't support thumbnail picture!");
				}else{
					if (file.files && file.files[0]) {
						var myFile = file.files[0];
						if(!/image\/\w+/.test(myFile.type)){ //not pic
							alert("It's not a picture!");
						}else{
							div.innerHTML = "<img id='imghead' />";
							var img = document.getElementById("imghead");
							img.onload = function(){
								var rect = clacImgZoomParam(MAXWIDTH, MAXHEIGHT, img.offsetWidth, img.offsetHeight);
								img.width = rect.width;
								img.height = rect.height;
								img.style.marginLeft = rect.left + "px";
								img.style.marginTop = rect.top + "px";
							}

							var reader = new FileReader();
							reader.onload = function(evt){
								img.src = evt.target.result;
							}
							reader.readAsDataURL(myFile);
						}
					} else {
						var sFilter = 'filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale,src="';
						file.select();
						var src = document.selection.createRange().text;
						div.innerHTML = '<img id=imghead>';
						var img = document.getElementById('imghead');
						img.filters.item('DXImageTransform.Microsoft.AlphaImageLoader').src = src;
						var rect = clacImgZoomParam(MAXWIDTH, MAXHEIGHT, img.offsetWidth, img.offsetHeight);
						status = ('rect:' + rect.top + ',' + rect.left + ',' + rect.width + ',' + rect.height);
						div.innerHTML = "<div id=divhead style='width:" + rect.width + "px;height:" + rect.height + "px;margin-top:" + rect.top + "px;margin-left:" + rect.left + "px;" + sFilter + src + "\"'></div>";
					}
				}
			}
			function clacImgZoomParam(maxWidth, maxHeight, width, height){
				var param = {
					top: 0,
					left: 0,
					width: width,
					height: height
				};
				if (width > maxWidth || height > maxHeight) {
					rateWidth = width / maxWidth;
					rateHeight = height / maxHeight;
					
					if (rateWidth > rateHeight) {
						param.width = maxWidth;
						param.height = Math.round(height / rateWidth);
					}
					else {
						param.width = Math.round(width / rateHeight);
						param.height = maxHeight;
					}
				}
				
				param.left = Math.round((maxWidth - param.width) / 2);
				param.top = Math.round((maxHeight - param.height) / 2);
				return param;
			}
