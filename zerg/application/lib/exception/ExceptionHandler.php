<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/3/1
 * Time: 下午 06:14
 */

namespace app\lib\exception;


use think\Exception;
use think\exception\Handle;
use think\Log;
use think\Request;

class ExceptionHandler extends Handle
{
    private $code;
    private $msg;
    private $errorCode;
    //需要返回客户端当前请求的URL路径

    //  \Exception 基类
    public function render(\Exception $e)
    {
        if ($e instanceof BaseException){
            //如果是自定义的异常
            $this->code = $e->code;
            $this->msg = $e->msg;
            $this->errorCode = $e->errorCode;
        }else {
            //服务器的异常
            if(config('app_debug')){
                //返货框架自带的异常信息
                return parent::render($e);
            }else{
                $this->code = 500;
                $this->msg = '服务器内部错误！';
                $this->errorCode = 999;
                $this->recordErrorLog($e);
            }
        }

        $request = Request::instance();
        $result = [
            'msg'=>$this->msg,
            'errorCode'=>$this->errorCode,
            'request_url'=>$request->url()
        ];

        return json($result, $this->code);

    }


    private function recordErrorLog(Exception $e)
    {
        Log::init([
            // 日志记录方式，内置 file socket 支持扩展
            'type'  => 'file',
            // 日志保存目录
            'path'  => LOG_PATH,
            // 日志记录级别
            'level' => ['error'],
        ]);
        Log::record($e->getMessage(), 'error');
    }

}