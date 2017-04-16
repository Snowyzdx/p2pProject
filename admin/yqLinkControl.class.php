<?php
class yqLinkControl extends main{
    //显示添加友情链接界面linkAdd.html
    public function addlink(){
        $db=new db("yqlink");
        $data=$db->select();
        $this->smarty->assign("data",$data);
        $this->smarty->display("linkAdd.html");
    }
    //添加友情链接方法
    public function linkAdd(){
        $db=new db("yqlink");
        $lname=$_POST["lname"];
        $lurl=$_POST["lurl"];
        if($db->field("lname='{$lname}',lurl='{$lurl}'")->insert()>0){
            echo "<script>alert('添加成功')</script>";
            $db=new db("yqlink");
            $data=$db->select();
            $this->smarty->assign("data",$data);
            $this->smarty->display("linkAdd.html");
        }else{
            echo "<script>alert('添加失败')</script>";
        }
    }
  //显示查询友情链接界面
    function showlink(){
        $db=new db("yqlink");
        $data=$db->select();
        $this->smarty->assign("data",$data);
        $this->smarty->display("showlink.html");
    }
    function showedit($arg){
        $linkid=$arg['linkid'];
        $db=new db("yqlink");
        $data=$db->where("linkid={$linkid}")->select();
        $this->smarty->assign("linkid",$linkid);
        $this->smarty->assign("data",$data);
        $this->smarty->display("linkedit.html");
    }
    function posedit($arg){
        $posid=$arg['posid'];
        $db=new db("position");
        $posname=$_POST["posname"];
        if($db->field("posname='{$posname}'")->where("posid={$posid}")->update()){
            echo "<script>alert('修改推荐位成功')</script>";
            $this->showPos();
        }else{
            echo "<script>alert('修改推荐位失败')</script>";
        }
    }
    //删除推荐位
    function del($arg){
        $posid=$arg['posid'];
        $db=new db("position");
        $result=$db->where("posid={$posid}")->del();
        if($result>0){
            echo "<script>alert('删除成功')</script>";
            $db=new db("position");
            $data=$db->select();
            $this->smarty->assign("data",$data);
            $this->smarty->display("showPos.html");
        }else{
            echo "<script>alert('删除失败')</script>";
        }
    }

}
?>