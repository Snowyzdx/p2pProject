var mysql=require("mysql");
var connection = mysql.createConnection({
    host     : 'localhost',
    port     :  3306,
    user     : 'root',
    password : '',
    database : 'p2pproject'
});
connection.connect();
module.exports=connection;