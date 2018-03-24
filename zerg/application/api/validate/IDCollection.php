<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/3/5
 * Time: 下午 06:26
 */

namespace app\api\validate;


class IDCollection extends BaseValidate
{
    protected $rule = [
        'ids' => 'require|checkIDs'
    ];

    protected $message = [
        'ids' => 'ids参数必须是以逗号分隔的多个正整数！'
    ];

    /**
     * @param $value
     * @return bool
     */
    protected function checkIDs($value)
    {
        //字符串转数组
        $values = explode(',', $value);

        //$value 为空
        if(empty($value)){
            return false;
        }

        foreach ($values as $id){
            if(!$this->isPositiveInteger($id)){
                return false;
            }
        }

        return true;
    }

}