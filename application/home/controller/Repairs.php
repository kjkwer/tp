<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/27
 * Time: 11:10
 */

namespace app\home\controller;


use think\Controller;
use think\Db;
use think\Request;

class Repairs extends Controller
{
    //>>在线报修
    public function repairs(){
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
        $this->assign('channel',$channel);
        //>>显示报修表单
        return $this->fetch("repairs");
    }
}