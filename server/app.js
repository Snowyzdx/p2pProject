var path = require('path');//引入path模块
var mysql=require("./common/mysql");//j引入数据库连接模块
const http = require('http');//引入http模块
const express = require('express');//express为node项目常用的脚手架
const bodyParser = require('body-parser');//常用来解析表单以post方式向服务器发送的请求内容
const session = require("express-session");
const crypto=require("crypto");

/*引入自定义的模块（处理各种业务的模块）
 * */
var users=require('./routes/users');//引入对用户进行各种操作的模块
var list=require('./routes/list');//引入和产品列表页相关的模块
var show=require('./routes/show');//引入和产品详情页相关的模块
var home=require('./routes/home');//引入和首页相关的模块
var logan=require('./routes/logan');//引入和贷款有关的模块
var investment=require('./routes/investment');//引入和投资相关的模块
var util=require('./routes/util');//引入系统公共模块
const app = express();

// 解析表单请求内容parse `application/x-www-form-urlencoded`
app.use(bodyParser.urlencoded({ extended: true }));
// 解析json数据`
app.use(bodyParser.json());
//定义静态公共路径
app.use(express.static(path.join(__dirname,'public')));
global.rootPath=__dirname;//定义全局路径
//对cookie进行加密
app.use(session({ secret: 'keyboard cat', name:"abc",cookie: {  }}));
//app.use(require('./middlewares/route_dispatcher'));//中间架
/*客户端启动,先判断是否已经登录过了*/

/*app.use('/welcome',function(req,res){
    req.session.login="yes";
    if(req.session.login=="yes"){
        res.send('Log');
    }else{
        res.send('noLogin');
    }
});*/
app.use('/home',home);//进入首页
app.use('/users',users);
app.use('/logan',logan);
app.use('/investment',investment);
app.use('/list',list);
app.use('/show',show);
app.use('/util',util);
// 启动server，监听端口号5050
app.listen(5050);
