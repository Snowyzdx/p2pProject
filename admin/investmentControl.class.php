<?php
  class investmentControl extends main{
  	//查询投资项目
  	public function seeInvestmentt(){
        $db=new db("investment_type");
        $type01="投标项目";
        $type02="固定投资项目";
  	    $data01=$db->field("*")->where("type='{$type01}' and status=0")->select();
        $this->smarty->assign("data01",$data01);
         $data02=$db->field("*")->where("type='{$type02}' and status=0")->select();
         $this->smarty->assign("data02",$data02);
         $this->smarty->display("investmentShow.html");

  	}

  	//添加投资项目
  	public function addInvestment(){

      $typename=$_POST["typename"];
      $timesum=substr($_POST["timesum"], 0,2)+0;
      $invest=$_POST["invest"]+0;
      $moneysum=$_POST["moneysum"]+0;
      $minmoney=$_POST["minmoney"]+0.0;
      $auser="Asiazdx";
      $pos=$_POST["pos"];
      if($pos=="轮播"){
        $pos=0;
      }else if($pos=="首页列表一"){
        $pos=1;
      }else if($pos=="首页列表二"){
        $pos=2;
      }else if($pos=="分页列表"){
       $pos=3;

      }
      $imgUrl=$_POST["imgUrl"];
      $status=0;
      $creatDate=$_POST["creatDate"];
      $typeCode=$_POST["typeCode"];
      $type=$_POST["type"];
         $stopDate=$_POST["stopDate"];
         if($type=="固定投资项目"){
            $stopDate="";
         }
      $db=new db("investment_type");

      if($db->field("typename='{$typename}',timesum={$timesum},moneysum={$moneysum},minmoney={$minmoney},invest={$invest},admin='{$auser}',pos={$pos},creatDate='{$creatDate}',typeCode='{$typeCode}',imgUrl='{$imgUrl}',type='${type}',num=0,leftMoney=0,stopDate='{$stopDate}'")->insert()>0){
         echo "添加投资项目成功";
      }else{
        echo "no";
      }
  	}
    //删除投资项目
    public function delInvestment(){
      $id=$_POST['id'];
      $db=new db("investment_type");

      if($db->where("id={$id}")->del()>0){
        echo "该投资项目已删除";
      }
    }
    //上传轮播图片
     public function upload(){
        if(is_uploaded_file($_FILES["file"]["tmp_name"])){
            $filename= UPLOAD_PATH.$_FILES["file"]["name"];
            $filename1= WEB_PATH."wx/upload/".$_FILES["file"]["name"];
            move_uploaded_file($_FILES["file"]["tmp_name"],$filename);
		}
    }
     //查询投资人投资信息
  public function showInvestment(){
    $db=new db("investment");
    $data=$db->select();
    $this->smarty->assign("data",$data);
    $this->smarty->display("investmentDetail.html");

  }
  }

?>