
$(function(){
 	$("#addBorrowBtn").click(function(){
		var typename=$("#typename").val();
		var timesum=$("#timesum").val();
		var maxmoney=$("#maxmoney").val();
		var minmoney=$("#minmoney").val();
		var saverFeed=$("#saverFeed").val();
		var invest=$("#invest").val();
		var obj={
			typename:typename,
			timesum:timesum,
			maxmoney:maxmoney,
			minmoney:minmoney,
			saverFeed:saverFeed,
			invest:invest
		}
		$.ajax({
			url:"index.php?m=admin&c=borrow&a=addBorrow",
			type:"post",
			data:obj,
			//dataType:"json",
			success:function(e){
				alert('添加借贷产品成功');
				$("#typename").val("");
				$("#maxmoney").val("");
				$("#minmoney").val("");
				$("#saverFeed").val("");
				$("#invest").val("");
			},
			error:function(e){
				console.log('添加失败');
			}
			
		})
		
 	$(".cancle").click(function(){
 		var id=$(this).parent().find('input').val();
 		obj={
 			id:id
 		}
 		$.ajax({
 			url:'index.php?m=admin&c=borrow&a=deleteBorrow',
 			type:'post',
 			data:obj,
 			success:function(e){
 				alert('终止项目成功');
 			}
 		})
 	})
})