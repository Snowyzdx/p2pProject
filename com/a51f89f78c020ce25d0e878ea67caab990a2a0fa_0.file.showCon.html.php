<?php
/* Smarty version 3.1.30, created on 2017-06-05 20:51:52
  from "D:\wamp\www\myprojects\tpl\admin\showCon.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5935a84883ea99_13989787',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a51f89f78c020ce25d0e878ea67caab990a2a0fa' => 
    array (
      0 => 'D:\\wamp\\www\\myprojects\\tpl\\admin\\showCon.html',
      1 => 1496688699,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5935a84883ea99_13989787 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>人人理财后台管理系统</title>
</head>
<body>
<div style="width: 900px;margin-left: 20px;height: 500px;box-sizing:border-box;padding:20px;border: 1px solid #999">
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, 'v');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
?>
        <?php ob_start();
echo $_smarty_tpl->tpl_vars['v']->value['con'];
$_prefixVariable1=ob_get_clean();
echo $_prefixVariable1;?>

    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

</div>
</body>
</html><?php }
}
