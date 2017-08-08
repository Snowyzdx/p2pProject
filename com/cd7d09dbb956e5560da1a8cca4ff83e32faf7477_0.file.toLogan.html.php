<?php
/* Smarty version 3.1.30, created on 2017-06-06 08:55:00
  from "D:\wamp\www\myprojects\tpl\admin\toLogan.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_593651c4efc2d1_56430956',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cd7d09dbb956e5560da1a8cca4ff83e32faf7477' => 
    array (
      0 => 'D:\\wamp\\www\\myprojects\\tpl\\admin\\toLogan.html',
      1 => 1496681708,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_593651c4efc2d1_56430956 (Smarty_Internal_Template $_smarty_tpl) {
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
bootstrap/dist/css/bootstrap.css"/>
    <link rel="stylesheet" href="<?php echo CSS_PATH;?>
style.css"/>
    <title>人人理财后台管理系统</title>
    <?php echo '<script'; ?>
>
        $(function(){
            $(".pass").click(function(){
                var id=$(this).attr('name');
                var data={
                    id:id
               };
                $.ajax({
                    url:'index.php?m=admin&c=borrow&a=pass',
                    type:'post',
                    data:data,
                    success:function(e){
                        alert(e);
                    }
                })
            });
            $(".nopass").click(function(){
                var id=$(this).attr('name');
                var data={
                    id:id
                };
                $.ajax({
                    url:'index.php?m=admin&c=borrow&a=nopass',
                    type:'post',
                    data:data,
                    success:function(e){
                        alert(e);
                    }
                })
            })
        })
    <?php echo '</script'; ?>
>
</head>
<body>
<table class="table" id="table2" style="width: 1100px;border: 1px solid #ccc;margin-left: 20px;margin-top: 20px">
    <tr>
        <th style='text-align:center'>序号</th>
        <th style='text-align:center'>账号</th>
        <th style='text-align:center'>申请贷款详情</th>
        <th style='text-align:center'>申请人贷款信息</th>
        <th style="text-align:center">操作</th>
    </tr>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, 'v');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
?>
    <tr>
        <td style='text-align:center;font-size: 18px'><?php ob_start();
echo $_smarty_tpl->tpl_vars['v']->value['id'];
$_prefixVariable1=ob_get_clean();
echo $_prefixVariable1;?>
</td>
        <td style='text-align:center;font-size: 18px;'><?php ob_start();
echo $_smarty_tpl->tpl_vars['v']->value['username'];
$_prefixVariable2=ob_get_clean();
echo $_prefixVariable2;?>
</td>
        <td style='text-align:center;font-size: 18px;'><a href="index.php?m=admin&c=borrow&a=showTologanDetail&username=<?php ob_start();
echo $_smarty_tpl->tpl_vars['v']->value['username'];
$_prefixVariable3=ob_get_clean();
echo $_prefixVariable3;?>
&typecode=<?php ob_start();
echo $_smarty_tpl->tpl_vars['v']->value['typeCode'];
$_prefixVariable4=ob_get_clean();
echo $_prefixVariable4;?>
" target="iframe">详情</a></td>
        <td style='text-align:center;font-size: 18px;'><a href="index.php?m=admin&c=borrow&a=showMsgDetail&username=<?php ob_start();
echo $_smarty_tpl->tpl_vars['v']->value['username'];
$_prefixVariable5=ob_get_clean();
echo $_prefixVariable5;?>
" target="iframe">详情</a></td>
        <td style='text-align:center;font-size: 18px;'><button class='btn btn-danger pass' name="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
">通过</button><button class='btn cancle nopass' name="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" style="margin-left: 20px;">不通过</button></td>
    </tr>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

</table>
</body>
</html><?php }
}
