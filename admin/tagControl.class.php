<?php
class tagControl extends main{
    //显示添加标签界面
    public function addtag(){
        $db=new db("tag");
        $data=$db->select();
        $this->smarty->assign("data",$data);
        $this->smarty->display("tagAdd.html");
    }
    //添加标签方法
    function tagAdd(){
        $tname=$_POST["tname"];
        $db=new db("tag");
        if($db->field("tname='{$tname}'")->insert()>0){
            echo "<script>alert('添加标签成功')</script>";
            $this->addtag();
        }else{
            echo "<script>alert('添加标签失败')</script>";
        }
    }
    function showtag(){
        $db=new db("tag");
        $data=$db->select();
        $this->smarty->assign("data",$data);
        $this->smarty->display("showTag.html");
    }
    //显示修改标签界面
    function showedit($arg){
        $tid=1;
        $db=new db("tag");
        $data=$db->where("tid={$tid}")->select();
        $this->smarty->assign("tid",$tid);
        $this->smarty->assign("data",$data);
        $this->smarty->display("tagedit.html");
    }
    //修改标签方法

    //删除标签方法

}
?>