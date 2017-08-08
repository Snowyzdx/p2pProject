module.exports={
    //为promise设置简单回调（无论成功或失败都执行）
    always(promise,callback){
        promise.then(callback,callback);
    return promise;
}
};
