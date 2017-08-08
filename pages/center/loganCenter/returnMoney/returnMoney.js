// pages/center/loganCenter/returnMoney/returnMoney.js
Page({
  data:{
    // 支付方式弹框0表示隐藏状态，1表示显示状态
    showTag:0
  },
  onLoad:function(options){
    // 页面初始化 options为页面跳转所带来的参数
  },
  // 显示“选择支付”弹出框
  showZhifuTag:function(e){
    wx.showActionSheet({
      itemList:['中国农业银行','中国工商银行','中国交通银行','账户余额0.0￥'],
      success:function(res){
        console.log(res.tapIndex)
      },
      fail:function(res){
        console.log(res.errMsg)
      }
    });
  },
  // 显示优惠券弹出框
  showyouhuiTag:function(e){
     wx.showActionSheet({
      itemList:['中国农业银行','中国工商银行','中国交通银行','账户余额0.0￥'],
      success:function(res){
        console.log(res.tapIndex)
      },
      fail:function(res){
        console.log(res.errMsg)
      }
    });
  },
  // 进行还款操作
  returnMoney:function(){
    //判断选取了哪钟方式还款，
    // 余额：先看是否充足->扣除
    // 银行卡：先看是否充足->扣除
  }
})