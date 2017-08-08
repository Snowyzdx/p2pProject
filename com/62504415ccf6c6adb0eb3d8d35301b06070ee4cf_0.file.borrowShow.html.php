<?php
/* Smarty version 3.1.30, created on 2017-06-06 03:46:43
  from "D:\wamp\www\myprojects\tpl\admin\borrowShow.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59360983347b90_21857738',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '62504415ccf6c6adb0eb3d8d35301b06070ee4cf' => 
    array (
      0 => 'D:\\wamp\\www\\myprojects\\tpl\\admin\\borrowShow.html',
      1 => 1496498965,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59360983347b90_21857738 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>人人理财后台管理系统</title>
	<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['JS_PATH']->value;?>
jquery.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['CSS_PATH']->value;?>
bootstrap/dist/js/bootstrap.js"><?php echo '</script'; ?>
>
	<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['CSS_PATH']->value;?>
bootstrap/dist/css/bootstrap.css"/>
	<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['JS_PATH']->value;?>
borrow.js"><?php echo '</script'; ?>
>
	<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['CSS_PATH']->value;?>
addBorrow.css"/>
	<link rel="stylesheet" href="<?php echo CSS_PATH;?>
style.css"/>
	<style>
		.progressbox{
			width:300px;
			height:18px;
			border:1px solid #aaa;
			display:none;
			line-height: 20px;
			font-size: 16px;
			margin-top: 20px;
		}
		.progress{
			width:100%;
			height:100%;
			background:#BFD3E0;
		}
		.img{
			width:100%;
			/*height: 100%;*/
		}
		.img img{
			width:50%;
			height: 50%;
		}
	</style>
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
   <ul id="myTab" class="nav nav-tabs" style="margin-left:10px">
   <li class="li1 active">
      <a href= "#tab1" style="text-decoration:none" data-toggle="tab">
        查询项目
      </a>
   </li>
   <li class="li2"><a href="#tag2" style="text-decoration:none" data-toggle="tab">添加项目</a></li>
   <li class="dropdown">
      <a href="#" style="text-decoration:none" id="myTabDrop1" class="dropdown-toggle" 
         data-toggle="dropdown">编辑项目
         <b class="caret"></b>
      </a>
      <ul class="dropdown-menu" role="menu" aria-labelledby="myTabDrop1">
         <li class="li3-1"><a href="#tag3-1" style="text-decoration:none" tabindex="-1" data-toggle="tab">终止项目</a></li>
         <li class="li3-2"><a href="#tag3-2" style="text-decoration:none" tabindex="-1" data-toggle="tab">项目当前收益</a></li>
      </ul>
   </li>
</ul>
<div id="myTabContent" class="tab-content" style="width: 1400px;">
   <div class="tab-pane fade in active" id="tab1">
      <div class="panel panel-default" style="width:80%;margin-left:10px;">
     	<div class="panel-heading" style="font-weight:600;text-align: center">借贷项目汇总</div>
	    <table class="table">
		    <tr>
		    	<th style="text-align: center">序号</th>
		    	<th style="text-align: center">名称</th>
		    	<th style="text-align: center">利息</th>
		    	<th style="text-align: center">贷款期数</th>
		    	<th style="text-align: center">服务费</th>
		    	<th style="text-align: center">借贷人数</th>
		    	<th style="text-align: center">额度范围</th>
		    </tr>
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, 'v');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
?>
				<tr>
					<td style="text-align: center;font-size: 18px;"><?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
</td>
					<td style="text-align: center;font-size: 18px;"><?php echo $_smarty_tpl->tpl_vars['v']->value['typename'];?>
</td>
					<td style="text-align: center;font-size: 18px;"><?php echo $_smarty_tpl->tpl_vars['v']->value['invest'];?>
</td>
					<td style="text-align: center;font-size: 18px;"><?php echo $_smarty_tpl->tpl_vars['v']->value['timesum'];?>
个月</td>
					<td style="text-align: center;font-size: 18px;"><?php echo $_smarty_tpl->tpl_vars['v']->value['saverFeed'];?>
</td>
					<td style="text-align: center;font-size: 18px;"><?php echo $_smarty_tpl->tpl_vars['v']->value['num'];?>
</td>
					<td style="text-align: center;font-size: 18px;"><?php echo $_smarty_tpl->tpl_vars['v']->value['minmoney'];?>
~<?php echo $_smarty_tpl->tpl_vars['v']->value['maxmoney'];?>
￥</td>
				</tr>
			<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

	    </table>
     </div>
   </div>
   <div class="tab-pane fade" id="tag2" style="background: #fff">
   	<form class="form-horizontal" id="addBorrow" style="position: relative;background: #fff">
   		<h4>添加借贷产品</h4>
		<div class="loganCon">
 			<p>
 				<label class="control-label" for="typename" style='font-size:16px;'>项目名称</label>
				<input type="text" class="input-xlarge" name="typename" id="typename">
 			</p>
 			
			<p>
				<label class="control-label" style='font-size:16px' for="timesum">借贷期限</label>
				<select id="timesum" name="timesum">
					<option>1个月</option>
					<option>2个月</option>
					<option>3个月</option>
					<option>6个月</option>
					<option>12个月</option>
				</select>
			</p>
			
			<p>
				<label class="control-label" style='font-size:16px' for="maxmoney">最大金额</label>
				<input type="text" class="input-xlarge" name="maxmoney" id="maxmoney">
			</p>
			
			<p>
				<label class="control-label" style='font-size:16px' for="minmoney">最小金额</label>
				<input type="text" class="input-xlarge" name="minmoney" id="minmoney">
			</p>

			<p>
				<label class="control-label" style='font-size:16px' for="invest">月利息值</label>
				<input type="text" class="input-xlarge" name="invest" id="invest"/>
			</p>

			<p>

				 <label class="control-label" style='font-size:16px' for="saverFeed">服务费用</label>
				<input type="text" class="input-xlarge" name="saverFeed" id="saverFeed">
			</p>	
			<p>
				<label class="control-label" style='font-size:16px' for="pos">项目推荐位</label>
				<select id="pos" name="pos">
					<option>轮播</option>
					<option>首页列表一</option>
					<option>首页列表二</option>
				</select>
			</p>
		<div style="width: 600px;height: 300px; position: absolute;right: 0;top:20px;right:150px;">
		<div class="loadimg" style="width: 600px;height: 400px; position: absolute;right: 0;top: 100px;">
			<span style="color:#666;font-size: 20px;">-------------上传轮播图片--------------</span>
			<br/>
			<input type="file" style="font-size: 20px;color: #666" class = "file" multiple name="imgurl"><br>
			<div class="img">
				<img src="" alt="">
			</div>
			<div class="progressbox">
				<div class="progress"></div>
			</div>
		</div>
		</div>
		<div class="form-actions" style="margin-top:30px;">
			<button type="button" class="btn btn-primary" id="addBorrowBtn">添加</button>
			<button class="btn"  style="margin-left:40px">取消</button>
		</div>
    	</div>
	</form>
   </div>
   <div class="tab-pane fade" id="tag3-1">
      <div class="panel panel-default" style="width:1000px;margin-left:10px">
     	<div class="panel-heading" style="font-weight:600;text-align: center" id="cancle">终止借贷项目</div>
	    <table class="table" id="table2">
		    <tr>
		    	<th style='text-align:center'>序号</th>
		    	<th style='text-align:center'>名称</th>
		    	<th style='text-align:center'>利息</th>
		    	<th style='text-align:center'>贷款期数</th>
		    	<th style='text-align:center'>服务费</th>
		    	<th style='text-align:center'>额度范围</th>
		    	<th style='text-align:center'>创建人</th>
		    	<th style='text-align:center'>操作</th>
		    </tr>
		    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, 'v');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
?>
		    	<tr>
		    		<td style='text-align:center;font-size: 18px'><?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
</td>
		    		<td style='text-align:center;font-size: 18px;'><?php echo $_smarty_tpl->tpl_vars['v']->value['typename'];?>
</td>
		    		<td style='text-align:center;font-size: 18px;'><?php echo $_smarty_tpl->tpl_vars['v']->value['invest'];?>
</td>
		    		<td style='text-align:center;font-size: 18px;'><?php echo $_smarty_tpl->tpl_vars['v']->value['timesum'];?>
个月</td>
		    		<td style='text-align:center;font-size: 18px;'><?php echo $_smarty_tpl->tpl_vars['v']->value['saverFeed'];?>
</td>
		    		<td style='text-align:center;font-size: 18px;'><?php echo $_smarty_tpl->tpl_vars['v']->value['minmoney'];?>
~<?php echo $_smarty_tpl->tpl_vars['v']->value['maxmoney'];?>
￥</td>
		    		<td style='text-align:center;font-size: 18px;'><?php echo $_smarty_tpl->tpl_vars['v']->value['admin'];?>
</td>
		    		<td style='text-align:center;font-size: 18px;'><button class='btn btn-danger cancle' name="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
">删除</button><input type="hidden" value=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
 /></td>
		    	</tr>
		    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

	    </table>

      </div>
   </div>
   <div class="tab-pane fade" id="tag3-2">
   </div>
</div>
</body>

</html><?php }
}
