const config=require('../../../../config.js');
const util=require('../../../../lib/util.js');
const request=require('../../../../lib/request.js');
const api=require('../../../../lib/api.js');
// pages/center/set/resetPws/resetPws.js
Page({
  data:{
    phoneNum:"请输入手机号",
    code:"请输入验证码",
    msg:"",//实际短信发过来的验证码
    username:"",
    pwd01:"000000",
    pwd02:"000000",
    timeTiper:"短信验证码",
    notice01:"",
    notice02:"",
    firstPwd:"",
    secondPwd:"",
    flag:""
  },
  onLoad:function(options){
    // 页面初始化 options为页面跳转所带来的参数
  },
  //获取手机号码并发送短信验证码
  sendMsg:function(){
    var that=this;
    let promise=request({
      method:"POST",
      url:api.getUrl('/util/sendMsg'),
    }).then((resp)=>{
        wx.showModal({
            title: '短信验证码',
            content: '您的短信验证码是：'+resp,
            success: function(res) {
           if (res.confirm) {
               that.setData({
                 msg:resp,
                 code:resp
               })
          }
          }
      })
    })
  },
  //验证验证码是否正确
  valCode:function(e){
    if(e.detail.value!=this.data.msg){
        this.setData({
          notice01:"短信验证码不正确",
          flag:"true"
        })
    }else{
      this.setData({
        notice01:"",
        flag:""
      })
    }
    
  },
  //获取第一次的输入密码
  getFirstPwd:function(e){
    var firstPwd=e.detail.value;
    this.setData({
      firstPwd:firstPwd
    })
  },
  //获取第二次的输入密码,并进行比较
  getSecondPwd:function(e){
    var secondPwd=e.detail.value;
    console.log(secondPwd);
    if(this.data.firstPwd!=secondPwd){
      this.setData({
         notice02:"两次密码不一样",
         flag:""
      })
    }else{
      this.setData({
        notice02:"",
        flag:""
      })
    }
  },
  //获取账号
  getUsername:function(e){
    this.setData({
      username:e.detail.value
    })
  },
  //修改密码
  resetPws:function(){
    request({
      method:"POST",
      url:api.getUrl('/users/resetPwd'),
      data:{
        username:this.data.username,
        password:this.data.pwd01
      }
    }).then((resp)=>{
      if(resp=="修改密码成功"){
           wx.showToast({
           title: resp,
           icon: 'success',
           duration: 3000
         })
      }else{
        wx.showToast({
           title: resp,
           icon: 'loading',
           duration: 3000
         });
        this.setData({
          pwd01:"",
          pwd02:"",
          username:""
        })
      }
    })
  }
})