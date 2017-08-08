// pages/logan/logan-detail/logan-detail.js
const config=require('../../../config.js');
const util=require('../../../lib/util.js');
const api=require('../../../lib/api.js');
const request=require('../../../lib/request.js');
Page({
  data:{
    sum:"20000",
    time:"选择借款期限",
    typeCode:'0',
    disabled01:'',
    disabled02:'',
    disabled03:'',
    disabled04:'',
    everyMoney:'',
    flag:1,
  },
  onLoad:function(options){
    // 页面初始化 options为页面跳转所带来的参数
    //用户是否已经提交过部分信息了
  
    let promise=request({
      url:api.getUrl('/logan/loganDetail:id='+options.id),
      method:'GET'
    }).then(resp=>{
      console.log(resp);
    })
    let promise1=request({
            methos:'POST',
            url:api.getUrl('/users/getBaseMsg'),
        }).then((resp)=>{
           if(resp.length>0){
              this.setData({
                disabled01:'true'
              })
           }else{
             this.setData({
               flag:0
             })
           }
        });

        let promise2=request({
            methos:'POST',
            url:api.getUrl('/users/getCompanyMsg'),
        }).then((resp)=>{
            if(resp.length>0){
                 this.setData({
                disabled02:'true'
              })
            }else{
              this.setData({
                flag:0
              })
            }
        });
        let promise3=request({
            methos:'POST',
            url:api.getUrl('/users/getRelationshipMsg'),
        }).then((resp)=>{
             if(resp.length>0){
                 this.setData({
                disabled03:'true'
              })
            }else{
                this.setData({
                  flag:0
                })
            }
        }); 


         let promise4=request({
            methos:'POST',
            url:api.getUrl('/users/getBankCard'),
        }).then((resp)=>{
             if(resp.length>0){
                 this.setData({
                disabled04:'true'
              })
            }else{
              this.setData({
                flag:0
              })
            }
        });
        
  },
  //显示借款期限
  showTimeSum:function(e){
    var that=this;
    wx.showActionSheet({
      itemList:['3个月','6个月','12个月','24个月','48个月'],
      success:function(res){
        if(res.tapIndex==0){
            that.setData({
              time:"3个月"
            })
        }else if(res.tapIndex==1){
            that.setData({
              time:"6个月"
            })
        }else if(res.tapIndex==2){
          that.setData({
            time:"12个月"
          })
        }else if(res.tapIndex==3){
          that.setData({
            time:"24个月"
          })
        }else if(res.tapIndex==4){
          that.setData({
            time:"48个月"
          })
        }
        this.setData({
          erverMoney:this.data.sum/this.data.time
        })
      },
      fail:function(res){
        console.log(res.errMsg);
      }
    });
    
  },
  //获取输入的借款金额
  validate:function(e){
    var money=e.detail.value;
    this.setData({
      sum:money
    })
  },
  //去借款
  toLogan:function(){
    var money=this.data.sum;
    var time=this.data.time;
    if(money=="2~20万"||money<2||money>20||money==""){
        wx.showToast({
          title: '请输入2~20万的借款金额',
          icon: 'fail',
          duration: 2000
})
return;
    }else if(time==0){
       wx.showToast({
          title: '请选择借款期限',
          icon: 'fail',
          duration: 2000
      }) 
      return;
    }else{
      if(this.data.flag==1){
          wx.navigateTo({
            url: '/pages/logan/confirmPage/confirmPage?time='+this.data.time+'&sum='+this.data.sum+'&typCode='+this.data.typeCode,
          })
        }
      wx.navigateTo({
        url: '/pages/logan/loganMsg/loganMsg?sum='+this.data.sum+'&time='+this.data.time+'&disabled01='+this.data.disabled01+'&disabled02='+this.data.disabled02+'&disabled03='+this.data.disabled03+'&disabled04='+this.data.disabled04,
      })
    }
  }
})