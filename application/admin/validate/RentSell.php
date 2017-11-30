<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/30
 * Time: 23:37
 */

namespace app\admin\validate;


use think\Validate;

class RentSell extends Validate
{
    // 验证规则
    protected $rule = [
        'title'=>'require',
        'price'=>'require',
        'genre'=>'require',
        'type'=>'require',
        'cover_id'=>'require',
        'content'=>'require',
        'desc'=>'require',
        'deadline'=>'require',
        'tel'=>['regex'=>'/^(0|86|17951)?(13[0-9]|15[012356789]|18[0-9]|14[57])[0-9]{8}$/','require'],
    ];
    protected $message  =   [
        'title.require' => '标题不能为空',
        'price.require' => '价格不能为空',
        'genre.require' => '单位不能为空',
        'type.require' => '类型不能为空',
        'cover_id.require' => '封面不能为空',
        'content.require' => '内容不能为空',
        'desc.require' => '简介不能为空',
        'deadline.require' => '截止时间不能为空',
        'tel.require' => '电话不能为空',
        'tel.regex' => '电话格式错误',
    ];
}