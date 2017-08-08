var express=require('express');
var router=express.Router();
var mysql=require("../common/mysql");
var session=require("express-session");
//
router.use('/baseMsg',function(req,res){
    var education_bk=req.body.education_bk;
    var realname=req.body.realname;
    var cardID=req.body.cardID;
    var home_address=req.body.home_address;
    var username=session.username;
    var sql='insert into borrowers_base (education_bk,realname,cardID,home_address,username) values("'+education_bk+'","'+realname+'","'+cardID +'","'+home_address+'","'+username+'")';
    mysql.query(sql,function(err,result){
        if(result){
            res.send('ok');
        }
    })
})
//�ύ��˾��Ϣ
router.use('/companyMsg',function(req,res){
    var username=session.username;
    var companyName=req.body.companyName;
    var companyTel=req.body.companyTel;
    var companyAddress=req.body.companyAddress;
    var post=req.body.post;
    var salaryCardType=req.body.salaryCardType;
    var salaryCard=req.body.salaryCard;
    var sql='insert into borrowers_company (username,companyName,companyTel,companyAddress,post,salaryCardType,salaryCard) values("'+username+'","'+companyName+'","'+companyTel+'","'+companyAddress+'","'+post+'","'+salaryCardType+'","'+salaryCard+'")';
    mysql.query(sql,function(err,result){
        if(result){
            res.send('ok');
        }else{
            console.log(err);
        }
    })
});
//添加联系人信息
router.use('/relationshipMsg',function(req,res){
    var username=session.username;
    var relationship=req.body.relationship;
    var name=req.body.name;
    var phone=req.body.phone;
    var sql="insert into borrowers_contact (username,relationship,name,phone) values('"+username+"','"+relationship+"','"+name+"','"+phone+"')";
    mysql.query(sql,function(err,result){
        if(result){
            res.send('ok');
        }else{
            console.log(err);
        }
    })
});
//绑定银行卡
router.use('/bankCardMsg',function(req,res){
    var username=session.username;
    var bankType=req.body.bankType;
    var bankCardID=req.body.bankCardID;
    var sql='insert into bank_card (username,bankType,bankCardID) values("'+username+'","'+bankType+'","'+bankCardID+'")';
    mysql.query(sql,function(err,result){
        if(result){
            res.send('ok');
        }
    })
});
//添加贷款申请
router.use('/addLogan',function(req,res){
    var time=req.body.time;
    var sum=req.body.sum;
    var typeCode=req.body.typeCode;
    var apply=1;
    var username=session.username;
    var sql='insert into borrowers (username,sum,time,typeCode,apply) values("'+username+'",'+sum+',"'+time+'","'+typeCode+'",'+apply+')';
    mysql.query(sql,function(err,result){
        if(result){
            res.send('ok');
        }else{
            console.log(err);
        }
    })
})
//获取贷款详情信息
router.use('/loganDetail:id',function(req,res){
    var id=req.params.id;
    console.log(id);
    var sql='select * from borrow_type where id='+id;
    mysql.query(sql,function(err,rows){
        if(rows){
            res.send(rows);
        }else{
            console.log(err);
        }
    })
//还款
    router.use('/retrunMoney',function(req,res){

    })
})
module.exports=router;
