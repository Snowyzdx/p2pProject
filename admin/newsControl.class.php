<?php
 class newsControl extends main{
 	//显示所有新闻

 	function selectNews(){
 		$db=new db("news");
 		$data=$db->select();
 		$this->smarty->assign("data",$data);

 		$this->smarty->display("showNews.html");
 	}
 	//显示添加新闻
 	function showAddNews(){

 		$this->smarty->display("addShow.html");
 	}

 	//添加新闻’
 	public function addNews(){
 		$title=$_POST['title'];
 		$con=$_POST['con'];
 		$pos=$_POST['pos'];
 		$typecode='n';
 		$imgUrl=$_POST['imgUrl'];
 		if($pos=='轮播'){
 			$pos=0;
 		}else{
 			$pos=1;
 		}
 		$db=new db("news");
 		$db->field("title='{$title}',con='{$con}',pos={$pos},typecode='{$typecode}',imgUrl='{$imgUrl}'")->insert();

 	}

 	public function upload(){
        if(is_uploaded_file($_FILES["file"]["tmp_name"])){
            $filename= UPLOAD_PATH.$_FILES["file"]["name"];
            $filename1= WEB_PATH."upload/".$_FILES["file"]["name"];
            move_uploaded_file($_FILES["file"]["tmp_name"],$filename);
            echo $filename1;
        }
    }
    //删除内容
    public function delCon(){
    	$id=$_POST['id']+0;
		$db=new db('news');
		if($db->where("id={$id}")->del()>0){
			echo '删除成功';
		}
    }
    //查看详细内容
    public function seeCon($arg){
    	$id=$arg['id']+0;
		$db=new db('news');
    	$data=$db->where("id={$id}")->select();
		$this->smarty->assign("data",$data);
    	$this->smarty->display("showCon.html");
    }
 }
?>