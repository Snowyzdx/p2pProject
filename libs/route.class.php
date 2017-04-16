<?php
header("Content-Type:text/html;charset=utf-8");
 class route{
	static $module;//模块（文件夹名）
	static $control;//控制（文件名）
	static $action;//动作（文件中的某一个方法）
	static $param;//方法中用到的参数
	 function init(){
		//self::类似于this的作用，只是用在静态的成员变量中
		self::$module=self::getM();
		self::$control=self::getC();
		self::$action=self::getA();
		self::$param=self::getP();
		$url=ROUTE_PATH.self::$module."/".self::$control."Control.class.php";
		if(is_file($url)){
			include $url;
			 $classname=self::$control."Control";
			 $obj=new $classname();
			if(method_exists($obj,self::$action)){
				call_user_func_array(array($obj,self::$action),array(self::$param));
			 }else{
			 	echo "该方法不存在";
			 }
		}else{
			echo $url."不存在";
		}
		
	}
	function getM(){
		//判断是否设置或为空，默认返回index
		return(isset($_GET['m'])&&!empty($_GET['m'])?$_GET['m']:"index");
	}
	function getC(){
		return(isset($_GET['c'])&&!empty($_GET['c'])?$_GET['c']:"index");
	}
	function getA(){
		return(isset($_GET['a'])&&!empty($_GET['a'])?$_GET['a']:"index");
	}
	 function getP(){
		 $id=isset($_GET['id'])?$_GET['id']:"";
		 $cid=isset($_GET['cid'])?$_GET['cid']:"";
		 $userid=isset($_GET['userid'])?$_GET['userid']:"";
		 $posid=isset($_GET['posid'])?$_GET['posid']:"";
		 return array(
			 "id"=>$id,
			 "cid"=>$cid,
			 "userid"=>$userid,
			 "posid"=>$posid
		 );
	 }
}
?>