<?php
/*
 * 功能：
 * 1、管理员登陆
 * 2、管理员注册
 * */
 class indexControl extends main{
	public function index(){
		//判断一下管理员是否登陆了，如果登陆就显示管理主界面，否则跳转到登陆界面
		if(isset($_SESSION['adminLogin'])){
			$this->smarty->display("index.html");
		}else{
			$this->login();
		}
	}
	//显示登陆界面
	public function  login(){
		$this->smarty->display("login.html");
	}
	//检查用户登陆
	 function checkLogin(){
		$auser=$_POST['auser'];
		$apwd=$_POST['apwd'];
		$db=new db("admin");
		$data=$db->select();
		foreach($data as $v){
			if($v['auser']==$auser){
				if($v['apwd']==$apwd){
					echo "<script>alert('登陆成功');</script>";
				 $_SESSION['adminLogin']='yes';
				 $_SESSION['auser']=$v['auser'];
					$_SESSION['apwd']=$v['apwd'];
					$_SESSION['aid']=$v['aid'];
					$this->smarty->assign("user",$_SESSION['auser']);
					$this->smarty->display("index.html");//登陆成功进入主页
				}else{
					echo "<script>alert('密码或用户名不正确')</script>";
				}
			}
		}
	}
	//显示注册界面
	public function  reg(){
		$this->smarty->display("reg.html");
	}
	public function addAdmin(){
		$db=new db("admin");
		$auser=$_POST["auser"];
		$apass=$_POST["apass"];
		if($db->field("auser='{$auser}',apass='{$apass}'")->insert()){
			echo "<script>alert('注册成功')</script>";
			$this->smarty->display("login.html");
		}else{
			echo "<script>alert('注册失败')</script>";
		}
	}
	//留言
	public function add($arg){
		$sid=$arg["sid"];
		$con=$_POST["con"];
		$uid=$_POST["uid"];
		$db=new db("message");
	}
}
?>