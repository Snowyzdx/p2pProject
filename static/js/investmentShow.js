$(function(){
	$("#addInvestment").click(function(){
		var typename=$("#typename").val();
		var timesum=$("#timesum").val();
		var moneysum=$("#moneysum").val();
		var minmoney=$("#minmoney").val();
		var invest=$("#invest").val();
		var pos=$("#pos").val();
		var imgUrl=$("#imgurl").val();
		var type=$("[name='type']").filter(":checked").val();
		console.log("ok");
		console.log(type);
		if(pos=='轮播'){
			pos=0;
		}else if(pos=="首页列表一"){
			pos=1
		}else if(pos=="首页列表二"){
			pos=2
		}else if(pos=="分页列表"){
			pos=3
		}
		var obj={
			typename:typename,
			timesum:timesum,
			moneysum:moneysum,
			minmoney:minmoney,
			invest:invest,
			pos:pos,
			imgUrl:imgUrl
		}
		$.ajax({
			url:"index.php?m=admin&c=investment&a=addInvestment",
			type:"post",
			data:obj,
			success:function(e){
				alert('添加投资项目成功');
				$("#typename").val("");
				$("#timesum").val("");
		    	$("#moneysum").val("");
				$("#minmoney").val("");
				$("#invest").val("");
			},
			error:function(e){
				console.log(e);
				alert('no')
			}
		})
	})
	$(".cancle").click(function(){
		var id=$(this).parent().find('input').val().substr(0,1)+0;
		obj={
			id:id
		}
		console.log(id);
		$.ajax({
			url:'index.php?m=admin&c=investment&a=delInvestment',
			type:'post',
			data:obj,
			success:function(e){
				alert('终止项目成功');
			}
		})
	})
})