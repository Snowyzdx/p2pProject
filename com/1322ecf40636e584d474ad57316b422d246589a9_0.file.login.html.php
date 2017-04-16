<?php
/* Smarty version 3.1.30, created on 2017-04-16 08:33:45
  from "D:\wampServer\wamp\www\p2pProject\tpl\admin\login.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58f310496b0c80_69236098',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1322ecf40636e584d474ad57316b422d246589a9' => 
    array (
      0 => 'D:\\wampServer\\wamp\\www\\p2pProject\\tpl\\admin\\login.html',
      1 => 1491818832,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58f310496b0c80_69236098 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>管理员登陆界面</title>
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['CSS_PATH']->value;?>
base.css">
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
