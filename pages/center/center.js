Page({
  data:{

  },
  onLoad:function(options){
    // 生命周期函数--监听页面加载  
  },
  // 查看我的借款情况
  loganCenter:function(event){
   wx.navigateTo({
     url:"/pages/center/loganCenter/loganCenter"
   })
  },
  // 查看我的贷款情况
  investCenter:function(event){
   wx.navigateTo({
     url:"/pages/center/investCenter/investCenter"
   })
  },
  // 查看账户余额
  selectMoney:function(event){
    wx.navigateTo({
      url: '/pages/center/money/money',
    })
  },
  //设置
  shezhi:function(event){
    wx.navigateTo({
      url: '/pages/center/set/set',
    })
  }
})