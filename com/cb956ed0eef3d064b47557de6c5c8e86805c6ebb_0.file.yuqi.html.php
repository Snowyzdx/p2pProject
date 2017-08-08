<?php
/* Smarty version 3.1.30, created on 2017-06-06 10:28:03
  from "D:\wamp\www\myprojects\tpl\admin\yuqi.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59366793c03b39_16371664',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cb956ed0eef3d064b47557de6c5c8e86805c6ebb' => 
    array (
      0 => 'D:\\wamp\\www\\myprojects\\tpl\\admin\\yuqi.html',
      1 => 1496737681,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59366793c03b39_16371664 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['JS_PATH']->value;?>
jquery.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['CSS_PATH']->value;?>
bootstrap/dist/js/bootstrap.js"><?php echo '</script'; ?>
>
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['CSS_PATH']->value;?>
bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['CSS_PATH']->value;?>
style.css">
    <title>人人理财后台管理系统</title>
</head>
<body>
    <div style="width: 1000px;border:1px solid #999;margin-top: 20px;margin-left:20px">
    <table class="table" style="width: 100%">
       <tr>
           <th>账号</th>
           <th>姓名</th>
           <th>应还金额</th>
           <th>应还日期</th>
           <th>预期天数</th>
       </tr>
        <tr>
            <td>18734910421</td>
            <td>李明</td>
            <td>180.00￥</td>
            <td>2017-6-6</td>
            <td>1天</td>
        </tr>
    </table>
   </div>
</body>
</html><?php }
}
