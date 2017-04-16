<?php
class loginControl extends index{
    function login(){
        $this->smarty->display("login.html");
    }
    function checkLogin(){
        $db=new db("user");
        if(isset($_POST["username"])){
            $username=$_POST["username"];
        }else{
            $this->login();
        }

        if(isset($_POST["password"])){
            $password=md5($_POST["password"]);
        }else{
            $this->login();
        }

        $data=$db->select();
        foreach($data as $v){
            if($v["username"]==$username){
                if($v["password"]==$password){
                    $_SESSION["userlogin"]=1;
                    $_SESSION["username"]=$username;
                    $_SESSION["utime"]=$v['utime'];
                    $_SESSION["uid"]=$v['uid'];
                    $_SESSION["password"]=$v["password"];
                    $this->smarty->assign("noticeTitle","登录成功");
                    $this->smarty->assign("noticePage","主页面");
                    if(isset($_SESSION["currenturl"])){
                        $this->smarty->assign("noticeUrl",$_SESSION["currenturl"]);
                        unset($_SESSION["currenturl"]);
                    }else{
                        $this->smarty->assign("noticeUrl","index.php");
                    }
                    $this->smarty->display("notice.html");
                    exit;
                }
            }
        }
        $this->smarty->assign("noticeTitle","登录失败");
        $this->smarty->assign("noticePage","登录页面");
        $this->smarty->assign("noticeUrl","index.php");
        $this->smarty->display("notice.html");
    }

    function reg(){
        $this->smarty->display("reg.html");
    }

    function addUser(){
        $db=new db("user");
        if(isset($_POST["username"])){
            $username=$_POST["username"];
        }else{
            $this->login();
        }

        if(isset($_POST["password"])){
            $password=md5($_POST["password"]);
        }else{
            $this->login();
        }
        if($db->field("username='{$username}',password='{$password}'")->insert()){
            $this->smarty->assign("noticeTitle","注册成功");
            $this->smarty->assign("noticePage","登录页面");
            $this->smarty->assign("noticeUrl","index.php?m=index&a=login&c=login");
            $this->smarty->display("notice.html");
        }else{
            $this->smarty->assign("noticeTitle","注册失败");
            $this->smarty->assign("noticePage","注册页面");
            $this->smarty->assign("noticeUrl","index.php?m=index&c=login&a=reg");
            $this->smarty->display("notice.html");
        }
    }

    function loginout(){
        unset($_SESSION["userlogin"]);
        unset($_SESSION["username"]);
        unset($_SESSION["utime"]);
        unset($_SESSION["uid"]);
        unset($_SESSION["password"]);
        $this->smarty->assign("noticeTitle","退出成功");
        $this->smarty->assign("noticePage","进入首页");
        $this->smarty->assign("noticeUrl","index.php");
        $this->smarty->display("notice.html");
    }
}
?>