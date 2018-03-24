<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/3/1
 * Time: 下午 03:07
 */

namespace app\api\validate;


class IDMustBePositiveInt extends BaseValidate
{
    protected $rule = [
        "id" => "require|isPositiveInteger"
    ];

    protected $message = [
        'id' => 'ID必须是正整数'
    ];

}