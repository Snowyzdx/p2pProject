<?php
 class messageControl extends index{
     //添加留言
     function add(){
         if(isset($_SESSION["userlogin"])){
             $sid=$_POST["sid"];
             $con=$_POST["con"];
             $uid=$_SESSION["uid"];
             $db=new db("message");
             if($db->filed("con='{$con}',uid={$uid},sid={$sid}")->insert()){
                 echo '{"result":"ok"}';
             }
         }else{
             $_SESSION["currenturl"]="index.php?m=index&c=show&a=show&id={$sid}";
             echo '{"result":"error"}';
         }
     }
     function replay()
     {
         $con = $_POST["con"];
         $mid = $_POST["mid"];
         $uid = $_SESSION["uid"];
         $db = new db("replay");
         if ($db->field("con='{$con}',mid='{$mid}',uid='{$uid}'")->insert()) {
             echo '{"result":"ok"}';
         }

     }
 }
?>