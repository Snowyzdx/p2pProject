$(function(){
    //添加借贷项目
    $("#addBorrowBtn").click(function(){
        var typename = $("#typename").val();
        var timesum = $("#timesum").val();
        var maxmoney = $("#maxmoney").val();
        var minmoney = $("#minmoney").val();
        var saverFeed = $("#saverFeed").val();
        var invest = $("#invest").val();
        var pos=$("#pos").val();
        if(pos=="轮播"){
            pos=0;
        }else if(pos=="首页列表一"){
            pos=1;
        }else if(pos=="首页列表二"){
            pos=2;
        }
        var time = new Date();
        var year = time.getFullYear();
        var month = time.getMonth();
        var day = time.getDate();
        var hours=time.getHours();
        var min=time.getMinutes();
        var second=time.getSeconds();
        var typeCode='b'+year+month+day+hours+min+second;
        var arr=$(".file").val().split("\\");
        var imgUrl=arr[arr.length-1];
        var obj = {
            typename: typename,
            timesum: timesum,
            maxmoney: maxmoney,
            minmoney: minmoney,
            saverFeed: saverFeed,
            invest: invest,
            pos:pos,
            typeCode:typeCode,
            imgUrl:imgUrl
        };
        $.ajax({
            url: "index.php?m=admin&c=borrow&a=addBorrow",
            type: "post",
            data: obj,
            success: function (e) {
                alert(e);
                $("#typename").val("");
                $("#maxmoney").val("");
                $("#minmoney").val("");
                $("#saverFeed").val("");
                $("#invest").val("");
                $("#pos").val("");
                $(".file").val("");
            }
        })
    });
//终止项目
    $(".cancle").click(function(){
        var id=(this.name);
        $.ajax({
            url:"index.php?m=admin&c=borrow&a=delBorrow",
            type:"post",
            data:{
                id:id
            },
            success:function(e){
                alert(e)
            },
            error:function(e){
                alert(e);
            }
        })
    })
})
