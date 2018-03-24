<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/3/2
 * Time: 上午 11:57
 */

namespace app\lib\exception;


class ParameterException extends BaseException
{
    public $code = 400;
    public $msg = '参数错误';
    public $errorCode = 10000;
}