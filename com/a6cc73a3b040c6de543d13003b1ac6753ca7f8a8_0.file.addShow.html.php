<?php
/* Smarty version 3.1.30, created on 2017-06-05 19:17:30
  from "D:\wamp\www\myprojects\tpl\admin\addShow.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5935922a443aa2_69132251',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a6cc73a3b040c6de543d13003b1ac6753ca7f8a8' => 
    array (
      0 => 'D:\\wamp\\www\\myprojects\\tpl\\admin\\addShow.html',
      1 => 1496683031,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5935922a443aa2_69132251 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo CSS_PATH;?>
showcon.css">
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['JS_PATH']->value;?>
jquery.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['JS_PATH']->value;?>
addnews.js"><?php echo '</script'; ?>
>
    <!--<?php echo '<script'; ?>
 src = "<?php echo JS_PATH;?>
upload.js"><?php echo '</script'; ?>
>-->
    <?php echo '<script'; ?>
>
        window.onload = function(){
            var input = document.getElementsByClassName("file")[0];
            var progress = document.getElementsByClassName("progress")[0];
            var img = document.getElementsByTagName("img")[0];
            var uploadObj = new upload("index.php?m=admin&c=borrow&a=upload",input,progress,img,function(e){
                var imgurl = document.getElementsByName("imgurl")[0].value = e;
                alert(e);
            });
            uploadObj.up();

        }
        function upload(url,input,progress,img,callback){
            if(!url){
                console.error("url不存在");
            }
            this.url = url;
            this.input = input;
            this.progress = progress;
            this.img = img;
            this.callback = callback;
            this.type = ["image/jpeg","image/jpg","image/png"];
            this.size = 1024*1024*100;

        }
        upload.prototype = {
            up:function(){
                var that = this;
                //事件监听
                this.input.onchange = function(){
                    that.fileObj = this.files[0];
                    //检测规范
                    if(!that.check()){
                        return false;
                    };
                    // 让相应的控件显示；
                    that.img.parentNode.style.display = "block";
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
                //检测大小；
                var that = this;
                if(that.size < that.fileObj.size){
                    alert("文件太大");
                    that.input.value = "";
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
                    alert('上传图片成功！');
                    //that.callback(xmlobj.response);
                }
                xmlobj.open("post",this.url);
                xmlobj.send(data)
            }
        }
    <?php echo '</script'; ?>
>
</head>
<body>
<h3 style="width: 100%;height: 30px;text-align: center;line-height: 30px;font-size: 18px;font-weight: 200">------------------添加文章----------------</h3>
<form action="index.php?m=admin&c=news&a=addNews" method="post">
    <div class="loadshow" style="margin-right: 300px;">
        <span>新闻标题:</span><input type="text" name = "title" id='title' value = ""><br>
        <span>新闻内容:</span><textarea name="con"  id="con" cols="50" rows="10"></textarea><br>
    </div>
    <div class="loadimg">
        <span>上传文章图片:</span>
        <input type="file" value="" name="imgUrl" id="imgUrl" class = "file" multiple><br>
        <div class="img">
            <img src="" alt="" style="border: 0;width: 200px;height: 200px;margin-top: 20px;;">
        </div>
        <div class="progressbox" style="width: 200px;">
            <div class="progress"></div>
        </div>
    </div><br>
   <div>
       <label class="control-label" style='font-size:16px' for="pos">新闻推荐位</label>
       <select id="pos" name="pos">
           <option>轮播</option>
           <option>首页列表一</option>
       </select>
   </div>
    <br><br>
    <input type="submit" value="添加">
</form>
</body>
</html><?php }
}
