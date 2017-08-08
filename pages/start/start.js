// pages/start/start.js
Page({
  data:{
    tiper:5
  },
  onLoad:function(options){
    // 页面初始化 options为页面跳转所带来的参数
    var that=this;
    var i=5;
    //计时器事件
    var t1=setInterval(function(){
       i--;
       that.setData({
        tiper:i
      })
    },1000);
    setTimeout(function(){
      clearInterval(t1);
       wx.switchTab({
         url: '/pages/index/index',
       })
    },5000)
  },
  jamp:function(){
    wx.switchTab({
      url: '/pages/index/index',
    })
  }
})