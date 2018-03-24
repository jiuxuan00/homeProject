<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/3/6
 * Time: 下午 03:05
 */

namespace app\lib\exception;


class CategoryException extends BaseException
{
    public $code = 404;
    public $msg = '指定分类不存在，请检查参数';
    public $errorCode = 20000;
}