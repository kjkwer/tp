<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/30
 * Time: 10:40
 */

namespace app\admin\controller;


use think\Controller;
use think\Db;

class Script extends Controller
{
    //>>定时清除过期信息
    public function pastDue(){
        while (1){
            set_time_limit(0);//不限制该脚本执行时间
            $time = time();
            Db::execute("update document set status=-2 WHERE deadline<?",[$time]);
            Db::execute("update rent_sell set status=-2 WHERE deadline<?",[$time]);
            sleep(15);  //每隔15秒执行一致
        }
    }
}