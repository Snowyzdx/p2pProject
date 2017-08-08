<?php
/* Smarty version 3.1.30, created on 2017-06-06 10:30:59
  from "D:\wamp\www\myprojects\tpl\admin\loganDetail.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5936684315d3e4_66588477',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7a153899b001a23d51bb00c3253b80000034a21d' => 
    array (
      0 => 'D:\\wamp\\www\\myprojects\\tpl\\admin\\loganDetail.html',
      1 => 1496678146,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5936684315d3e4_66588477 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>人人理财后台管理系统</title>
</head>
<body>
<div id="mian" style="width: 600px;border: 1px solid #666; height: 300px;margin-left: 200px;box-sizing:border-box;padding-left:20px;padding-right:20px;margin-top: 100px">
   <h4 style="display: block;width: 100%;text-align: center">申请借贷详情信息</h4>
    <?php ob_start();
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, 'v');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
$_prefixVariable1=ob_get_clean();
echo $_prefixVariable1;?>

    <p>
        <span style="font-weight: 600;color: #333">申请额度:</span>
        <span><?php ob_start();
echo $_smarty_tpl->tpl_vars['v']->value['sum'];
$_prefixVariable2=ob_get_clean();
echo $_prefixVariable2;?>
</span>
    </p>
    <p>
        <span style="font-weight: 600;color: #333">申请期限:</span>
        <span><?php ob_start();
echo $_smarty_tpl->tpl_vars['v']->value['time'];
$_prefixVariable3=ob_get_clean();
echo $_prefixVariable3;?>
</span>
    </p>
    <?php ob_start();
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
$_prefixVariable4=ob_get_clean();
echo $_prefixVariable4;?>

    <?php ob_start();
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data01']->value, 'v1');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['v1']->value) {
$_prefixVariable5=ob_get_clean();
echo $_prefixVariable5;?>

        <p>
            <span style="font-weight: 600;color: #333">贷款利息:</span>
            <span><?php ob_start();
echo $_smarty_tpl->tpl_vars['v1']->value['invest'];
$_prefixVariable6=ob_get_clean();
echo $_prefixVariable6;?>
</span>
        </p>
    <p>
        <span style="font-weight: 600;color: #333">服务费:</span>
        <span><?php ob_start();
echo $_smarty_tpl->tpl_vars['v1']->value['saverFeed'];
$_prefixVariable7=ob_get_clean();
echo $_prefixVariable7;?>
</span>
    </p>
    <?php ob_start();
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
$_prefixVariable8=ob_get_clean();
echo $_prefixVariable8;?>

</div>
</body>
</html><?php }
}
