// pages/login/login.js
const config=require('../../config.js');
const util=require('../../lib/util.js');
const request=require('../../lib/request.js');
const api=require('../../lib/api.js');
Page({
  data:{
    touxUrl:'/images/font/touxUrl.png',//默认的头像地址（表示该用户还没有设置头像）
    username:'',
    password:''
  },
  onLoad:function(){
    this.getToux();
  },
  //获取本地存储的头像地址
  getToux:function(){
      if(wx.getStorageSync('touxUrl')){//如果存在
        this.setData({
          touxUrl:wx.getStorageSync('touxUrl')
        })
      }
  },
  //获取用户名
  getUsername:function(e){
    var username=e.detail.value;
    this.setData({
        username:username
    })

  },
  //获取密码
  getPassword:function(e){
      var password=e.detail.value
      this.setData({
        password:password
      })
  },
  // 登陆
  login:function(){
    if(this.data.username==""||this.data.password==""){
      wx.showToat({
        title: '用户名或密码不能为空',
        icon: 'error',
        duration: 3000
      })
      return;
    }
    let promise=request({
      method:"POST",
      url:api.getUrl('/users/login'),
      data:{
        username:this.data.username,
        password:this.data.password
      }
      }).then((resp)=>{
        if(resp.title=='ok'){
          wx.navigateTo({
            url: '/pages/start/start',
          })
          //如果用户之前有设置过头像，则设置本地头像，没有则不设置
          if(resp.touxUrl!=""){
            wx.setStorageSync('touxUrl', resp.touxUrl);
          }
        }
      })
  },
  //跳转到注册界面
  toRegist:function(){
    wx.redirectTo({
      url: '/pages/regist/regist',
    })
  },
  //忘记密码
  findPws:function(){
    wx.navigateTo({
      url: '/pages/center/set/resetPws/resetPws'
    })
  }
})