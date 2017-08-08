<?php
/* Smarty version 3.1.30, created on 2017-06-06 09:27:03
  from "D:\wamp\www\myprojects\tpl\admin\investmentDetail.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59365947537fd5_79655762',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ab9c13feecb9674fc2ac3715420907331f52c6a4' => 
    array (
      0 => 'D:\\wamp\\www\\myprojects\\tpl\\admin\\investmentDetail.html',
      1 => 1496733678,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59365947537fd5_79655762 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>人人理财后台管理系统</title>
</head>
<body>
    <table>
        <tr>
            <th>投资人账号</th>
            <th>投资金额</th>
            <th>投资信息详情</th>
        </tr>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, 'v');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
?>
            <tr>
                <td><?php echo $_smarty_tpl->tpl_vars['v']->value['username'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['v']->value['sum'];?>
</td>
                <td><a href="index.php?m=admin&c=investment&a="></a></td>
            </tr>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

    </table>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, 'v');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
?>

    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

</body>
</html><?php }
}
