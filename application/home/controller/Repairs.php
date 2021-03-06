<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/27
 * Time: 11:10
 */

namespace app\home\controller;


use think\Controller;
use think\Cookie;
use think\Db;
use think\Request;

class Repairs extends Controller
{
    //>>在线报修
    public function repairs(){
        if (!is_login()){
            //>>未登录,跳转至登录页面
            $this->success('请先登录', "/user/login/index","",3);
        }else{
            //>>判断用户是否认证
            $user_id = is_login();
            $status = Db::table("ucenter_member")->where('id',$user_id)->value('status');
            if ($status!=2){
                //>>未认证用户
                if(!$cookie_url = Cookie::get('__forward__')){
                    $cookie_url = url('Home/auth/auth');
                }
                $this->success('请先认证业主',$cookie_url);
            }
            //>>已登录获取用户名称
            $username = get_username();
        }
        $request=Request::instance();
        if ($request->isPost()){
            //>>接收数据
            $data = $request->post();
            //>>创建验证模型对象,验证是剧
            $validate = validate("repairs");
            if (!$validate->check($data)){
                return $this->error($validate->getError());
            }
            //>>创建报修模型对象,添加数据
            $repairs = new \app\admin\model\Repairs();
            $data["sn"]=uniqid();
            $data["status"]=1;
            $data["username"]=$username;
            $repairs->data($data);
            $result = $repairs->save();
            if ($result){
                session('admin_menu_list',null);
                //记录行为
                action_log('update_menu', 'Menu', $result->id, UID);
                $this->success('添加成功', "Index/index");
            }else{
                $this->error($repairs->getError());
            }
        }
        //>>获取导航信息
        $channel = Db::table("channel")->where("status","=",1)->select();
        //>>将数据放入页面中
        $this->assign('channel',$channel);
        //>>显示报修表单
        return $this->fetch("repairs");
    }

}