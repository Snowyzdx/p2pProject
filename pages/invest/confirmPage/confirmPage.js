const config=require('../../../config.js');
const util=require('../../../lib/util.js');
const request=require('../../../lib/request.js');
const api=require('../../../lib/api.js');
Page({
  data:{
    myinvest:0,//本次要投资的金额
    typename:'',//投资产品名称
    timesum:0,//投资时长
    invest:0,//投资利息
    myinvestMoney:0,//要投资金额的预计到期总收益
    flag:"true",//默认情况是选中的
    position:'-750rpx',//默认情况下是隐藏
    methodText:'到期退出',//到期处理方式
    methodCode:0,//到期退出方式编码
    currentTab:0,//选项卡
    id:0,//投资项目id
  },
  onLoad:function(options){
    // 页面初始化 options为页面跳转所带来的参数
    this.setData({
      myinvest:options.myinvest,
      typename:options.typename,
      timesum:options.timesum,
      invest:options.invest,
      myinvestMoney:options.myinvestMoney,
      id:options.id
    })
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
 //选择到期处理方式
 selectMethod:function(e){
  this.setData({
    position:"0rpx"
  })
 },
 //返回
 retrun:function(){
    this.setData({
      position:'-750rpx'
    })
 },
//获取优惠券详情
toDetail:function(){
  console.log('获取优惠券详情')
},
//提交订单,
submit:function(e){
  //提交之前判断一下用户的账户余额资金是否充足，
  //获取账户余额
  var sum=this.data.myinvest
let promise=request({
      method: 'POST',
      url: api.getUrl('/users/selectMoney'),
      data:{
        sum:sum
      }
}).then((resp)=>{
  if(resp=='no'){
    wx.showModal({
      title: '余额不足',
      content: '前去充值？',
      success: function(res) {
        if (res.confirm) {
          wx.navigateTo({
            url:'/pages/center/money/money',
          })
        } else if (res.cancel) {
          console.log('用户点击取消')
        }
      }
    })
  }else{
  //账户余额充足的情况，添加投资项目
  var data={
    sum:sum,
    investment_type:this.data.id,
    methodCode:this.data.methodCode,
  }
  let promise=request({
      method: 'POST',
      url: api.getUrl('/users/addInvestment'),
      data:data,
     }).then((resp)=>{
       if(resp=='ok'){
          wx.showToast({
            title: '投资成功',
            icon: 'success',
            duration: 3000
          })
       }
     })
  }
})

}

})