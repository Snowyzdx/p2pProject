$(function(){
    var num=3;
    setInterval(function(){
        num--;
        $("span").html(num);
        if(num==0){
            location.href=$("a").attr('href');
        }
    },1000)
})