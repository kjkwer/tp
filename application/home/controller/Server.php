<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/30
 * Time: 14:54
 */

namespace app\home\controller;


use think\Controller;
use think\Db;

class Server extends Controller
{
    //>>业主认证
    public function index(){
        $channel = Db::table("channel")->where("status","=",1)->select();
        $this->assign('channel',$channel);
        //>>显示页面
        return $this->fetch();
    }
    //>>生活贴士(小区通知、便民服务、小区活动)
    public function live(){
        //>>查询这三个分类的信息
        $message = Db::table("document")->where("category_id","in",[42,45,48])->where("status","=",1)->order("update_time desc")->paginate(3);
        //>>获取导航菜单
        $channel = Db::table("channel")->where("status","=",1)->select();
        /* 模板赋值并渲染模板 */
        $this->assign('channel',$channel);
        $this->assign('informList', $message);
        //>>显示列表页
        return $this->fetch("");
    }
    //>>Ajac分页
    public function ajaxLive(){
        //>>查询这三个分类的信息
        $informList = Db::table("document")->where("category_id","in",[42,45,48])->where("status","=",1)->order("update_time desc")->paginate(3);
        return json_encode($informList);
    }
}