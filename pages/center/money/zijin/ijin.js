// pages/center/money/zijin/ijin.js
Page({
  data:{},
  onLoad:function(options){
    // 页面初始化 options为页面跳转所带来的参数
  },
  onReady:function(){
    // 页面渲染完成
  },
  //充值
  chongzhi:function(){
    wx.navigateTo({
      url: '/pages/center/money/money',
    })
  },
  // 提现
  tixian:function(){
     wx.navigateTo({
       url: '/pages/center/money/tixian/tixian',
     })
  },
  // 资金明细
  moneyDetail:function(){
    wx.navigateTo({
      url: '/pages/center/money/moneyDetail/moneyDetail',
    })
  }
})