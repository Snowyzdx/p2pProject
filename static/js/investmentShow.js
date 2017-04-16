$(function(){
	$("#addInvestment").click(function(){
		var typename=$("#typename").val();
		var timesum=$("#timesum").val();
		var moneysum=$("#moneysum").val();
		var minmoney=$("#minmoney").val();
		var invest=$("#invest").val();
		var obj={
			typename:typename,
			timesum:timesum,
			moneysum:moneysum,
			minmoney:minmoney,
			invest:invest
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