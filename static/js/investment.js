$(function(){
    //添加投资项目
    $("#addInvestment").click(function(){
        var typename=$("#typename").val();
        var timesum=$("#timesum").val();
        var moneysum=$("#moneysum").val();
        var minmoney=$("#minmoney").val();
        var invest=$("#invest").val();
        var pos=$("#pos").val();
        //var type=$("[name='type']").filter(":checked").val();
        var now=new Date();
        var year=now.getFullYear();
        var month=now.getMonth();
        var day=now.getDay();
        var hours=now.getHours();
        var min=now.getMinutes();
        var second=now.getSeconds();
        var type= $(".type").filter(":checked").val();
        var creatDate=year+":"+month+":"+day+":"+hours+":"+min+":"+second;
        var stopDate=year+":"+month+":"+day+7+":"+hours+":"+min+":"+second;
        var num=0;
        var typeCode='i'+year+month+day+hours+min+second;
        var str=$("#imgurl").val();
        var arr=str.split("\\");
        var imgUrl=arr[arr.length-1];

        var obj={
            typename:typename,
            timesum:timesum,
            moneysum:moneysum,
            minmoney:minmoney,
            invest:invest,
            pos:pos,
            imgUrl:imgUrl,
            typeCode:typeCode,
            creatDate:creatDate,
            type:type,
            num:num,
            leftMoney:moneysum,
            stopDate:stopDate
        }
        $.ajax({
            url:"index.php?m=admin&c=investment&a=addInvestment",
            type:"post",
            data:obj,
            success:function(e){
                alert(e);
                $("#typename").val("");
                $("#timesum").val("");
                $("#moneysum").val("");
                $("#minmoney").val("");
                $("#invest").val("");
            },
            error:function(e){
                console.log(e);
            }
        })
    })
    //删除投资项目
    $(".cancle").click(function(){
        //获取投资项目id
        var id=(this.name);
        $.ajax({
            url:"index.php?m=admin&c=investment&a=delInvestment",
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
