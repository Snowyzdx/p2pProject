<?php
define("ROUTE_PATH", dirname($_SERVER['SCRIPT_FILENAME'])."/");
define("WEB_PATH", dirname("http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'])."/");
define("WEB_URL", "http://".$_SERVER['HTTP_HOST'].$_SERVER['SCRIPT_NAME']);
define("CSS_PATH",WEB_PATH."static/css/");
define("JS_PATH",WEB_PATH."static/js/");
define("IMG_PATH",WEB_PATH."static/images/");
define("UPLOAD_PATH",ROUTE_PATH."upload/");
include ROUTE_PATH."libs/smarty-3.1.30/libs/Smarty.class.php";
include ROUTE_PATH."libs/main.class.php";
include ROUTE_PATH."libs/index.class.php";
include ROUTE_PATH."public/db.class.php";
include ROUTE_PATH."libs/route.class.php";
$route=new route();
$route->init();
?>

