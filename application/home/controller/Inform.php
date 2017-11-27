<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/27
 * Time: 14:38
 */

namespace app\home\controller;


use think\Controller;
use think\Db;
use think\Request;

class Inform extends Controller
{
    //>>小区通知列表
    public function index(){
        //>>获取小区通知的数据
        $informList = Db::table("document")->where("status","=",1)->where("category_id","=",42)->paginate(3);
        //>>获取分页信息
        $pager = $informList->render();
        //>>获取导航菜单
        $channel = Db::table("channel")->where("status","=",1)->select();
        //>>分配数据到视图页面
        $this->assign('channel',$channel);
        $this->assign('informList',$informList);
        $this->assign("pager",$pager);
        //>>显示列表页
        return $this->fetch("index");
    }
    //>>点击下载下一页,由Ajax发出请求
    public function nextpage(){
        //>>获取小区通知的数据
        $informList = Db::table("document")->where("status","=",1)->where("category_id","=",42)->paginate(3);
        return json_encode($informList);
    }
    //>>获取小区通知信息的封面图片路径和更新事件
    public function message(){
        $request = Request::instance();
        $cover_id = $request->post("cover_id");
        $update_time = $request->post("update_time");
        //>>获取通知的封面图片
        $cover_path = get_cover($cover_id,"path");
        //>>将时间戳格式化
        $time = date("Y-m-d H:i:s",$update_time);
        //>>响应数据
        return json_encode(["cover"=>$cover_path,"time"=>$time]);
    }
    //>>显示通知详情页
    public function intro(){
        //>>获取通知的id
        $request = Request::instance();
        $id = $request->get("id");
        //>>增加浏览次数
        Db::table('document')->where('id', $id)->setInc('view');
        //>>获取通知简介
        $inform = Db::table("document")->where("id","=",$id)->find();
        //>>获取发布者信息
        $author = Db::table("ucenter_member")->where("id","=",$inform["uid"])->column("username")[0];
        //>>获取通知详情
        $intro = Db::table("document_article")->where("id","=",$id)->find();
        //>>获取导航菜单
        $channel = Db::table("channel")->where("status","=",1)->select();
        //>>分配数据到视图页面
        $this->assign('channel',$channel);
        $this->assign("inform",$inform);
        $this->assign("author",$author);
        $this->assign("intro",$intro);
        //>>显示页面
        return $this->fetch("intro");
    }
}