<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/30
 * Time: 14:02
 */

namespace app\common\validate;


use think\Validate;

class Auth extends Validate
{
    // 验证规则
    protected $rule = [
        'username'=>'require',
        'area'=>'require',
        'num'=>'require',
        'identity'=>'require',
        'tel'=>['regex'=>'/^(0|86|17951)?(13[0-9]|15[012356789]|18[0-9]|14[57])[0-9]{8}$/','require'],
        'idCard'=>'require',
        'desc'=>'require',
    ];
    protected $message  =   [
        'username.require' => '名称不能为空',
        'area.require' => '小区名不能为空',
        'num.require' => '房号不能为空',
        'identity.require' => '与业主关系不能为空',
        'tel.require' => '电话不能为空',
        'tel.regex' => '电话格式错误',
        'idCard.require' => '身份证号码不能为空',
        'desc.require' => '描述不能为空',
    ];
}