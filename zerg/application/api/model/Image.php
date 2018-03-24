<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/3/5
 * Time: 下午 02:51
 */

namespace app\api\model;


class Image extends BaseModel
{
    protected $hidden = ['id', 'from', 'update_time', 'delete_time'];

    public function getUrlAttr($value, $data)
    {
        return $this->prefixImgUrl($value, $data);
    }

}