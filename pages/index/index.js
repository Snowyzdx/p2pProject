const config=require('../../config.js');
const util=require('../../lib/util.js');
const request=require('../../lib/request.js');
const api=require('../../lib/api.js');
Page({
  data:{
    //首页轮播数据
    lunboList:[],
    //第一列表数据(借贷产品)
    firstInvestList:[],
    //第一列表数据（投资产品）
    firstLoganList:[],
   //第二列表数据(新闻)
    secondList:[],
   //广告列表
    adList:[],
   //第三列表数据（借贷）
    thirdList:[],
   //第四列表数据（投资）
    fothList:[],
  },
  onLoad:function(options){
    wx.showLoading({
        title: '拼命加载中',
    })
    setTimeout(function(){
       wx.hideLoading()
    },2000)
   var app=getApp();
   this.setData({
     lunboList:app.globalData.lunboList,
     firstInvestList:app.globalData.firstInvestList,
     firstLoganList:app.globalData.firstLoganList,
     secondList:app.globalData.secondList,
     adList:app.globalData.adList,
     thirdList:app.globalData.thirdList,
     fothList:app.globalData.fothList
   })
},
 
  onShow(){
    
  },

//产品（新闻）跳转
onProjectTap:function(event){
  var typecode=event.target.dataset.typeid;
  var id=event.target.dataset.id;
  var url='';
  console.log(id);
  if(typecode.charAt(0)=='i'){//投资类型
    url='/pages/invest/invest-detail/invest-detail?id='+id
  }else if(typecode.charAt(0)=='b'){//借贷类型
    url='/pages/logan/logan-detail/logan-detail?id='+id;
  }else if(typecode.charAt(0)=='n'){//新闻类型
    url='/pages/news/show/show?id='+id;
  }
   wx.navigateTo({
     url:url,
  })
},
})