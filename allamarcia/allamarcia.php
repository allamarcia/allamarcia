<?php

final class allamarcia{
    
    public static function run(){
        
        self::_set_const();
        self::_create_dir();
        self::_import_file();
        application::run();
        
    }
    
    //设置常量
    private static function _set_const(){
        
        $path = str_replace('\\','/',__FILE__);
        //框架目录
        define('ALLAMARCIA_PATH',dirname($path));
        //框架配置目录
        define('CONFIG_PATH',ALLAMARCIA_PATH.'/config');
        //框架数据目录
        define('DATA_PATH',ALLAMARCIA_PATH.'/data');
        //框架库目录
        define('LIB_PATH',ALLAMARCIA_PATH.'/lib');
        //框架核心目录
        define('CORE_PATH',LIB_PATH.'/core');
        //框架函数目录
        define('FUNCTION_PATH',LIB_PATH.'/function');
        //项目根目录
        define('ROOT_PATH',dirname(ALLAMARCIA_PATH));
        //应用目录
        define('APP_PATH',ROOT_PATH.'/'.APP_NAME);
        //应用配置目录
        define('APP_CONFIG_PATH',APP_PATH.'/config');
        //应用控制器目录
        define('APP_CONTROLLER_PATH',APP_PATH.'/controller');
        //应用模板目录
        define('APP_TPL_PATH',APP_PATH.'/tpl');
        //应用公共文件目录
        define('APP_PUBLIC_PATH',APP_TPL_PATH.'/public');
    }
    
    //创建文件夹
    private static function _create_dir(){
        $arr = array(
            APP_PATH,
            APP_CONFIG_PATH,
            APP_CONTROLLER_PATH,
            APP_TPL_PATH,
            APP_PUBLIC_PATH
        );
            
        foreach($arr as $v){
            is_dir($v) || mkdir($v,0777,true);
        }
        
    }
    
    //载入框架核心
    private static function _import_file(){
        
        $fileArr = array(
            FUNCTION_PATH.'/function.php',
            CORE_PATH.'/controller.class.php',
            CORE_PATH.'/application.class.php'
        );
            
        foreach($fileArr as $v){
            require_once $v;
        }
    }
}

allamarcia::run();
