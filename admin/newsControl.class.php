<?php
 class newsControl extends main(){
 	//显示所有新闻
 	function selectNews(){
 		$db=new db("news");
 		$data=$db->select();
 		$this->smarty->assign("data",$data);
 		$this->smarty->display("showNews.html");
 	}
 	//添加新闻
 	function addNews(){
 		$db=new db("news");
 		
 	}
 }
?>