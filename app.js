const config=require('./config.js');
const util=require('./lib/util.js');
const request=require('./lib/request.js');
const api=require('./lib/api.js');
App({
  globalData:{
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
    userInfo:{},
    //详情页中的id
    id:0
  },
   onLaunch:function(){
     this.setHomeList();
      if(wx.getStorageSync('account')){//存在
        //判断是否已经登录了
        if(wx.getStorageInfoSync('account').userInfo){//用户已经登录过了,直接跳转到启动页
       wx.redirectTo({
         url: '/pages/start/start'
       })
      }else{//没有登录，进入登录界面
        wx.redirectTo({
          url: '/pages/login/login',
        })
      }
      }else{//不存在，渲染引导页（1.该设备清除了缓存，2.该设备第一次使用）
        wx.redirectTo({
          url: '/pages/welcome/welcome'
        })
      }  
    }, 
//获取首页内容
    getHomeList:function(){
    let promise=request({
      method: 'POST',
      url: api.getUrl('/home/')
     });
      return promise;
    },
  //设置首页内容
    setHomeList:function(){
      this.getHomeList().then((resp)=>{
      if(resp){
        this.globalData.lunboList=resp.lunboList;
        this.globalData.firstInvestList=resp.firstInvestList;
        this.globalData.firstLoganList=resp.firstLoganList;
        this.globalData.secondList=resp.secondList;
        this.globalData.thirdList=resp.thirdList;
        this.globalData.fothList=resp.fothList;
        this.globalData.adList=resp.adList;
        console.log(this.globalData.secondList);
      return;
      }else{
        console.log('没有数据');
      }
      });
    },
})