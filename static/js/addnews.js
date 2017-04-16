$(function(){
	var input=$(".file")[0];
	var progress=$(".progress")[0];
	var img=document.getElementsByTagName("img")[0];
	var uploadObj=new upload("index.php?m=admin&c=news&a=upload",input,progress,img,function(e){
		var imgurl=document.getElementsByTagName("imgurl")[0].value=0;
		alert(e);
	});
	uploadObj.up();
	function upload(url,input,progress,img,callback){
		if(!url){
			console.log("url不存在");
		}
		this.url=url;
		this.input=input;
		this.progress=progress;
		this.img=img;
		this.callback=callback;
		this.type=["image/jpeg","image/jpg","image/png"];
		this.size=1024*1024*100;
	}
	upload.prototype={
		up:function(){
			var that=this;
		}
		//事件监听
		this.input.onchange=function(){
			that.fileObj=this.files[0];
			//检测规范
			if(!that.check()){
				return false;
			};
			//让相应的控件显示：
			that.img.parentNode.style.display="block";
			that.progress.parentNode.style.display = "block";
    // 预览文件；
    that.view();
    //整合数据；
	var data = that.getData();
    // 上传
    that.ajax(data);
		}
	},
	check:function(){
		//检测大小
		var that=this;
		if(that.size<that.fileObj.size){
             alert("文件太大");
             that.input.value="";
             return false;
		}
	var flag = true;
    for (var i = 0; i < that.type.length; i++) {
    if(that.fileObj.type == that.type[i]){
    flag = false;
    break;
    }
    };
    if(flag){
    alert("文件类型不符");
    that.input.value = ""
    return false;
    }
    return true;
    },
    view:function(){
    var that = this;
    var fileread = new FileReader();
    fileread.readAsDataURL(that.fileObj);
    fileread.onload = function(e){
    that.img.src = e.target.result;
    }
    },
    getData:function(){
    var formdata = new FormData();
    formdata.append("file",this.fileObj);
    return formdata;
    },
    ajax:function(data){
    var that = this;
    var xmlobj = new XMLHttpRequest();
    xmlobj.upload.onloadstart = function(){
    that.input.setAttribute("disabled","disabled")
    }
    xmlobj.upload.onprogress = function(e){
    var bili = e.loaded/e.total*100 + "%";
    that.progress.style.width = bili;
    that.progress.innerHTML = bili;
    }
    xmlobj.onload = function(){
    that.input.removeAttribute("disabled");
    that.input.val = "";
    that.callback(xmlobj.response);
    }
    xmlobj.open("post",this.url);
    xmlobj.send(data)
    }
	}
})