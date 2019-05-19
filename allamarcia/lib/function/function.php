<?php

//核心函数
//1.加载配置项 C($sysConfig) C($userConfig)
//2.读取配置项 C('CODE_LEN')
//3.临时动态改变配置项 C('CODE_LEN',20)
//4.C()

function C($var = null,$value =null){
    static $config = array();
    //如果为数组(加载配置项)
    if(is_array($var)){
        $config = array_merge($config,array_change_key_case($var,CASE_UPPER));
        return;
    }
    //如果为字符串(读取或者动态改变配置项)
    if(is_string($var)){
        $var = strtoupper($var);
        //如果有两个参数传递
        if(!is_null($value)){
            $config[$var] = $value;
            return;
        }
        return $config[$var]?$config[$var]:null;
    }
    
    if(is_null($var) && is_null($value)){
        return $config;
    }
}