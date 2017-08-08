var express=require('express');
var router=express.Router();
var mysql=require("../common/mysql");
//获取投资产品详情
router.use('/invest-detail:id',function(req,res){
    var id=req.params.id;
    var index=id.indexOf("=");
    id=id.substr(++index);
    console.log(id);
    mysql.query('select * from investment_type where id='+id,function(err,row){
        if(row.length>0){
            console.log(row);
            res.send(row);
        }
    });
})

//用户进行投资（添加投资）
router.use('/addInvestment',function(req,res){
    var sum=req.body.sum;
    var investment_type=req.body.investment_type;
    var method=req.body.method;
    mysql.query('',function(){

    })
})
module.exports=router;
