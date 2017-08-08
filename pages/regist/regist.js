const config=require('../../config.js');
const util=require('../../lib/util.js');
const request=require('../../lib/request.js');
const api=require('../../lib/api.js');
// pages/regist/regist.js
Page({
  data:{
    active01:'#aaa',
    active02:'#aaa',
    active03:'#aaa',
    username:'',
    password:'',
    VerifyCode:'',
    code:'',
    notice01:'*用户名为手机号',
    notice02:'*密码为6位以上的字母和数字的组合',
    notice03:'*输入验证码'
  },
  onLoad:function(){
    this.getVerifyCode();
  },
  //获取用户名
  getUsername:function(e){
      //1.判断是否符合格式要求
      var reg = /^1[0-9]{10}$/;
      var username=e.detail.value;
      var flag=reg.test(username);
      if(!flag){//如果不符合手机号码规则
          this.setData({
          active01:'#E43E3E',
          username:'',
          notice01:'用户名必须为手机号码'
        })
      }else{
        //判断该用户明是否已经注册过了
        let promise=request({
           method:'POST',
           url:api.getUrl('/users/registCheck'),
          data:{
            username:username
          },
        }).then((resp)=>{
          if(resp=='0'){
            this.setData({
              active01:'#E43E3E',
              username:'',
              notice01:'该用户名已经注册过了'
          })
          }else{
              this.setData({
              active01:'#aaa',
              username:username,
              notice01:''
            })
          }
        })
      }
  },

//获取密码
getPassword:function(e){
  var password=e.detail.value;
       var reg=/^[A-Za-z0-9]+$/;
      var flag=reg.test(password);
      if(password.length<6||!flag){
          this.setData({
             active02:'#E43E3E',
             password:''
          });
          return 0;
      }else{
        this.setData({
          active02:'#aaa',
          password:password,
          notice02:''
        });
        return 1;
      }
},

//生成验证码
getVerifyCode:function(){
      var ValCode="",
      random = new Array(0,1,2,3,4,5,6,7,8,9,'A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R',  
     'S','T','U','V','W','X','Y','Z');//随机数 
for(var i=0;i<4;i++){//循环操作
   var index = Math.floor(Math.random()*36);//取得随机数的索引（0~35）  
ValCode += random[index];//根据索引取得随机数加到code上 
}
this.setData({
  VerifyCode:ValCode
})
},
//获取输入的验证码
getCode:function(e){
  var code=e.detail.value;
  this.setData({
    code:code
  })
},
//开始注册
addUser:function(e){
  if(this.data.code!=this.data.VerifyCode){
      this.setData({
        active03:'#E43E3E',
        notice03:'*验证码不正确'
      })
  }else{
    this.setData({
        active:'#aaa',
        notice03:''
    })
    if(this.data.username==''||this.data.password==''){
       this.setData({
        active03:'#E43E3E',
        notice03:'*用户名或密码不能为空'
      })
    }else{
      this.setData({
        active03:'#aaa',
        notice03:''
      })
    let promise=request({
    method:'POST',
    url:api.getUrl('/users/addUser'),
    data:{
      username:this.data.username,
      password:this.data.password
    }
  }).then((resp)=>{
    if(resp=='ok'){
       wx.showToast({
        title: '注册成功',
        icon: 'success',
        duration: 3000
        }) 
        //注册成功之后跳转到登录界面
        wx.redirectTo({
          url: '/pages/login/login'
        })  
    }
  })
}
    }
  },
// 注册协议详细内容
proDetail:function(){
  wx.navigateTo({
    url: '/pages/regist/protocol'
  })
},
//跳转到注册界面
toLogin:function(){
  wx.navigateTo({
    url: '/pages/login/login'
  })
}
})