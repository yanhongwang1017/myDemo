<?php
    session_start();
    header("content-type:text/html;charset=utf-8");
    //单入口文件
    define("COME","yes");
    //1.定义常用的路径
        //文件路径    web路径
        //服务器的根目录
    define("ROOT_PATH",$_SERVER["DOCUMENT_ROOT"]);
        //应用的根目录
    define("APP_PATH",substr($_SERVER["SCRIPT_FILENAME"],0,strrpos($_SERVER["SCRIPT_FILENAME"],"/")));
        //libs文件的目录
    define("LIBS_PATH",APP_PATH."/libs");
        //moudles文件的目录
    define("MODULES_PATH",APP_PATH."/modules");
        //模板的路径
    define("TPL_PATH",APP_PATH."/template");
        //smarty路径
    define("SMARTY_PATH",LIBS_PATH."/smarty");

    //2.定义服务器的路径
        //协议
    define("PORT",strtolower(strchr($_SERVER["SERVER_PROTOCOL"],"/",true)));
        //主机
    define("HOST",$_SERVER["HTTP_HOST"]);
        //项目的路径
    define("APP_URL",substr($_SERVER["SCRIPT_NAME"],0,strrpos($_SERVER["SCRIPT_NAME"],"/")));
        //服务器的项目路径
    define("HTTP_PATH",PORT."://".HOST.APP_URL);
        //地址栏当前的路径
    define("SELF_URL",PORT."://".HOST.$_SERVER["REQUEST_URI"]);

        //静态目录的路径
    define("STATIC_URL",HTTP_PATH."/static");
        //css路径
    define("CSS_URL",STATIC_URL."/css");
        //js路径
    define("JS_URL",STATIC_URL."/js");
        //img路径
    define("IMG_URL",STATIC_URL."/img");

    //3.控制器
    include_once LIBS_PATH."/route.class.php";//路由
    //include_once LIBS_PATH."/smarty.class.php";//自己的smarty库
    include_once SMARTY_PATH."/Smarty.class.php";//Smarty库
    $configs = include_once APP_PATH."/config.php";//配置文件
    include_once LIBS_PATH."/db.class.php";//数据库类
    include_once LIBS_PATH."/function.class.php";
    include_once LIBS_PATH."/main.class.php";
    include_once LIBS_PATH."/code.class.php";
    include_once LIBS_PATH."/session.class.php";
    include_once LIBS_PATH."/tree.class.php";
    include_once LIBS_PATH."/upload.class.php";
    include_once LIBS_PATH."/pages.class.php";

    $routeObj = new route();
    $routeObj->set();