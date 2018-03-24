<?php
/**
 * Created by PhpStorm.
 * User: efeiyi
 * Date: 18/3/22
 * Time: 下午11:02
 */

namespace app\lib\exception;


class UserException extends BaseException
{
    public $code = 404;
    public $msg = '用户不存在';
    public $errorCode = 60000;
}