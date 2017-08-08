// pages/logan/loganMsg/loganMsg.js
const config=require('../../../config.js');
const util=require('../../../lib/util.js');
const request=require('../../../lib/request.js');
const api=require('../../../lib/api.js');
Page({
  data:{
    sum:0,//贷款金额
    time:'',//贷款期限
    currentTab:0,
    education_bk:"学历",
    realname:"",
    cardID:"",
    home_address:"",
    disabled01:'',
    disabled02:'',
    disabled03:'',
    disabled04:'',
    companyName:'',//公司名称
    companyTel:'',//公司电话
    companyAddress:'',//公司地址
    post:'职位',//职位
    salaryCardType:'工资卡类型',//工资卡类型
    salaryCard:'',//工资卡号
    relationship:'关系',
    relationshipName:'',
    phone:'',//联系人手机号，
    bankType:'银行卡名',//绑定的银行卡类型
    bankCardID:'',//银行卡号
    itemList01:['初中','高中','专科','本科','硕士研究生','博士研究生'],//学历
    itemList02:['总经理级','经理级','主任级','科长','组长','职员'],//职位
    itemList03:['农业银行','工商银行','交通银行','建设银行'],//工资卡类型
    itemList04:['父母','朋友','同事','兄弟姐妹'],//联系人关系
  },
  onLoad:function(options){
    // 页面初始化 options为页面跳转所带来的参数
    this.setData({
      sum:options.sum,
      time:options.time,
      disabled01:options.disabled01,
      disabled02:options.disabled02,
      disabled03:options.disabled03,
      disabled04:options.disabled04,
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
  //选择学历
  seeEdu:function(){
    var itemList=this.data.itemList01;
    var that=this;
    wx.showActionSheet({
      itemList:itemList,
      success:function(res){
        if(res.tapIndex==0){
            that.setData({
              education_bk:itemList[0]
            })
        }else if(res.tapIndex==1){
            that.setData({
              education_bk:itemList[1]
            })
        }else if(res.tapIndex==2){
          that.setData({
            education_bk:itemList[2]
          })
        }else if(res.tapIndex==3){
          that.setData({
            education_bk:itemList[3]
          })
        }else if(res.tapIndex==4){
          that.setData({
            education_bk:itemList[4]
          })
        }else if(res.tapIndex==5){
          that.setData({
            education_bk:itemList[5]
          })
        }
      },
      fail:function(res){
      }
    });
  },
  // 获取姓名
  getRealname:function(e){
    this.setData({
      realname:e.detail.value
    })
  },
  //获取身份证号码
  getCardID:function(e){
    this.setData({
      cardID:e.detail.value
    })
  },
  //获取住址
  getAddress:function(e){
    this.setData({
      home_address:e.detail.value
    })
  },
  //提交
  subBaseMsg:function(){
    if(this.data.education_bk=="学历"){
      wx.showToast({
          title: '请选择学历',
          duration: 2000
      });
      return;
    }else if(this.data.realname==""){
      wx.showToast({
          title: '请输入姓名',
          duration: 2000
      });
      return;
    }else if(this.data.cardID==""){
      wx.showToast({
          title: '请输入身份证号码',
          duration: 2000
      });
      return;
    }else if(this.data.home_address==""){
      wx.showToast({
          title: '请输入住址',
          duration: 2000
      });
      return;
    }else{
       var data={
         education_bk:this.data.education_bk,
         realname:this.data.realname,
         cardID:this.data.cardID,
         home_address:this.data.home_address
       }
       var that=this;
            wx.showModal({
                title: '确认提交',
                content: '提交之后不能修改了',
                success: function(res) {
                  if (res.confirm) {
                  //向数据库中提交,
                  that.setData({
                    disabled01:'true'
                  })
                  let promise=request({
                    method:'POST',
                    url:api.getUrl('/logan/baseMsg'),
                    data:data
                  }).then((resp)=>{
                      if(resp=='ok'){
                        wx.showToast({
                          title:'提交成功',
                          icon:'success',
                          duration:2000
                        })
                      }
                      wx.navigateTo({
        url: '/pages/logan/confirmPage/confirmPage?sum'+this.data.sum+'&time='+this.data.time,
      })
                  })
                }
              }
            })
    }
  },
  //获取公司信息
  getCompanyName:function(e){//公司名称
    this.setData({
      companyName:e.detail.value
    })
  },
getCompanyTel:function(e){//公司电话
    this.setData({
      companyTel:e.detail.value
    })
},
getCompanyAddress:function(e){//公司地址
  this.setData({
    companyAddress:e.detail.value
  })
},

seePost:function(){//查看职位
  var itemList=this.data.itemList02
  var that=this;
    wx.showActionSheet({
      itemList:itemList,
      success:function(res){
        if(res.tapIndex==0){
            that.setData({
              post:itemList[0]
            })
        }else if(res.tapIndex==1){
            that.setData({
              post:itemList[1]
            })
        }else if(res.tapIndex==2){
          that.setData({
            post:itemList[2]
          })
        }else if(res.tapIndex==3){
          that.setData({
            post:itemList[3]
          })
        }else if(res.tapIndex==4){
          that.setDara({
            post:itemList[4]
          })
        }else if(res.tapIndex==5){
          post:itemList[5]
        }
      },
      fail:function(res){

      }
    })
},


seeCardType:function(){//获取薪水卡类型
   var itemList=this.data.itemList03;
    var that=this;
    wx.showActionSheet({
      itemList:itemList,
      success:function(res){
        if(res.tapIndex==0){
            that.setData({
              salaryCardType:itemList[0]
            })
        }else if(res.tapIndex==1){
          that.setData({
              salaryCardType:itemList[1]
            })
        }else if(res.tapIndex==2){
         that.setData({
              salaryCardType:itemList[2]
            })
        }else if(res.tapIndex==2){
            that.setData({
              salaryCardType:itemList[3]
            })
        } 
      },
    })
},

getSalaryCard:function(e){//工资卡号
  this.setData({
    salaryCard:e.detail.value
  })
},
//提交工作信息
subCompanyMsg:function(){
  if(this.data.companyName==''){
    wx.showToast({
      title:'请输入公司名称',
      duration:2000
    });
    return;
  }else if(this.data.companyTel==''){
    wx.showToast({
      title:'请输入公司电话',
      duration:2000
    });
    return;
  }else if(this.data.companyAddress==''){
      wx.showToast({
      title:'请输入公司地址',
      duration:2000
    });
    return;
  }else if(this.data.post=="职位"){
    wx.showToast({
      title:'请输入职位信息',
      duration:2000
    });
    return;
  }else if(this.data.salaryCardType=='工资卡类型'){
       wx.showToast({
      title:'请输入工资卡类型',
      duration:2000
    });
    return;
  }else if(this.data.salaryCard==''){
    wx.showToast({
      title:'请输入工资卡号',
      duration:2000
    });
    return;
  }else{
     var data={
         companyName:this.data.companyName,
         companyTel:this.data.companyTel,
         companyAddress:this.data.companyAddress,
         post:this.data.post,
         salaryCardType:this.data.salaryCardType,
         salaryCard:this.data.salaryCard
       }
       var that=this;
            wx.showModal({
                title: '确认提交',
                content: '提交之后不能修改了',
                success: function(res) {
                  if (res.confirm) {
                  //向数据库中提交,
                  that.setData({
                    disabled02:'true'
                  })
                  let promise=request({
                    method:'POST',
                    url:api.getUrl('/logan/companyMsg'),
                    data:data
                  }).then((resp)=>{
                      if(resp=='ok'){
                        wx.showToast({
                          title:'提交成功',
                          icon:'success',
                          duration:2000
                        })
                      }
                  })
                }
              }
            });
  }
},



//获取联系人信息
seeRel:function(){
 var itemList=this.data.itemList04
var that=this;
    wx.showActionSheet({
      itemList:itemList,
      success:function(res){
        if(res.tapIndex==0){
            that.setData({
              relationship:itemList[0]
            })
        }else if(res.tapIndex==1){
          that.setData({
              relationship:itemList[1]
            })
        }else if(res.tapIndex==2){
          that.setData({
              relationship:itemList[2]
            })
        }else if(res.tapIndex==2){
            that.setData({
              relationship:itemList[3]
            })
        }
      },
    })
},
getRelationshipName:function(e){
  this.setData({
    relationshipName:e.detail.value
  })
},
getRelationshipPhone:function(e){
  this.setData({
    phone:e.detail.value
  })
},
//提交联系人信息
subRelMsg:function(){
  if(this.data.relationshipName==""){
    wx.showToast({
      title:'请输入联系人姓名',
      duration:2000
    });
    return;
  }else if(this.data.relationship=='关系'){
     wx.showToast({
      title:'请输入联系人关系',
      duration:2000
    });
    return;
  }else{
    var data={
         phone:this.data.phone,
         relationship:this.data.relationship,
         name:this.data.relationshipName
       }
       var that=this;
            wx.showModal({
                title: '确认提交',
                content: '提交之后不能修改了',
                success: function(res) {
                  if (res.confirm) {
                  //向数据库中提交,
                  that.setData({
                    disabled03:'true'
                  })
                  let promise=request({
                    method:'POST',
                    url:api.getUrl('/logan/relationshipMsg'),
                    data:data
                  }).then((resp)=>{
                      if(resp=='ok'){
                        wx.showToast({
                          title:'提交成功',
                          icon:'success',
                          duration:2000
                        })
                      }
                  })
                }
              }
            });
  }
},

seeBankType:function(){//获取绑定银行卡类型
    var itemList=this.data.itemList03;
    var that=this;
    wx.showActionSheet({
      itemList:itemList,
      success:function(res){
        if(res.tapIndex==0){
            that.setData({
              bankType:itemList[0]
            })
        }else if(res.tapIndex==1){
          that.setData({
              bankType:itemList[1]
            })
        }else if(res.tapIndex==2){
         that.setData({
              bankType:itemList[2]
            })
        }else if(res.tapIndex==2){
            that.setData({
              bankType:itemList[3]
            })
        } 
      },
    })
},

getbankCardID:function(e){//获取绑定银行卡号
  this.setData({
    bankCardID:e.detail.value
  })
},
//提交绑定银行卡信息
subBankcardMsg:function(){
  if(this.data.bankType=='银行卡名'){
    wx.showToast({
      title:'请选择银行卡名',
      duration:2000
    });
    return;
  }else if(this.data.bankCardID==''){
    wx.showToast({
      title:'请输入银行卡号',
      duration:2000
    });
    return;
  }else{
    var data={
         bankType:this.data.bankType,
         bankCardID:this.data.bankCardID,
       }
       var that=this;
            wx.showModal({
                title: '确认提交',
                content: '提交之后不能修改了',
                success: function(res) {
                  if (res.confirm) {
                  //向数据库中提交,
                  let promise=request({
                    method:'POST',
                    url:api.getUrl('/logan/bankCardMsg'),
                    data:data
                  }).then((resp)=>{
                      if(resp=='ok'){
                        wx.showToast({
                          title:'提交成功',
                          icon:'success',
                          duration:2000
                        })
                      }
                  })
                }
              }
            });
  }
}
})