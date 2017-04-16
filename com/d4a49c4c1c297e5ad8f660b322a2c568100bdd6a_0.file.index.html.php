<?php
/* Smarty version 3.1.30, created on 2017-04-16 12:44:30
  from "D:\wampServer\wamp\www\p2pProject\tpl\admin\index.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58f34b0ec80fb0_23737617',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd4a49c4c1c297e5ad8f660b322a2c568100bdd6a' => 
    array (
      0 => 'D:\\wampServer\\wamp\\www\\p2pProject\\tpl\\admin\\index.html',
      1 => 1492333044,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58f34b0ec80fb0_23737617 (Smarty_Internal_Template $_smarty_tpl) {
?>
 <!doctype html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title>人人理财后台关系统</title>
            <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['JS_PATH']->value;?>
jquery.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['CSS_PATH']->value;?>
bootstrap/dist/js/bootstrap.js"><?php echo '</script'; ?>
>
            <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['CSS_PATH']->value;?>
adindex.css">
            <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['CSS_PATH']->value;?>
font.css">
            <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['CSS_PATH']->value;?>
bootstrap/dist/css/bootstrap.min.css">
          
             <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['CSS_PATH']->value;?>
style.css">
            <?php echo '<script'; ?>
>
                $(function(){
                    $(".cat span").next().hide();
                   $(".sonact").show();
                    $(".cat span").click(function(){
                    	console.log('f');
                        $(this).next(".son").finish();
                        $(this).next(".son").slideToggle("slow").siblings(".son:visible").slideUp("slow");
                    })
                })
            <?php echo '</script'; ?>
>
        </head>
        <body>
        <div class="top">
            <span class="touxiang"></span>
            <span class="gly"><?php echo $_smarty_tpl->tpl_vars['user']->value;?>
</span>
             <a id="loginout" href="#" style="text-decoration: none;">|&nbsp;&nbsp;安全退出</a> 
             <a id="set" href="#" style="text-decoration: none;">|&nbsp;&nbsp;设置</a> 
        </div>   
        <div class="left">
            <div class="left_top"><img src="<?php echo IMG_PATH;?>
logo.png" width="40px" height="40px" style="margin-top:5px;"/>
                <div style="float:right;font-size:16px;font-weight:600;height:100%;line-height:70px;">人人理财管理系统</div>

            </div>
            <div class="left_body">
                <ul>
                    <li  class="cat">
                        <span class='menueList'>
                        	<i class='iconfont'>&#xe630</i>
                        	<span>产品管理</span>
                        </span>
                        <ul class="son">
                            <li><a href="index.php?m=admin&c=borrow&a=showBorrowMsg" target="iframe"style="text-decoration:none">借贷项目</a></li>
                            <li><a href="index.php?m=admin&c=investment&a=showInvestment" target="iframe" style="text-decoration:none">投资项目</a></li>
                        </ul>
                    </li>
                    <li class="cat">
                        <span class='menueList'>
                        	<i class='iconfont'>&#xe688</i>
                        	<span>资金管理</span>
                        </span>
                        <ul class="son">
                            <li><a href="index.php?m=admin&c=category&a=addcat" target="iframe" style="text-decoration:none">会员账户管理</a></li>
                            <li><a href="index.php?m=admin&c=category&a=showcat" target="iframe" style="text-decoration:none">充值管理</a></li>
                            <li><a href="index.php?m=admin&c=category&a=showcat" target="iframe" style="text-decoration:none">提现管理</a></li>
                        </ul>
                    </li>
                    <li class="cat">
                        <span class='menueList'>
                        	<i class='iconfont'>&#xe700</i>
                        	<span>认证管理</span>
                        </span>
                        <ul class="son">
                            <li><a href="index.php?m=admin&c=show&a=showadd" target="iframe" style="text-decoration:none">视频认证</a></li>
                            <li><a href="" target="iframe" style="text-decoration:none">手机文章</a></li>
                        </ul>
                    </li>
                    <li class="cat">
                        <span class='menueList'>
                        	<i class='iconfont'>&#xe680</i>
                        	<span>积分管理</span>
                        </span>
                        <ul class="son">
                            <li><a href="index.php?m=admin&c=show&a=showadd" target="iframe" style="text-decoration:none">积分类型配置</a></li>
                            <li><a href="" target="iframe" style="text-decoration:none">积分等级配置</a></li>
                            <li><a href="" target="iframe" style="text-decoration:none">会员积分管理</a></li>
                        </ul>
                    </li>
                    <li class="cat">
                        <span class='menueList'>
                        	<i class='iconfont'>&#xe67e</i>
                        	<span>新闻管理</span>
                        </span>
                        <ul class="son">
                            <li><a href="index.php?m=admin&c=news&a=selectNews" target="iframe" style="text-decoration:none">查询新闻</a></li>
                            <li><a href="index.php?m=admin&c=news&a=addNews" target="iframe" style="text-decoration:none">添加新闻</a></li>
                        </ul>
                    </li>
                    <li class="cat">
                        <span class='menueList'>
                        	<i class='iconfont'>&#xe600</i>
                        	<span>系统管理</span>
                        </span>
                        <ul class="son">
                            <li><a href="" target="iframe" style="text-decoration:none">管理员信息管理</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            </div>
        <div class="right">
                <div id="nav">
                    <ul>
                        <li><a href="javascript:;" style="text-decoration:none">待审核统计</a></li>
                        <li><a href="" style="text-decoration:none">招标统计</a></li>
                        <li><a href="" style="text-decoration:none">投资人统计</a></li>
                        <li>
                           <a href="" style="text-decoration:none">逾期贷款统计</a>
                        </li>
                        <li><a href="" style="text-decoration:none">渠道统计</a></li>
                    </ul>
 
                </div>
                <div id="navMessage">
                    <ol class="breadcrumb" style="height:100%;line-height:30px;padding:0;padding-left:10px;">
                        <li><a href="#" style="font-size:16px" style="text-decoration:none">Home</a></li>
                        <li><a href="#" style="font-size:16px" style="text-decoration:none">Library</a></li>
                        <li class="active" style="font-size:16px">Data</li>
                    </ol>
                </div>    
                <iframe src="" style="border:0" frameborder="0" name="iframe"></iframe>
            </div>
        </body>
    <?php echo '<script'; ?>
>
 <?php echo '</script'; ?>
>
 </html><?php }
}
