<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/30
 * Time: 16:35
 */

namespace app\home\controller;


use think\Controller;
use think\Db;

class RentSell extends Controller
{
    public function index(){
        //>>获取租售信息
        $rents = Db::table("rent_sell")->where("type","=",1)->where("status","=",1)->select();
        $sells = Db::table("rent_sell")->where("type","=",2)->where("status","=",1)->select();
        //>>获取导航菜单
        $channel = Db::table("channel")->where("status","=",1)->select();
        /* 模板赋值并渲染模板 */
        $this->assign('rents',$rents);
        $this->assign('sells', $sells);
        $this->assign('channel',$channel);
        //>>显示页面
        return $this->fetch();
    }
    public function intro(){
        //>>获取参数
        $id = $this->request->param("id");
        $messages = Db::table("rent_sell")->where("id","=",$id)->find();
        //>>获取导航菜单
        $channel = Db::table("channel")->where("status","=",1)->select();
        /* 模板赋值并渲染模板 */
        $this->assign('channel',$channel);
        $this->assign('message',$messages);
        //>>显示页面
        return $this->fetch();
    }
}