var express=require('express');
var router=express.Router();
var mysql=require("../common/mysql");
var crypto=require("crypto");
var session=require("express-session");
//用户登录
router.use('/login',function(req,res){
    var username=req.body.username;
    var password=req.body.password;
    var md5=crypto.createHash('md5');
    md5.update(password);
    password=md5.digest('hex');
    mysql.query('select * from user where username="'+username+'" and password="'+password+'"',function(err,row){
        if(row.length>0){
           session.logined=true;
           session.username=username;
            session.cashBalance=row[0].cashBalance;
            data={
                title:"ok",
                touxUrl:row[0].imgUrl
            }
            res.send(data);
        }
    })
})
//判断是否已经有该用户了
router.use('/registCheck',function(req,res){
    var username=req.body.username;
    mysql.query('select * from user where username='+username,function(err,row){
        if(!err){
            if(row.length==0){
                res.send('1');
            }else{
                res.send('0');
            }
        }
    })
})
//注册
router.use('/addUser',function(req,res){
    var username=req.body.username;
    var password=req.body.password;
    //对密码进行加密
    var md5=crypto.createHash('md5');
    md5.update(password);
    password=md5.digest('hex');
    mysql.query('insert into user(username,password) values("'+username+'","'+password+'")',function(err,result){
        if(result){

            res.send('ok');
        }else{
            console.log(err);
        }
    })
})
//修改用户密码
router.use('/resetPwd',function(req,res){
    var username=req.body.username;
    var password=req.body.password;
    mysql.query('select * from user where username='+username,function(err,row){
        if(row){
            mysql.query('update user set password="'+password+'"where username='+username,function(err,result){
                if(result){
                    res.send("修改密码成功")
                }else{
                    console.log(err);
                }
            })
        }else{
            res.send("该账号不存在")
        }
    })
})
//查询账户余额
router.use('/selectMoney',function(req,res){
    var cashBalance=session.cashBalance;
    var sum=req.body.sum;
    if(sum>cashBalance){
        res.send('no');
    }else{
        res.send('ok');
    }
})
//进行投资
router.use('/addInvestment',function(req,res){
    var username=session.username;
    var sum=req.body.sum;
    var investment_type=req.body.investment_type;
    var method=req.body.methodCode;
    mysql.query('insert into investment (username,sum,investment_type,method) values('+username+','+sum+','+investment_type+','+method+')',function(err,result){
        if(result){//说明添加成功
            session.cashBalance=session.cashBalance-sum;
            mysql.query('update user set cashBalance='+session.cashBalance+' where username="'+username+'"',function(err,result){
                if(result){
                    res.send('ok');
                }else{
                    console.log(err);
                }
            })
        }else{
            console.log(err);
        }
    })
});
//获取用户基本信息
router.use('/getBaseMsg',function(req,res){
    var username=session.username;
    var sql='select * from borrowers_base where username='+username;
    mysql.query(sql,function(err,row){
        if(!err){
            res.send(row);
        }
    })
})
//查询用户公司信息
router.use('/getCompanyMsg',function(req,res){
    var username=session.username;
    var sql='select * from borrowers_company where username='+username;
    mysql.query(sql,function(err,row){
        if(!err){
            res.send(row);
        }
    })
});
//查询用户联系人信息
router.use('/getRelationshipMsg',function(req,res){
    var username=session.username;
    var sql='select * from borrowers_contact where username='+username;
    mysql.query(sql,function(err,row){
        if(!err){
            res.send(row);
        }
    })
});
//查询用户绑定银行卡信息
router.use('/getBankCard',function(req,res){
    var username=session.username;
    var sql='select * from bank_card where username='+username;
    mysql.query(sql,function(err,row){
        if(!err){
            res.send(row);
        }
    })
})
module.exports=router;