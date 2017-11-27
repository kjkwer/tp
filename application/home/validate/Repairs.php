<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/26
 * Time: 11:35
 */

namespace app\home\validate;


use think\Validate;

class Repairs extends Validate
{
    // 验证规则
    protected $rule = [
//        ['name', 'require', '报修人必须填写'],
//        ['tel', 'require', '电话必须填写'],
//        ['address', 'require', '地址必须填写'],
//        ['title', 'require', '报修标题必须填写'],
//        ['content', 'require', '报修内容必须填写'],
        //['tel','/^(0|86|17951)?(13[0-9]|15[012356789]|18[0-9]|14[57])[0-9]{8}$/','电话号码格式错误']
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