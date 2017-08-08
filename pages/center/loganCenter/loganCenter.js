var app=getApp()
Page({
  data:{
    currentTab:0
  },
  onLoad:function(options){
    // 页面初始化 options为页面跳转所带来的参数

  },
  //滑动切换
  swiperTab:function( e ){
    var that=this;
    that.setData({
      currentTab:e.detail.current
    });
  },
  //点击切换
  clickTab: function( e ) {  
    var that = this;  
    if( this.data.currentTab === e.target.dataset.current ) {  
      return false;  
    } else {  
      that.setData( {  
        currentTab: e.target.dataset.current  
      })  
    }  
  },  
//还款计划
returnPlan:function(e){
  wx.navigateTo({
     url:"/pages/center/loganCenter/loganPlan/loganPlan",
  })
},
// 去还款
toReturnMoney:function(){
  wx.navigateTo({
     url:"/pages/center/loganCenter/returnMoney/returnMoney",
  })
},
//展示问题详情
showNews:function(){
  wx.navigateTo({
    url: "/pages/news/show/show",
  })
}
})