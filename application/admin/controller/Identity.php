<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/1
 * Time: 2:15
 */

namespace app\admin\controller;


use think\Db;

class Identity extends Admin
{
    //>>已认证会员列表
    public function index(){
        //>>查询已认证的会员
        $lists = Db::table("auth")->select();
        //>>显示页面
        $this->assign("lists",$lists);
        return $this->fetch();
    }
}