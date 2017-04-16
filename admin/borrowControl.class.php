<?php
 class borrowControl extends main{
 	//显示搜有借贷项目产品
 	public function showBorrowMsg(){
 		session_start();
 		$db=new db("borrow_type");
 		$data=$db->select();
 		//print_r($data);
 		$this->smarty->assign("data",$data);
 		$this->smarty->display("borrowShow.html");
 	}
 	//删除借款项目
 	public function deleteBorrow(){
 		$id=$_POST['id'];
 		$db=new db("borrow_type");
 		$db->where("id={$id}")->del();
 	}
 	//添加新的借款项目
 	public function addBorrow(){
 		/*session_start();
 		if(isset($_SESSION["adminLogin"])){
 			
 			echo '{"result":"ok"}';
 		}else{
 			echo '{"result":"no"}';
 		}*/
 		//session_start();
 		$typename=$_POST['typename'];
 		$timesum=substr($_POST["timesum"], 0,1)+0;
 		$maxmoney=$_POST["maxmoney"]+0;
 		$minmoney=$_POST["minmoney"]+0;
 		$saverFeed=$_POST["saverFeed"]+0;
 		$invest=$_POST["invest"]+0;
 		$auser="Asiazdx";
 		$db=new db("borrow_type");
 		if($db->field("typename='{$typename}',timesum={$timesum},maxmoney={$maxmoney},minmoney={$minmoney},saverFeed={$saverFeed},invest={$invest},auser='{$auser}'")->insert()>0){
 			echo 'yes';
 		}

 	}
 }
?>