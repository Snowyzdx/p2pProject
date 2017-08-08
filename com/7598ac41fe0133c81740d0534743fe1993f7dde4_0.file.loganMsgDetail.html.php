<?php
/* Smarty version 3.1.30, created on 2017-06-06 10:30:55
  from "D:\wamp\www\myprojects\tpl\admin\loganMsgDetail.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5936683fc12b15_37148327',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7598ac41fe0133c81740d0534743fe1993f7dde4' => 
    array (
      0 => 'D:\\wamp\\www\\myprojects\\tpl\\admin\\loganMsgDetail.html',
      1 => 1496678068,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5936683fc12b15_37148327 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>人人理财后台管理系统</title>
</head>
<body>
<div id="mian" style="position:relative;width: 1000px;border: 1px solid #666; height: 600px;margin-left: 80px;box-sizing:border-box;padding-left:20px;padding-right:20px;margin-top: 20px">
    <div style="width: 50%;position: absolute;left: 0;right: 0;text-align: center">
    <h4 style="display: block;width: 100%;text-align: center">申请人个人信息</h4>
    <?php ob_start();
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, 'v');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
$_prefixVariable1=ob_get_clean();
echo $_prefixVariable1;?>

        <p style="text-align: left;box-sizing: border-box;padding-left: 20px;">
            <span style="font-weight: 600;color: #333">姓名:</span>
            <span><?php ob_start();
echo $_smarty_tpl->tpl_vars['v']->value['username'];
$_prefixVariable2=ob_get_clean();
echo $_prefixVariable2;?>
</span>
        </p>
    <p style="text-align: left;box-sizing: border-box;padding-left: 20px;">
        <span style="font-weight: 600;color: #333">电话:</span>
        <span><?php ob_start();
echo $_smarty_tpl->tpl_vars['v']->value['username'];
$_prefixVariable3=ob_get_clean();
echo $_prefixVariable3;?>
</span>
    </p>
    <p style="text-align: left;box-sizing: border-box;padding-left: 20px;">
        <span style="font-weight: 600;color: #333">身份证号码:</span>
        <span><?php ob_start();
echo $_smarty_tpl->tpl_vars['v']->value['cardID'];
$_prefixVariable4=ob_get_clean();
echo $_prefixVariable4;?>
</span>
    </p>
    <p style="text-align: left;box-sizing: border-box;padding-left: 20px;">
        <span style="font-weight: 600;color: #333">住址:</span>
        <span><?php ob_start();
echo $_smarty_tpl->tpl_vars['v']->value['home_address'];
$_prefixVariable5=ob_get_clean();
echo $_prefixVariable5;?>
</span>
    </p>
    <p style="text-align: left;box-sizing: border-box;padding-left: 20px;">
        <span style="font-weight: 600;color: #333">教育背景:</span>
        <span><?php ob_start();
echo $_smarty_tpl->tpl_vars['v']->value['education_bk'];
$_prefixVariable6=ob_get_clean();
echo $_prefixVariable6;?>
</span>
    </p>
    <?php ob_start();
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
$_prefixVariable7=ob_get_clean();
echo $_prefixVariable7;?>

    </div>
    <div style="width:50%;position: absolute;right: 0;top: 0;text-align: center">
    <h4 style="display: block;width: 100%;text-align: center">申请工作信息</h4>
    <?php ob_start();
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data01']->value, 'v1');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['v1']->value) {
$_prefixVariable8=ob_get_clean();
echo $_prefixVariable8;?>

        <p style="text-align: left;box-sizing: border-box;padding-left: 20px;">
            <span style="font-weight: 600;color: #333">公司名:</span>
            <span><?php ob_start();
echo $_smarty_tpl->tpl_vars['v1']->value['companyName'];
$_prefixVariable9=ob_get_clean();
echo $_prefixVariable9;?>
</span>
        </p>
    <p style="text-align: left;box-sizing: border-box;padding-left: 20px;">
        <span style="font-weight: 600;color: #333">公司电话:</span>
        <sapn><?php ob_start();
echo $_smarty_tpl->tpl_vars['v1']->value['companyTel'];
$_prefixVariable10=ob_get_clean();
echo $_prefixVariable10;?>
</sapn>
    </p>
    <p style="text-align: left;box-sizing: border-box;padding-left: 20px;">
        <span style="font-weight: 600;color: #333">公司地址:</span>
        <span><?php ob_start();
echo $_smarty_tpl->tpl_vars['v1']->value['companyAddress'];
$_prefixVariable11=ob_get_clean();
echo $_prefixVariable11;?>
}</span>
    </p>
    <p style="text-align: left;box-sizing: border-box;padding-left: 20px;">
        <span style="font-weight: 600;color: #333">工资卡类型:</span>
        <span><?php ob_start();
echo $_smarty_tpl->tpl_vars['v1']->value['salaryCardType'];
$_prefixVariable12=ob_get_clean();
echo $_prefixVariable12;?>
</span>
    </p>
    <p style="text-align: left;box-sizing: border-box;padding-left: 20px;">
        <span style="font-weight: 600;color: #333">工资卡号:</span>
        <span><?php ob_start();
echo $_smarty_tpl->tpl_vars['v1']->value['salaryCard'];
$_prefixVariable13=ob_get_clean();
echo $_prefixVariable13;?>
</span>
    </p>
    <?php ob_start();
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
$_prefixVariable14=ob_get_clean();
echo $_prefixVariable14;?>

        </div>
    <div style="position: absolute;top:300px;">
        <?php ob_start();
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data02']->value, 'v2');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['v2']->value) {
$_prefixVariable15=ob_get_clean();
echo $_prefixVariable15;?>

        <h4 style="display: block;width: 100%;text-align: center">紧急联系人信息</h4>
        <p style="text-align: left;box-sizing: border-box;padding-left: 20px;">
            <span style="font-weight: 600;color: #333">联系人姓名:</span>
            <sapn><?php ob_start();
echo $_smarty_tpl->tpl_vars['v2']->value['name'];
$_prefixVariable16=ob_get_clean();
echo $_prefixVariable16;?>
</sapn>
        </p>
        <p style="text-align: left;box-sizing: border-box;padding-left: 20px;">
            <span style="font-weight: 600;color: #333">联系人关系:</span>
            <span><?php ob_start();
echo $_smarty_tpl->tpl_vars['v2']->value['relationship'];
$_prefixVariable17=ob_get_clean();
echo $_prefixVariable17;?>
</span>
        </p>
        <p style="text-align: left;box-sizing: border-box;padding-left: 20px;">
            <span style="font-weight: 600;color: #333">联系人电话:</span>
            <span><?php ob_start();
echo $_smarty_tpl->tpl_vars['v2']->value['phone'];
$_prefixVariable18=ob_get_clean();
echo $_prefixVariable18;?>
</span>
        </p>
        <?php ob_start();
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
$_prefixVariable19=ob_get_clean();
echo $_prefixVariable19;?>

    </div>
</div>
</body>
</html><?php }
}
