<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/3/1
 * Time: 下午 06:23
 */

namespace app\lib\exception;


class BannerMissException extends BaseException
{
    public $code = 404;
    public $msg = '请求Banner不存在';
    public $errorCode = 40000;
}