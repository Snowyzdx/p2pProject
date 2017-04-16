<?php
class index{
    //客户端主类
    function __construct(){
        $this->smarty = new Smarty();
        //模板目录，使用smarty模板的html文件的所属目录；
        $this->smarty->setTemplateDir("tpl/index");
        $this->smarty->setCompileDir("com");
        $this->smarty->assign("CSS_PATH",CSS_PATH);
        $this->smarty->assign("JS_PATH",JS_PATH);
        $this->smarty->assign("IMG_PATH",IMG_PATH);
    }
}

?>