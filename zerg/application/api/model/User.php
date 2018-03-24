<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/3/7
 * Time: 下午 03:52
 */

namespace app\api\model;


class User extends BaseModel
{
    public function address()
    {
        return $this->hasOne('UserAddress', 'user_id', 'id');
    }


    public static function getByOpenID($openid)
    {
        $user = User::where('openid', '=', $openid)->find();
        return $user;
    }

}