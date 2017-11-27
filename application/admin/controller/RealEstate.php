<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/25
 * Time: 21:20
 */

namespace app\admin\controller;



use app\admin\model\Repairs;
use think\Db;
use think\Request;

class RealEstate extends Admin
{
    //>>展示报修列表
    public function repairs(){
        $arr = \think\Db::name('repairs')->select();
        //var_dump($arr);exit();
        //$this->success("新增成功","Menu/index");
        $this->assign("list",$arr);
        return $this->fetch("repairs");
    }
    //>>增加报修
    public function addRepairs(){
        if(request()->isPost()){
            $repairs = new Repairs();
            $post_data=request()->post();
            $validate = validate('repairs');
            if(!$validate->check($post_data)){
                return $this->error($validate->getError());
            }
            $post_data["sn"]=uniqid();
            $post_data["status"]=1;
            $data = $repairs->create($post_data);
            if($data){
                session('admin_menu_list',null);
                //记录行为
                action_log('update_menu', 'Menu', $data->id, UID);
                $this->success('新增成功', "RealEstate/repairs");
            } else {
                $this->error($repairs->getError());
            }
        }
        //>>展示表单
        $menus = \think\Db::name('Menu')->field(true)->select();
        $menus = model('Common/Tree')->toFormatTree($menus);
        $menus = array_merge(array(0=>array('id'=>0,'title_show'=>'顶级菜单')), $menus);
        $this->assign('Menus', $menus);
        return $this->fetch("editRepairs");
    }
    //>>修改报修
    public function editRepairs(){
        //>>接收参数
        $request = Request::instance();
        $id = $request->param("id");
        //>>查找需修改的数据
        $repairs = new Repairs();
        $data = $repairs->find(["id"=>$id]);
        //>>接收表单数据
        if ($request->isPost()){
            $formData = $request->post();
            $validate = validate("repairs");
            if (!$validate->check($formData)){
                return $this->error($validate->getError());
            }
            $result = $data->save($formData,["id"=>$id]);
            if($result){
                session('admin_menu_list',null);
                //记录行为
                action_log('update_menu', 'Menu', $result->id, UID);
                $this->success('修改成功', "RealEstate/repairs");
            } else {
                $this->error($repairs->getError());
            }
        }
        //>>显示列表
        $this->assign("info",$data);
        return $this->fetch("editRepairs");
    }
    //>>删除报修
    public function deleteRepairs(){
        //>>接收参数
        $request = Request::instance();
        $ids = $request->only("id");
        if ($request->isPost()){
            $ids = array_unique($ids["id"]);
        }
        $repairs=new Repairs();
        $result = $repairs->where("id","in",$ids)->delete();
        if($result){
            session('admin_menu_list',null);
            //记录行为
            action_log('update_menu', 'Menu', $ids, UID);
            $this->success('删除成功');
        } else {
            $this->error('删除失败！');
        }
    }
}