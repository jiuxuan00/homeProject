<?php
/**
 * Created by PhpStorm.
 * User: efeiyi
 * Date: 18/3/24
 * Time: 下午9:57
 */

namespace app\lib\exception;


class ForbiddenException extends BaseException
{
    public $code = 403;
    public $msg = '权限不够';
    public $errorCode = 10001;
}