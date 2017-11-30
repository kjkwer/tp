<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/30
 * Time: 17:36
 */

namespace app\admin\controller;


use think\Controller;
use think\Db;
use think\Request;

class RentSell extends Admin
{
    //>>展示租售列表
    public function index(){
        //>>获取租售信息
        $lists = Db::table("rent_sell")->where("status",">=",0)->order("id desc")->paginate(5);
        $pager = $lists->render();
        //>>将数据分配至模版
        $this->assign("lists",$lists);
        $this->assign("pager",$pager);
        //>>显示列表
        return $this->fetch("index");
    }
    //>>添加租售信息
    public function add(){
        //>>判断请求方式比并接收数据
        if ($this->request->isPost()){
            $data = $this->request->post();
            //>>验证数据
            $validate = validate("rentSell");
            if (!$validate->check($data)){
                return $this->error($validate->getError());
            }
            //>>添加数据到数据库
            $data["uid"]=is_login();
            $data["status"]=1;
            $data["deadline"]=strtotime($data["deadline"]);
            unset($data["parse"]);
            $model = new \app\admin\model\RentSell();
            $result = $model->create($data);
            if ($result){
                session('admin_menu_list',null);
                //记录行为
                action_log('update_menu', 'RentSell', $result->id, UID);
                $this->success('新增成功', "rentSell/index");
            } else {
                $this->error($model->getError());
            }
        }
        //>>展示表单
        return $this->fetch("edit");
    }
    //>>编辑租售信息
    public function edit(){
        //>>接收参数
        $request = Request::instance();
        $id = $request->param("id");
        //>>查找需修改的数据
        $repairs = new \app\admin\model\RentSell();
        $data = $repairs->find(["id"=>$id]);
        $data->deadline = time_format($data->deadline);
        //>>接收表单数据
        if ($request->isPost()){
            $formData = $request->post();
            $validate = validate("rentSell");
            if (!$validate->check($formData)){
                return $this->error($validate->getError());
            }
            $formData["deadline"]=strtotime($formData["deadline"]);
            unset($formData["parse"]);
            $result = $data->save($formData,["id"=>$id]);
            if($result){
                session('admin_menu_list',null);
                //记录行为
                action_log('update_menu', 'RentSell', $result->id, UID);
                $this->success('修改成功', "RentSell/index");
            } else {
                $this->error($repairs->getError());
            }
        }
        //>>展示表单
        $this->assign("info",$data);
        return $this->fetch("edit");
    }
    public function del(){
        //>>接收参数
        $request = Request::instance();
        $ids = $request->only("id");
        if ($request->isPost()){
            $ids = array_unique($ids["id"]);
        }
        $repairs=new \app\admin\model\RentSell();
        $result = $repairs->where("id","in",$ids)->update(["status"=>-1]);
        if($result){
            session('admin_menu_list',null);
            //记录行为
            action_log('update_menu', 'RentSell', $ids, UID);
            $this->success('删除成功');
        } else {
            $this->error('删除失败！');
        }
    }
    //>>禁用
    public function forbidden(){
        //>>接收参数
        $request = Request::instance();
        $ids = $request->only("id");
        if ($request->isPost()){
            $ids = array_unique($ids["id"]);
        }
        $repairs=new \app\admin\model\RentSell();
        $result = $repairs->where("id","in",$ids)->update(["status"=>0]);
        if($result){
            session('admin_menu_list',null);
            //记录行为
            action_log('update_menu', 'forbidden', $ids, UID);
            $this->success('禁用成功');
        } else {
            $this->error('禁用失败！');
        }
    }
    //>>启用
    public function start(){
        //>>接收参数
        $request = Request::instance();
        $ids = $request->only("id");
        if ($request->isPost()){
            $ids = array_unique($ids["id"]);
        }
        $repairs=new \app\admin\model\RentSell();
        $result = $repairs->where("id","in",$ids)->update(["status"=>1]);
        if($result){
            session('admin_menu_list',null);
            //记录行为
            action_log('update_menu', 'forbidden', $ids, UID);
            $this->success('启用成功');
        } else {
            $this->error('启用失败！');
        }
    }
}