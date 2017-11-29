<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/28
 * Time: 14:58
 */

namespace app\home\controller;




use app\admin\model\Repairs;
use think\Controller;
use think\Db;
use think\Request;

class User extends Controller
{
    //>>个人信息
    public function index(){
        if (!is_login()){
            $this->success('请先登录', "/user/login/index","",3);
        }
        //>>获取用户名
        $username = get_username();
        //>>获取导航信息
        $channel = Db::table("channel")->where("status","=",1)->select();
        //>>将数据放入页面中
        $this->assign('channel',$channel);
        $this->assign('username',$username);
        //>>显示页面
        return $this->fetch();
    }
    //>>报修内容
    public function repairs(){
        if (!is_login()){
            $this->success('请先登录', "/user/login/index","",3);
        }else{
            //>>已登录获取用户名称
            $username = get_username();
        }
        //>>查找该用户的报修信息,并设置分页
        $repairsModel = new Repairs();
        $repairsList = $repairsModel->where(["username"=>$username])->where("status","=","1")->order("update_time desc")->paginate(5);
        $pager = $repairsList->render();
        //>>获取导航信息
        $channel = Db::table("channel")->where("status","=",1)->select();
        //>>数据放入页面中
        $this->assign('channel',$channel);
        $this->assign('repairsList',$repairsList);
        $this->assign('pager',$pager);
        //>>显示页面
        return $this->fetch();
    }
    //>>删除报修内容
    public function deleteRepairs(){
        if (!is_login()){
            $this->success('请先登录', "/user/login/index","",3);
        }
        //>>接收参数
        $request = Request::instance();
        $id = $request->param("id");
        //>>删除数据
        $repairs=new Repairs();
        $result = $repairs->where("id","=",$id)->update(["status"=>0]);
        if($result){
            session('admin_menu_list',null);
            //记录行为
            action_log('update_menu', 'repairs', $id, UID);
            $this->success('删除成功');
        } else {
            $this->error('删除失败！');
        }
    }
    //>>编辑报修内容
    public function editRepairs(){
        if (!is_login()){
            $this->success('请先登录', "/user/login/index","",3);
        }
        //>>接收参数
        $request = Request::instance();
        $id = $request->param("id");
        //>>获取该条信息
        $repairs = new Repairs();
        $repairses = $repairs->find(["id"=>$id]);
        //>>接收表单提交的数据
        if ($request->isPost()){
            $formData = $request->post();
            $validate = validate("repairs");
            if (!$validate->check($formData)){
                return $this->error($validate->getError());
            }
            //var_dump($formData);exit();
            $data = $repairs->find(["id"=>$formData["id"]]);
            $result = $data->save($formData,["id"=>$id]);
            if($result){
                session('admin_menu_list',null);
                //记录行为
                action_log('update_menu', 'repairs', $result->id, UID);
                $this->success('修改成功', "user/repairs");
            } else {
                $this->error($repairs->getError());
            }
        }
        //>>获取导航信息
        $channel = Db::table("channel")->where("status","=",1)->select();
        //>>数据放入页面中
        $this->assign('channel',$channel);
        $this->assign('repairses',$repairses);
        //>>显示编辑表单
        return $this->fetch("repairs/repairs");
    }
}