<?php
/**
 * Created by PhpStorm.
 * User: efeiyi
 * Date: 18/3/22
 * Time: 下午10:46
 */

namespace app\lib\exception;


class TokenException extends BaseException
{
    public $code = 401;
    public $msg = 'Token已过期或无效Token';
    public $errorCode = 10001;
}