var express=require('express');
var router=express.Router();
var mysql=require("../common/mysql");
var async =require("async");
router.use('/',function(req,res) {
    var lunboList = [];//轮播列表
    var firstInvestList = [];//第一列表投资产品
    var firstLoganList=[];//第一列表借贷产品
    var secondList = [];//第二列表
    var thirdList = [];//第三列表(新闻列表)
    var fothList = [];//第四列表
    var adList = [];//广告列表
    var sqls=[];
    sqls[0]= 'select * from investment_type where pos=0 and status=0 order by id desc limit 2';//获取轮播位置的投资产品
    sqls[1] = 'select * from borrow_type where pos=0 and status=0 order by id desc limit 2';//获取轮播位置的借贷产品
    sqls[2] = 'select * from news where pos=0 order by id desc limit 1';//获取轮播处的新闻
    sqls[3]= 'select * from investment_type where pos=1 and status=0 order by id desc limit 2';//获取第一列表处的投资产品
    sqls[4] = 'select * from borrow_type where pos=1 and status=0 order by id desc limit 2';//获取第一列表处的借贷产品
    sqls[5] = 'select * from news where pos=1 order by id desc limit 4';//获取新闻列表
    sqls[6] = 'select * from news where pos=2 order by id desc limit 1';//获取广告
    sqls[7] = 'select * from borrow_type where pos=2 and status=0 order by id desc limit 1'//获取第三列表处的借贷产品
    sqls[8]= 'select * from investment_type where pos=2 and status=0 order by id desc limit 3'//获取第四列表处的投资产品
    //使用async的each方法（注意它和eachSerise还是有区别的）
    async.each(sqls,function(sql,cb){
        mysql.query(sql,function(err,rows){
            if(rows){
                if(sql==sqls[0]||sql==sqls[1]||sql==sqls[2]){
                    rows.forEach(function (obj,index) {
                        lunboList.push(obj);//轮播列表
                    });
                }else if(sql==sqls[3]){
                    rows.forEach(function(obj,index){
                        firstInvestList.push(obj);//第一列表（投资）
                    })
                }else if(sql==sqls[4]){
                    rows.forEach(function(obj,index){
                        firstLoganList.push(obj);//第一列表（借贷）
                    })
                } else if(sql==sqls[5]){
                    rows.forEach(function(obj,index){
                        secondList.push(obj);//新闻列表
                    })
                }else if(sql==sqls[6]){
                    rows.forEach(function(obj,index){
                        adList.push(obj);//广告新闻
                    })
                }else if(sql==sqls[7]){//借贷列表3
                   rows.forEach(function(obj,index){
                       thirdList.push(obj);
                   })
                }else if(sql==sqls[8]){//投资列表4
                    rows.forEach(function(obj,index){
                        fothList.push(obj);
                    })
                }
            }
        cb();
        })
    },function(){
        var data={
            title:'homeData',
            lunboList:lunboList,
            firstInvestList:firstInvestList,
            firstLoganList:firstLoganList,
            secondList:secondList,
            thirdList:thirdList,
            fothList:fothList,
            adList:adList
        }
        res.send(data);
    })
});
module.exports=router;