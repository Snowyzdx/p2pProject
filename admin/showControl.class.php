<?php
class showControl extends main{
    //查询新闻
    function selectNews(){
        $db=new db("news");
        $data=$db->select();
        echo 'ok';
        $this->smarty->assign("data",$data);
        $this->smarty->display("showNews.html");
    }
    //显示添加内容界面
    //function showadd(){
    //    $db=new db("category");
    //    $data=$db->select();
    //    $result=$this->tree($data,0,0);
    //    $result2=$this->selecttag();
    //    $result3=$this->selectpos();
    //    $this->smarty->assign("pos",$result3);
    //    $this->smarty->assign("data",$result2);
    //    $this->smarty->assign("strees",$result);
    //    $this->smarty->display("showcon.html");
    //}
    //查询所有标签
    //function selecttag(){
    //    $db=new db("tag");
    //    $data=$db->select();
    //    return $data;
    //}
    //查询所有的推荐位
    //function selectpos(){
    //    $db=new db("position");
    //    $data=$db->select();
    //    return $data;
    //}
    //private function tree($data,$pid,$step){
    //    global $strees;
    //    foreach($data as $v){
    //        if($v["pid"]==$pid){
    //            $flag=str_repeat("—",$step);
    //            $v["cname"]=$flag.$v["cname"];
    //            $strees[]=$v;
    //            $this->tree($data,$v['cid'],$step+1);
    //        }
    //    }
    //    return $strees;
    //}
    //数据库中添加内容
    //function addshow(){
    //    session_start();
    //    $title = $_POST["title"];
    //    $con = $_POST["con"];
    //    $imgurl = $_POST["imgurl"];
    //    $cid = $_POST["cid"];
    //    $status = $_POST["status"];
    //    $array1=$_POST['tagname'];
    //    $posid=$_POST['posname'];
    //    $txt1= implode(".",$array1);
    //    $aid =4;
    //    $url = WEB_URL."?m=index&c=show&a=show";
    //    $db = new db("shows");
    //    if($db->field("tid='{$txt1}',posid='{$posid}',title = '{$title}',con = '{$con}',imgurl = '{$imgurl}',cid = {$cid},status = {$status},aid = {$aid}")->insert()>0){
    //        $db->field("url = '{$url}&id={$db->db->insert_id}'")->where("sid = '{$db->db->insert_id}'")->update();
    //       $this->showadd();
    //        echo "<script>alert('上传内容成功！')</script>";
    //    }else{
    //        echo "<script>alert('上传内容失败！')</script>";
    //    }
    //}
    //public function upload(){
    //    if(is_uploaded_file($_FILES["file"]["tmp_name"])){
    //        $filename= UPLOAD_PATH.$_FILES["file"]["name"];
    //        $filename1= WEB_PATH."wx/upload/".$_FILES["file"]["name"];
    //        move_uploaded_file($_FILES["file"]["tmp_name"],$filename);
    //        echo $filename1;
    //    }
    //}
}
?>