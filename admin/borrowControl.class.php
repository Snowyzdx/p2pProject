<?php
 class borrowControl extends main{
 	//显示搜有借贷项目产品
 	public function showBorrowMsg(){
 		session_start();
 		$db=new db("borrow_type");
 		$data=$db->select();
		$this->smarty->assign("data",$data);
 		$this->smarty->display("borrowShow.html");
 	}
 	//删除借款项目
 	public function delBorrow(){
 		$id=$_POST['id'];
 		$db=new db("borrow_type");
 		if(($db->where("id={$id}")->del())>0){
 			echo '删除借贷项目成功';
 		}
}
 	//添加借款项目
 	public function addBorrow(){
		$typename=$_POST['typename'];
 		$timesum=substr($_POST["timesum"], 0,1)+0;//最长时间
 		$maxmoney=$_POST["maxmoney"]+0;//最高贷款额
 		$minmoney=$_POST["minmoney"]+0;//最低贷款额
 		$saverFeed=$_POST["saverFeed"]+0;//贷款平台服务费
 		$invest=$_POST["invest"]+0;//贷款月利息
 		$admin="Asiazdx";//操作员
		$typecode=$_POST["typeCode"];
		$imgUrl=$_POST["imgUrl"];
		$status=0;
		$db=new db("borrow_type");
 		if($db->field("typename='{$typename}',minmoney={$minmoney},maxmoney={$maxmoney},timesum={$timesum},admin='{$admin}',imgUrl='{$imgUrl}',saverFeed={$saverFeed},invest={$invest},typecode='{$typecode}',status={$status}")->insert()>0){
 			echo '添加借贷项目成功';
 		}else{
 			echo '添加失败';
 		}
	}
 	//上传轮播图片
	 public function upload(){
        if(is_uploaded_file($_FILES["file"]["tmp_name"])){
            $filename= UPLOAD_PATH.$_FILES["file"]["name"];
            $filename1= WEB_PATH."upload/".$_FILES["file"]["name"];
            move_uploaded_file($_FILES["file"]["tmp_name"],$filename);
		}
    }
    //	显示待审核统计
    public function showTologan(){
   		$db=new db("borrowers");
   		$data=$db->where("apply=0")->select();
		$this->smarty->assign("data",$data);
 		$this->smarty->display("toLogan.html");
	 }
    //显示待审核人的相关信用信息
    public function showTologanDetail($arg){
		$username=$arg['username'];
		$typecode=$arg['typecode'];
		$db=new db("borrowers");
		$data=$db->where("typeCode='{$typecode}' and username='{$username}'")->select();
		$db01=new db("borrow_type");
		$data01=$db01->where("typecode='{$typecode}'")->select();//获取相关借贷信息
		$db02=new db("borrowers_base");
		$data02=$db02->where("username='{$username}'")->select();//获取用户基本信息
		$this->smarty->assign("data",$data);
		$this->smarty->assign("data01",$data01);

		$this->smarty->display("loganDetail.html");

    }
    //查询申请人信用信息
    public function showMsgDetail($arg){
    	$username=$arg['username'];
    	$db=new db("borrowers_base");
    	$db01=new db("borrowers_company");//公司相关信息
    	$db02=new db("borrowers_contact");//联系人信息
    	$data=$db->where("username='{$username}'")->select();
    	$data01=$db01->where("username='{$username}'")->select();
    	$data02=$db02->where("username='{$username}'")->select();
		$this->smarty->assign("data",$data);
    	$this->smarty->assign("data01",$data01);
    	$this->smarty->assign("data02",$data02);
    	$this->smarty->display("loganMsgDetail.html");
    }
	//审核通过
	public function pass(){
		//$id=$_POST['$id'];
		$id=$_POST['id']+0;
		$db=new db("borrowers");
		if($db->where("id={$id}")->field("apply=1")->update()){
			echo '审核成功';
			//并向该用户发送信息
		}
	}
	//审核不通过
	public function nopass(){
		$id=$_POST['id']+0;
		$db=new db("borrowers");
		if($db->where("id={$id}")->del()){
			echo '审核失败';
		}
	}
	public function selectBorrowers(){
		$this->smarty->display("yuqi.html");
	}
}
?>