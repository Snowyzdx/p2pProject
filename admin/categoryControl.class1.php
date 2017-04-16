<?php
class categoryControl extends main{
//显示添加分类界面catAdd.html
    function addcat(){
        $db=new db("category");
        $data=$db->select();
        $result=$this->tree($data,0,0);
        $this->smarty->assign("strees",$result);
        $this->smarty->display("catAdd.html");
    }
//    查询分类（定义成私有方法）
   private function tree($data,$pid,$step){
        global $strees;
        foreach($data as $v){
            if($v["pid"]==$pid){
                $flag=str_repeat("—",$step);
                $v["cname"]=$flag.$v["cname"];
                $strees[]=$v;
                $this->tree($data,$v['cid'],$step+1);
            }
        }
        return $strees;
    }
    //添加分类操作
    function catAdd(){
        $db=new db("category");
        $aname=$_POST["cname"];
        $pid=$_POST["pid"];
        if($db->field("cname='{$aname}',pid='{$pid}'")->insert()>0){
              echo "<script>alert('添加分类成功')</script>";
            $this->addcat();
        }else{
            "<script>alert('添加分类失败')</script>";
        }
    }
    //显示所有分类
    function showcat(){
        $db=new db("category");
        $data=$db->select();
        $this->smarty->assign("trees",$this->tree($data,0,0));
        $this->smarty->display("showcat.html");
    }
    //删除分类
    function del($arg){
        $cid=$arg['cid'];
        $db=new db("category");
        $data=$db->select();
        $sons=$this->hasson($data,$cid);
        //在删除之前先判断一下该分类是否包含子分类
        if($sons>0){
            echo "<script>alert('不能删除')</script>";
           $this->showcat();
        }else{
            $result=$db->where("cid={$cid}")->del();
            if($result){
                echo "<script>alert('删除成功')</script>";
                $this->showcat();
            }else{
                echo "<script>alert('删除失败')</script>";
            }
        }
    }
    //利用递归查询该分类下的所有子分类
    private function hasson($data,$cid){
        global $sons;
//       $cid=intval($cid);
        foreach($data as $v){
            if($v["pid"]==$cid){
                $sons[]=$v;
                $this->tree($data,$v['cid'],0);
            }
        }
        return $sons;
    }
    //显示编辑分类页
    function showedit($arg){
        $cid=$arg['cid'];
        $db=new db("category");
        $data=$db->select();
        $sql="SELECT * FROM category WHERE cid={$cid}";
       $data1= $db->select($sql);
        $pid=$data1[0]['pid'];//获取该分类的pid
        $cname=$data1[0]['cname'];
        $this->smarty->assign("cid",$cid);
        $this->smarty->assign("pid",$pid);//分配pid
        $this->smarty->assign("cname",$cname);
        $this->smarty->assign("strees",$this->tree($data,0,0));
        $this->smarty->display("showedit.html");
    }
    //修改分类信息
    /*
     * 前台传值：
     * 当前操作cid
     * */
    function catedit($arg){
        $cid=$arg['cid'];
        $pid=$_POST["pid"];
        $cname=$_POST["cname"];
        echo $cname;
        $db=new db("category");
       if($db->field("cname='{$cname}'")->where("cid={$cid}")->update()){
           echo "<script>alert('修改分类成功')</script>";
           $this->showcat();
       }else{
           echo "<script>alert('修改分类失败')</script>";
       }
    }
}
?>