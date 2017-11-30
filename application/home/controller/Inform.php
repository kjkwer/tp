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
    //>>点击下载下一页,由Ajax发出请求
    public function nextpage(){
        //>>接收数据
        $request = Request::instance();
        $category_id = $request->get("category_id");
        //>>获取小区通知的数据
        $informList = Db::table("document")->where("status","=",1)->where("category_id","=",$category_id)->order("update_time desc")->paginate(3);
        return json_encode($informList);
    }
    //>>获取文章的封面图片路径和更新时间
    public function message(){
        $request = Request::instance();
        $cover_id = $request->post("cover_id");
        $update_time = $request->post("update_time");
        $category_id = $request->post("category_id");
        //>>获取通知的封面图片
        $cover_path = get_cover($cover_id,"path");
        //>>将更新时间格式化
        $time = date("Y-m-d H:i:s",$update_time);
        //>>获取所属分类
        $category_name = get_category_title($category_id);
        //>>响应数据
        return json_encode(["cover"=>$cover_path,"time"=>$time,"category_name"=>$category_name]);
    }
    //>>参与活动
    public function join(){
        //>>判断用户是否登录
        if (!is_login()){
            return "fail";
        }
        //>>接收参数
        $request = Request::instance();
        $article_id = $request->post("article_id");
        //>>参与活动
        $result = Db::table("member_article")->insert(["member_id"=>is_login(),"article_id"=>$article_id]);
        if ($result){
            return "success";
        }
    }
}