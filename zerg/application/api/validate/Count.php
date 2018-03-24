<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/3/6
 * Time: 下午 02:24
 */

namespace app\api\validate;


class Count extends BaseValidate
{
    protected $rule = [
        'count' => 'isPositiveInteger|between:1,15'
    ];
}