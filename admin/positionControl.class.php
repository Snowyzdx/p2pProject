<?php
class positionControl extends main{
    //显示添加推荐位界面posAdd.html
   public function addpos(){
        $db=new db("position");
        $data=$db->select();
        $this->smarty->assign("data",$data);
        $this->smarty->display("posAdd.html");
    }
    //添加推荐位方法
   public function posAdd(){
        $db=new db("position");
        $posname=$_POST["posname"];
       if($db->field("posname='{$posname}'")->insert()>0){
           echo "<script>alert('添加成功')</script>";
           $db=new db("position");
           $data=$db->select();
           $this->smarty->assign("data",$data);
           $this->smarty->display("posAdd.html");
       }else{
           echo "<script>alert('添加失败')</script>";
       }
    }
    function addcat(){
        $db=new db("category");
        $data=$db->select();
        $result=$this->tree($data,0,0);
        $this->smarty->assign("strees",$result);
        $this->smarty->display("catAdd.html");
    }
    function showPos(){
        $db=new db("position");
        $data=$db->select();
        $this->smarty->assign("data",$data);
        $this->smarty->display("showPos.html");
    }
    function showedit($arg){
        $posid=$arg['posid'];
        $db=new db("position");
        $data=$db->where("posid={$posid}")->select();
        $this->smarty->assign("posid",$posid);
        $this->smarty->assign("data",$data);
        $this->smarty->display("posedit.html");
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