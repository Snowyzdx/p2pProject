Page({
  data:{
  },
  onLoad:function(options){
  },
  onTap:function(){
    wx.setStorageSync('account', {});
    wx.navigateTo({
      url: '/pages/regist/regist',
    })
  }
})