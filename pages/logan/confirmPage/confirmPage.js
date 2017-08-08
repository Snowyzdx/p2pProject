// pages/logan/confirmPage/confirmPage.js
const config=require('../../../config.js');
const util=require('../../../lib/util.js');
const api=require('../../../lib/api.js');
const request=require('../../../lib/request.js');
Page({
  data:{
    typeCode:'',
    sum:0,
    time:'',
    saverFeed:0,//平台服务费
    retrunMoney:0,//每月还款
    invest:0,//利息
    disabled:''
  },
  onLoad:function(options){
    // 页面初始化 options为页面跳转所带来的参数
    this.setData({
      typeCode:options.typecode,
      sum:options.sum,
      time:options.time,
      retrunMoney:(this.data.sum+this.data.sum*this.data.invest*this.data.time+this.data.saverFeed)/this.data.time
    })
  },
  confirm:function(){
    var data={
      typeCode:this.data.typeCode,
      time:this.data.time,
      sum:this.data.sum
    }
    let promise=request({
      url:api.getUrl('/logan/addLogan'),
      method:'POST',
      data:data
    }).then((resp)=>{
      if(resp=='ok'){
          wx.showToast({
            title:'申请完成',
            duration: 2000,
            icon:'success',
          });
          this.setData({
            disabled:'true'
          })
      }
    })
  }
})