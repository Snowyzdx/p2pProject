// pages/center/loganCenter/loganPlan/loganPlan.js
Page({
  data:{},
  onLoad:function(options){
    // 页面初始化 options为页面跳转所带来的参数
  },
  showDetail:function(event){
    wx.navigateTo({
     url:"/pages/center/loganCenter/loganDetail/loganDetail"
   })
  },
  returnedLogan:function(){
    wx.navigateTo({
      url: '/pages/center/loganCenter/returnedLogan/returnedLogan'
    })
  },
  chongzhi:function(){
    wx.navigateTo({
      url: '/pages/center/money/money',
    })
  },
  // 弹出还款操作界面
  returnMoneyPage:function(){
    wx.navigateTo({
      url: '/pages/center/loganCenter/returnMoney/returnMoney'
    })
  }
})