<?php
class indexControl extends index{
    //查询所有分类
    function index(){
        global $array;
        $db = new db("category");
        $data = $db->select();
        function aa($data,$cid){
            $i =0;
            foreach($data as $v){
                //var_dump($v);
                if($v["pid"]==$cid) {
                    $arr[$i] = $v;
                    //var_dump($v);
                    foreach ($data as $v1) {
                        if ($v["cid"] == $v1["pid"]) {
                            $arr[$i]["son"][]= $v1;
                            // var_dump($arr[$i]["son"]);
                        }

                    }
                    $i++;
                }
            }
            return $arr;
        }
        $this->smarty->assign("menu", aa($data,0));
        $this->smarty->assign("lastnews",$this->lastnews());
        $this->smarty->assign("todaynews",$this->todaynews());
        $this->smarty->assign("lunbo",$this->lunbo());
        $this->smarty->display("index.html");
    }
    //查询指定分类下的所有新闻
    function lists($arg){
        $cid = $arg["cid"];
        $db = new db("shows");
        $data = $db->where("cid = {$cid}")->select();
        $this->smarty->assign("data",$data);
        $this->smarty->display("lists.html");
		}
    //查询最近动态
    function lastnews(){
        $db=new db("shows");
        $data=$db->where("posid=1")->select();
        if($data){
            return $data;
        }else{
            echo "查询最近动态失败";
        }

    }
    //查询轮播
    function lunbo(){
        $db=new db("shows");
        $data=$db->where("posid=9")->select();
        if($data){
            return $data;
        }else{
            echo "查询轮播图失败";
        }
    }
    //查询今日头条
    function todaynews(){
        $db=new db("shows");
        $data=$db->where("posid=2")->select();
        if($data){
            return $data;
        }else{
            echo "查询今日头条失败";
        }
    }
//特别推荐
function specialnews(){
    $db=new db("shows");
    $data-$db->where("")->select();
}
}





?>