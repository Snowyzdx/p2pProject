var express=require('express');
var router=express.Router();
//发送短信验证码
router.use('/sendMsg',function(req,res){
    var code='';
    var random = new Array(0,1,2,3,4,5,6,7,8,9);//随机数
    for(var i=0;i<6;i++) {//循环操作
        var index = Math.floor(Math.random() * 10);//取得随机数的索引（0~9）
        code += random[index];//根据索引取得随机数加到code上
    }

    res.send(code);
})
module.exports=router;