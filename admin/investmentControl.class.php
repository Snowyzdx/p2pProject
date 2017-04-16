<?php
  class investmentControl extends main{
  	//显示投资项目产品
  	public function showInvestment(){
  		$db=new db("investment_type");
  		$data=$db->select();
  		$this->smarty->assign("data",$data);
 		$this->smarty->display("investmentShow.html");
  	}
  	//添加投资项目
  	public function addInvestment(){
      $typename=$_POST["typename"];
      $timesum=substr($_POST["timesum"], 0,1)+0;
      $invest=$_POST["invest"]+0;
      $moneysum=$_POST["moneysum"]+0;
      $minmoney=$_POST["minmoney"]+0.0;
      $auser="Asiazdx";
      $db=new db("investment_type");
      if($db->field("typename='{$typename}',timesum={$timesum},moneysum={$moneysum},minmoney={$minmoney},invest={$invest},auser='{$auser}'")->insert()>0){
         echo "yes";
      }else{
        echo "no";
      }
  	}
    //删除投资项目
    public function delInvestment(){
      $id=$_POST['id'];
      $db=new db("investment_type");
      $db->where("id={$id}")->del();
    }
  }
?>