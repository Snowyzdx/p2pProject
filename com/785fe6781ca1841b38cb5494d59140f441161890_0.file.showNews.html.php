<?php
/* Smarty version 3.1.30, created on 2017-06-05 20:51:50
  from "D:\wamp\www\myprojects\tpl\admin\showNews.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5935a846ada395_18925540',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '785fe6781ca1841b38cb5494d59140f441161890' => 
    array (
      0 => 'D:\\wamp\\www\\myprojects\\tpl\\admin\\showNews.html',
      1 => 1496688699,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5935a846ada395_18925540 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
<head lang="en">
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
    <link rel="stylesheet" href="<?php echo CSS_PATH;?>
style.css"/>
    <?php echo '<script'; ?>
>
        $(function(){
            $(".delCon").click(function(){
                var id=$(this).attr('name');
                $.ajax({
                    url:'index.php?m=admin&c=news&a=delCon',
                    type:'post',
                    data:{
                        id:id
                    },
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
<h4 style="width: 100%;margin-top: 20px;text-align: center">所有新闻汇总</h4>
<div style="width: 1000px;margin-left: 20px;border: 1px solid #333;margin-top: 20px">
<table class="table">

    <tr>
        <th style="text-align: center">序号</th>
        <th style="text-align: center">标题</th>
        <th style="text-align: center">内容 </th>
        <th style="text-align: center">操作</th>
    </tr>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, 'v');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
?>
        <tr>
            <td style="text-align: center;font-size: 18px"><?php ob_start();
echo $_smarty_tpl->tpl_vars['v']->value['id'];
$_prefixVariable1=ob_get_clean();
echo $_prefixVariable1;?>
</td>
            <td style="text-align: center;font-size: 18px"><?php ob_start();
echo $_smarty_tpl->tpl_vars['v']->value['title'];
$_prefixVariable2=ob_get_clean();
echo $_prefixVariable2;?>
</td>
            <td style="text-align: center;font-size: 18px">
                <a href="index.php?m=admin&c=news&a=seeCon&id=<?php ob_start();
echo $_smarty_tpl->tpl_vars['v']->value['id'];
$_prefixVariable3=ob_get_clean();
echo $_prefixVariable3;?>
" target="iframe">详情</a>
            </td>
            <td style="text-align: center;font-size: 18px">
                <button class="btn btn-danger delCon" name="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
">删除</button>
            </td>
        </tr>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

</table>
    </div>
</body>
</html><?php }
}
