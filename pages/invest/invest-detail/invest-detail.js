const config=require('../../../config.js');
const util=require('../../../lib/util.js');
const request=require('../../../lib/request.js');
const api=require('../../../lib/api.js');
Page({
  data:{
    id:0,//投资项目编号
    typename:"",//投资产品名称
    timesum:0,//投资产品期数
    moneysum:0,//招标总额
    minmoney:0,//最小投资数额
    invest:0,//利息
    leftMoney:0, //剩余投资金额
    investMoney:0,  //收益金额
    num:0, //累计参与人数,剩余投标金额
    startDate:"",//计息起始日期
    endDate:"",//到期日期
    createDate:'',//开始投标时间
    position:"-750rpx" ,//投资表单位置
    myinvest:0,//要投资的金额数
    myinvestMoney:0, //要投资金额的预计到期总收益
    text:""//固定投资产品
  },
  onLoad:function(options){
    // 生命周期函数--监听页面加载
     wx.showLoading({
         title: '拼命加载中',
    })
    var today=new Date;
     setTimeout(function(){
        wx.hideLoading()
     },1000)
    this.setData({
      id:options.id
    })
    var that=this;
    let promise=request({
      method: 'GET',
      url: api.getUrl('/investment/invest-detail:id='+options.id)
     }).then((resp)=>{

      if(resp[0].type=="投标项目"){//如果是投标项目
          this.setData({
            text:"剩余招标金额",
            num:resp[0].moneysum-resp[0].leftMoney,
            startDate:resp[0].stopDate,
            endDate:resp[0].stopDate+90
          })
      }else{
        this.setData({
          text:'累计参与人数',
          num:0,
          startDate:today
        })
      }
      this.setData({
        typename:resp[0].typename,
        timesum:resp[0].timesum,
        moneysum:resp[0].moneysum,
        minmoney:resp[0].minmoney,
        invest:resp[0].invest,
        investMoney:resp[0].invest*10000*0.01,
      });
  });

  },
 
  
  //跳转到安全保障详情界面
  toSafe:function(){
    wx.navigateTo({
      url: '/pages/invest/safe/safe',
    })
  },
  //跳转资金流向界面
  zijinLx:function(){
    wx.navigateTo({
      url: '/pages/invest/moneyFloat/moneyFloat',
    })
  },
  //跳转到协议范本
  toagreement:function(){
     wx.navigateTo({
      url: '/pages/invest/agreement/agreement',
    })
  },
  //跳转到银行卡类型
  toBanks:function(){

  },
  //参与投资
  join:function(){
    this.setData({
     position:"0rpx" 
    })
  },
  //返回（隐藏投资表单）
  return:function(){
    this.setData({
      position:"-750rpx"
    })
  },
  //跳转到信息确认界面
  creatInvest:function(){
    var myinvest=this.data.myinvest;
    if(myinvest=="0"){
      wx.showModal({
        title: '投资金额不能为0',
        content: '请输入投资金额',
        success: function(res) {
          if (res.confirm) {
          return;
        }
      }
    })
    }else if(myinvest>(this.data.moneysum-this.data.leftMoney)){
      wx.showToast({
        title:'投资经金额已超出剩余金额'
      })
      return;
    }
    else{
      wx.navigateTo({
        url: '/pages/invest/confirmPage/confirmPage?myinvest='+this.data.myinvest+'&invest='+this.data.invest+'&timesum='+this.data.timesum+'&typename='+this.data.typename+'&myinvestMoney='+this.data.myinvestMoney+'&id='+this.data.id,
        success: function(res){
          // success
        },
        fail: function(res) {
          // fail
        },
        complete: function(res) {
          // complete
        }
      })
    }
  },
  //获取我的投资金额
  getmyinvest:function(e){
   
    this.setData({
      myinvest:e.detail.value
    })
  
  },
  //获取要投资金额的预计到期总收益
  getmyinvestMoney:function(e){
    var money=e.detail.value;
    this.setData({
      myinvestMoney:money*this.data.invest*0.01
    })
  }
})