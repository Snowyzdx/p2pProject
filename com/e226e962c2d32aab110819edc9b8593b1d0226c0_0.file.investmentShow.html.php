<?php
/* Smarty version 3.1.30, created on 2017-06-06 03:47:26
  from "D:\wamp\www\myprojects\tpl\admin\investmentShow.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_593609aed15797_81404307',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e226e962c2d32aab110819edc9b8593b1d0226c0' => 
    array (
      0 => 'D:\\wamp\\www\\myprojects\\tpl\\admin\\investmentShow.html',
      1 => 1496478057,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_593609aed15797_81404307 (Smarty_Internal_Template $_smarty_tpl) {
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
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['JS_PATH']->value;?>
investment.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['CSS_PATH']->value;?>
bootstrap/dist/js/bootstrap.js"><?php echo '</script'; ?>
>
	<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['CSS_PATH']->value;?>
bootstrap/dist/css/bootstrap.css"/>
	<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['CSS_PATH']->value;?>
investmentShow.css"/>
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
	   <li class="dropdown">
		   <a href="#" style="text-decoration:none" id="myTabDrop2" class="dropdown-toggle"
			  data-toggle="dropdown">查询项目
			   <b class="caret"></b>
		   </a>
		   <ul class="dropdown-menu" role="menu" aria-labelledby="myTabDrop1">
			   <li class="li3-1"><a href="#tag1-1" style="text-decoration:none" tabindex="-1" data-toggle="tab">投标项目</a></li>
			   <li class="li3-2" onclick=""><a href="#tag1-2" style="text-decoration:none" tabindex="-1" data-toggle="tab">固定投资项目</a></li>
		   </ul>
	   </li>
   <li class="li2"><a href="#tag2" style="text-decoration:none" data-toggle="tab">添加项目</a></li>
	<li class="li3"><a href="#tag3" style="text-decoration:none" data-toggle="tab">终止项目</a></li>
</ul>
<div id="myTabContent" class="tab-content" style="width: 1100px;">
   <div class="tab-pane fade" id="tag1-1">
      <div class="panel panel-default" style="width:100%;margin-left:10px;">
     	<div class="panel-heading" style="font-weight:600;color: #333;text-align: center">投标项目汇总</div>
	    <table class="table">
		    <tr>
		    	<th style="text-align: center">序号</th>
		    	<th style="text-align: center">名称</th>
				<th style="text-align: center">集资总额</th>
		    	<th style="text-align: center">利息</th>
				<th style="text-align: center;">封闭期</th>
		    	<th style="text-align: center">投资人数</th>
		    	<th style="text-align: center">创建时间</th>
				<th style="text-align: center">剩余资金</th>
				<th style="text-align: center">停标时间</th>
		    </tr>
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data01']->value, 'v');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
?>
			<tr>
			<td style="text-align: center;color: #666;font-size: 18px">
				<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>

			</td>
			<td style="text-align: center;color: #666;font-size: 18px">
				<?php echo $_smarty_tpl->tpl_vars['v']->value['typename'];?>

			</td>
			<td style="text-align: center;color: #666;font-size: 18px">
				<?php echo $_smarty_tpl->tpl_vars['v']->value['moneysum'];?>

			</td>
			<td style="text-align: center;color: #666;font-size: 18px">
				<?php echo $_smarty_tpl->tpl_vars['v']->value['invest'];?>

			</td>
			<td style="text-align: center;color: #666;font-size: 18px">
				<?php echo $_smarty_tpl->tpl_vars['v']->value['timesum'];?>

			</td>
			<td style="text-align: center;color: #666;font-size: 18px">
				<?php echo $_smarty_tpl->tpl_vars['v']->value['num'];?>

			</td>
			<td style="text-align: center;color: #666;font-size: 18px">
				<?php echo $_smarty_tpl->tpl_vars['v']->value['creatDate'];?>

			</td>
			<td style="text-align: center;color: #666;font-size: 18px">
				<?php echo $_smarty_tpl->tpl_vars['v']->value['leftMoney'];?>

			</td>
			<td style="text-align: center;color: #666;font-size: 18px">
				<?php echo $_smarty_tpl->tpl_vars['v']->value['stopDate'];?>

			</td>
			</tr>
			<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

	    </table>
     </div>
   </div>
	<div class="tab-pane fade in active" id="tag1-2">
		<div class="panel panel-default" style="width:100%;margin-left:10px;">
			<div class="panel-heading" style="font-weight:600;color: #333;text-align: center">固定投资项目汇总</div>
			<table class="table">
				<tr>
					<th style="text-align: center">序号</th>
					<th style="text-align: center">名称</th>
					<th style="text-align: center">利息</th>
					<th style="text-align: center">封闭期</th>
					<th style="text-align: center">投资人数</th>
					<th style="text-align: center">目前集资总额</th>
					<th style="text-align: center">创建时间</th>
				</tr>
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data02']->value, 'v1');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['v1']->value) {
?>
				 <tr>
						<td style="text-align: center;color: #666;font-size: 18px"><?php echo $_smarty_tpl->tpl_vars['v1']->value['id'];?>
</td>
						<td style="text-align: center;color: #666;font-size: 18px"><?php echo $_smarty_tpl->tpl_vars['v1']->value['typename'];?>
</td>
						<td style="text-align: center;color: #666;font-size: 18px"><?php echo $_smarty_tpl->tpl_vars['v1']->value['invest'];?>
</td>
						<td style="text-align: center;color: #666;font-size: 18px"><?php echo $_smarty_tpl->tpl_vars['v1']->value['timesum'];?>
</td>
						<td style="text-align: center;color: #666;font-size: 18px"><?php echo $_smarty_tpl->tpl_vars['v1']->value['num'];?>
</td>
						<td style="text-align: center;color: #666;font-size: 18px"><?php echo $_smarty_tpl->tpl_vars['v1']->value['leftMoney'];?>
</td>
						<td style="text-align: center;color: #666;font-size: 18px"><?php echo $_smarty_tpl->tpl_vars['v1']->value['creatDate'];?>
</td>
					</tr>
					 <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

			</table>
		</div>
	</div>
   <div class="tab-pane fade" id="tag2" style="width: 1000px;height: 460px">
   	<form class="form-horizontal" id="addBorrow" style="position: relative;width: 100%;height: 460px">
   		<h4>添加投资产品</h4>
		<div style="position: absolute;width: 600px;left: 20px;">
 			<p>
 				<label class="control-label" for="typename" style='font-size:16px;'>项目名称</label>
				<input type="text" class="input-xlarge" name="typename" id="typename">
 			</p>
 			<p>
				<label class="control-label"  style='font-size:16px;' >项目类型</label>
				<label style="margin-left: 20px;"><input class="type" name="type" type="radio" checked value="投标项目" />投标项目 </label>
				<label><input name="type" class="type" type="radio" value="固定投资项目" />固定投资项目 </label>
			</p>
			<p>
				<label class="control-label" style='font-size:16px;margin-right: 20px;' for="timesum">封闭期</label>
				<select id="timesum" name="timesum">
					<option>30天</option>
					<option>60天</option>
					<option>90天</option>
					<option>180天</option>
					<option>365天</option>
				</select>
			</p>
			
			<p>
				<label class="control-label" style='font-size:16px' for="moneysum">投资总额</label>
				<input type="text" class="input-xlarge" name="moneysum" id="moneysum">
			</p>
			<p>
				<label class="control-label" style='font-size:16px' for="minmoney">起步金额</label>
				<input type="text" class="input-xlarge" name="minmoney" id="minmoney"/>
			</p>
			<p>
				<label class="control-label" style='font-size:16px' for="invest">月利息值</label>
				<input type="text" class="input-xlarge" name="invest" id="invest"/>
			</p>	
			<p>
				<label class="control-label" style='font-size:16px' for="pos">项目推荐位</label>
				<select id="pos" name="pos">
					<option>轮播</option>
					<option>首页列表一</option>
					<option>首页列表二</option>
					<option>分页列表</option>
				</select>
			</p>
		</div>
		<div class="loadimg" style="width: 600px;height: 400px; position: absolute;right: 0;top: 100px;">
				<span style="color:#666;font-size: 20px;">-------------上传轮播图片--------------</span>
				<br/>
				<input type="file" id="imgurl" style="font-size: 20px;color: #666" class = "file" multiple name="imgurl"><br>
				<div class="img">
					<img src="" alt="">
				</div>
				<div class="progressbox">
					<div class="progress"></div>
				</div>
			</div>

		<div class="form-actions" style="position: absolute;bottom: 50px;left: 100px">
			<button type="button" class="btn btn-primary" id="addInvestment">添加</button>
			
			<button class="btn"  style="margin-left:40px">取消</button>
		</div>
    </form>  
   </div>
   <div class="tab-pane fade" id="tag3" style="width: 1000px;margin-left: 20px">
	    <table class="table" id="table2" style="margin-top: 20px;border:1px solid #ccc">
		    <tr>
		    	<th style='text-align:center'>序号</th>
				<th style='text-align:center'>类型</th>
		    	<th style='text-align:center'>名称</th>
				<th style='text-align:center'>利息</th>
		    	<th style='text-align:center'>期数</th>
				<th style='text-align:center'>创建时间</th>
		    	<th style='text-align:center'>操作</th>
		    </tr>
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data01']->value, 'v');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
?>
				<tr>
					<td style="text-align: center;font-size: 18px;color: #666;"><?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
</td>
					<td style="text-align: center;font-size: 18px;color: #666"><?php echo $_smarty_tpl->tpl_vars['v']->value['type'];?>
</td>
					<td style="text-align: center;font-size: 18px;color: #666"><?php echo $_smarty_tpl->tpl_vars['v']->value['typename'];?>
</td>
					<td style="text-align: center;font-size: 18px;color: #666"><?php echo $_smarty_tpl->tpl_vars['v']->value['invest'];?>
</td>
					<td style="text-align: center;font-size: 18px;color: #666"><?php echo $_smarty_tpl->tpl_vars['v']->value['timesum'];?>
</td>
					<td style="text-align: center;font-size: 18px;color: #666"><?php echo $_smarty_tpl->tpl_vars['v']->value['creatDate'];?>
</td>
					<td style="text-align: center">
					<button class='btn btn-danger cancle' name="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
">停止</button>
					<input type="hidden" value=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
/>
					</td>
				</tr>
			<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data02']->value, 'v');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
?>
				<tr>
					<td style="text-align: center"><?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
</td>
					<td style="text-align: center"><?php echo $_smarty_tpl->tpl_vars['v']->value['type'];?>
</td>
					<td style="text-align: center"><?php echo $_smarty_tpl->tpl_vars['v']->value['typename'];?>
</td>
					<td style="text-align: center"><?php echo $_smarty_tpl->tpl_vars['v']->value['invest'];?>
</td>
					<td style="text-align: center"><?php echo $_smarty_tpl->tpl_vars['v']->value['timesum'];?>
</td>
					<td style="text-align: center"><?php echo $_smarty_tpl->tpl_vars['v']->value['creatDate'];?>
</td>
					<td style="text-align: center">
					<button class='btn btn-danger cancle ' name="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
">停止</button>
					</td>
				</tr>
			<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

	    </table>
   </div>
</div>
</body>
</html><?php }
}
