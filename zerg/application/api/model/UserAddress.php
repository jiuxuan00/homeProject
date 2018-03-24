<?php
/**
 * Created by PhpStorm.
 * User: efeiyi
 * Date: 18/3/23
 * Time: 下午3:24
 */

namespace app\api\model;


class UserAddress extends BaseModel
{
    protected $hidden = ['id', 'delete_id', 'user_id'];
}