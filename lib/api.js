var config=require('../config.js');
module.exports={
    getUrl(route){
    return `http://${config.host}${config.port}${route}`;
    }
}