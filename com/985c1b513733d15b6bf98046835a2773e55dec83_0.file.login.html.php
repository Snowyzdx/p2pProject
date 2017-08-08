<?php
/* Smarty version 3.1.30, created on 2017-06-05 19:08:26
  from "D:\wamp\www\myprojects\tpl\admin\login.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5935900a23ba80_20213406',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '985c1b513733d15b6bf98046835a2773e55dec83' => 
    array (
      0 => 'D:\\wamp\\www\\myprojects\\tpl\\admin\\login.html',
      1 => 1496209307,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5935900a23ba80_20213406 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>管理员登陆界面</title>
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['CSS_PATH']->value;?>
style.css">
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['CSS_PATH']->value;?>
login.css">
</head>
<body>
<div class="admin_login_box">
    <div class="admin_login_in">
            <form action="index.php?m=admin&c=index&a=checkLogin" method="post">
                <input class="user" type="text" name="auser" id="auser" value="">
                <input class="pass" type="password" name="apwd" id="apass" value="">
                <input type="submit" class="sub" value="">
            </form>
    </div>
</div>

</body>
</html><?php }
}
