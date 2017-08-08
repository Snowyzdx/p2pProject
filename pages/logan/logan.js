Page({
  data:{
    selected01:true,
    selected02:true,
    selected03:true,
    selected04:true,
    selected05:true,
    selected06:true,
    blod01:200,
    blod02:200,
    blod03:200,
    blod04:200,
    blod05:200,
    active01:"",
    active02:"",
    active03:"",
    active04:"",
    active05:"",
    active06:"",
  },
  zhankai:function(e){
   var id=e.target.dataset.id;
   if(id=="first"){
      var selected=this.data.selected01;
      if(selected==true){
        this.setData({
          selected01:false,
          active01:"180deg",
          blod01:600
        })
      }else{
        this.setData({
          selected01:true,
          active01:"",
          blod01:200
        })
      }
   }else if(id=="second"){
     var selected=this.data.selected02;
      if(selected==true){
        this.setData({
          selected02:false,
          active02:"180deg",
          blod02:600,
        })
      }else{
        this.setData({
          selected02:true,
          active02:"",
          blod02:200
        })
      }
   }else if(id=="third"){
      var selected=this.data.selected03;
      if(selected==true){
        this.setData({
          selected03:false,
          active03:"180deg",
          blod03:600
        })
      }else{
        this.setData({
          selected03:true,
          active03:"",
          blod03:200
        })
      }
   }else if(id=="four"){
      var selected=this.data.selected04;
      if(selected==true){
        this.setData({
          selected04:false,
          active04:"180deg",
          blod04:600
        })
      }else{
        this.setData({
          selected04:true,
          active04:"",
          blod04:200
        })
      }
   }else if(id=="foth"){
      var selected=this.data.selected05;
      if(selected==true){
        this.setData({
          selected05:false,
          active05:"180deg",
          blod05:600
        })
      }else{
        this.setData({
          selected05:true,
          active05:"",
          blod05:200
        })
      }
   }else if(id=="six"){
      var selected=this.data.selected06;
      if(selected==true){
        this.setData({
          selected06:false,
          active06:"180deg",
          blod06:600
        })
      }else{
        this.setData({
          selected06:true,
          active06:"",
          blod06:200
        })
      }
   }
  } ,
  onLoad:function(options){
    // 生命周期函数--监听页面加载
  },
  toLogan:function(){
    wx.navigateTo({
      url: '/pages/logan/logan-detail/logan-detail',
    })
  }
})