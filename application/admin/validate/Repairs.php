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
        ['name', 'require', '报修人必须填写'],
        ['tel', 'require', '电话必须填写'],
        ['address', 'require', '地址必须填写'],
        ['title', 'require', '报修标题必须填写'],
        ['content', 'require', '报修内容必须填写'],
    ];
}