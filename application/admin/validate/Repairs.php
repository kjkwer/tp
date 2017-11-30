<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/26
 * Time: 11:35
 */

namespace app\admin\validate;


use think\Validate;

class Repairs extends Validate
{
    // 验证规则
    protected $rule = [
        'name'=>'require',
        'tel'=>['regex'=>'/^(0|86|17951)?(13[0-9]|15[012356789]|18[0-9]|14[57])[0-9]{8}$/','require'],
        'address'=>'require',
        'title'=>'require',
        'content'=>'require',
    ];
    protected $message  =   [
        'name.require' => '名称不能为空',
        'tel.require' => '电话不能为空',
        'tel.regex' => '电话格式错误',
        'address.require' => '地址不能为空',
        'title.require' => '标题不能为空',
        'content.require' => '详情不能为空',
    ];
}