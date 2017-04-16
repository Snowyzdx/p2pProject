<?php
class showControl extends index
{
    function show($arg){
        global $arr;
        $id = $arg["id"];
        $db = new db("shows");
        $data = $db->where("sid={$id}")->select();
        $title = $data[0]["title"];
        $con = $data[0]["con"];
        $imgurl = $data[0]["imgurl"];
        $status = $data[0]["status"];
        $sid = $data[0]["sid"];
        $db = new db("message");
        $messageData = $db->where("sid={$id}")->select();
        foreach ($messageData as $k => $v) {
            $arr[$k] = $v;
            $db->table = "replay";
            $arr[$k]["son"] = $db->where("mid={$v['mid']}")->select();
        }
        $this->smarty->assign("arr",$arr);
        if($status==0){//普通文章无需登陆
            $this->smarty->assign("data",$data);
            $this->smarty->assign("title",$title);
            $this->smarty->assign("con",$con);
            $this->smarty->assign("imgurl",$imgurl);
            $this->smarty->assign("sid",$sid);
            $this->smarty->display("show.html");
        }else{//需要登陆的文章
            if(isset($_SESSION["userlogin"])){//首先判断一下是否登陆了
                $this->smarty->assign("data",$data);
                $this->smarty->assign("title",$title);
                $this->smarty->assign("con",$con);
                $this->smarty->assign("imgurl",$imgurl);
                $this->smarty->assign("sid",$sid);
                $this->smarty->display("show.html");
            }else{//如果没有登陆，跳转到登陆界面
               // $_SESSION["currenturl"]="index.php?m=index&c=show&a=show";
               // echo "<script>alert('请登录');location.href('index.php?m=index&c=login&a=login')</script>";
                echo "<script>alert('请登录')</script>";
                $this->smarty->display("login.html");

            }

        }

    }
}
?>