<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/30
 * Time: 14:28
 */

namespace app\home\controller;


use think\Controller;
use think\Cookie;
use think\Db;
use think\Request;

class Auth extends Home
{
    public function auth($verify=''){
        //>>判断用户是否登录
        if (!is_login()){
            //>>未登录,先登录
            $this->success('请先登录！', url('/user/login/index'));
        }
        //>>判断当前用户是否为已认证用户
        $user_id = is_login();
        $status = Db::table("ucenter_member")->where('id',$user_id)->value('status');
        if ($status==2){
            //>>已是认证用户
            if(!$cookie_url = Cookie::get('__forward__')){
                $cookie_url = url('Home/Index/index');
            }
            $this->success('已认证',$cookie_url);
        }
        $request = Request::instance();
        if($request->isPost()){
            /* 检测验证码 */
            if(!captcha_check($verify)){
                $this->error('验证码输入错误！');
            }else{
                //>>接收数据
                $data = $this->request->post();
                $validate = validate("auth");
                if(!$validate->check($data)){
                    return $this->error($validate->getError());
                }else{
                    //>>认证用户
                    $result = Db::table("ucenter_member")->where('id', is_login())->update(['status' => 2]);
                    unset($data["verify"]);
                    $data["uid"]=is_login();
                    $model = new \app\home\model\Auth();
                    $result1 = $model->create($data);
                    if ($result && $result1){
                        $this->success('认证成功！', url('/home/index/index'));
                    }
                }
            }
        }
        $channel = Db::table("channel")->where("status","=",1)->select();
        $this->assign('channel',$channel);
        return $this->fetch();
    }
}