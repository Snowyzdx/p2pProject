// pages/center/set/set.js
Page({
  data:{},
  onLoad:function(options){
    // 页面初始化 options为页面跳转所带来的参数
  },
  setmsg:function(){
    wx.navigateTo({
      url: '/pages/center/set/personMsg/personMsg',
    })
  }
})